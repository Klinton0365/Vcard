<?php

namespace App\Http\Controllers;

use App\Models\Vcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DeepSeekController extends Controller
{
	
	public function chatIndex()
    {
        return view('deepseek.deepseek');
    }
	
    public function chat(Request $request)
    {
		\Log::info($request->all());
        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
            'HTTP-Referer' => env('OPENROUTER_SITE_URL'), // optional
            'X-Title' => env('OPENROUTER_SITE_NAME'),     // optional
            'Content-Type' => 'application/json',
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model' => 'deepseek/deepseek-r1-0528:free',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $validated['message'],
                ]
            ]
        ]);

        if ($response->failed()) {
            return response()->json([
                'error' => 'API request failed',
                'details' => $response->body(),
            ], 500);
        }

        $data = $response->json();

        return response()->json([
            'reply' => $data['choices'][0]['message']['content'] ?? 'No response',
        ]);
    }
	
	    /**
     * Generate AI-powered description for vCard profile
     */
	public function generateDescription(Request $request)
{
    Log::info('Description: ', $request->all());
    try {
        $validated = $request->validate([
            'vcard_id' => 'required|integer',
        ]);
        
        // Get vCard from database with all details
        $vcard = Vcard::findOrFail($validated['vcard_id']);
        
        // Extract profile data from vCard
        $profileData = [
            'name' => $vcard->name,
            'first_name' => $vcard->first_name,
            'last_name' => $vcard->last_name,
            'occupation' => $vcard->occupation,
            'job_title' => $vcard->job_title,
            'company' => $vcard->company,
            'email' => $vcard->email,
            'phone' => $vcard->phone,
            'location' => $vcard->location,
            'description' => $vcard->description, // existing description if any
            'dob' => $vcard->dob,
        ];
		Log::info('Description: ', [$profileData['description']]);
        
        // Build AI prompt with vCard information from database
        $prompt = $this->buildDescriptionPrompt($vcard, $profileData);
		Log::info('PROMPT: ', [$prompt]);
        
        // Make API call to DeepSeek
        $response = Http::timeout(60)->withHeaders([
            'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
            'HTTP-Referer' => env('OPENROUTER_SITE_URL'),
            'X-Title' => env('OPENROUTER_SITE_NAME'),
            'Content-Type' => 'application/json',
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model' => 'deepseek/deepseek-r1-0528:free',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a professional copywriter specializing in creating compelling personal and professional descriptions for digital business cards and profiles. Create engaging, professional descriptions that highlight key strengths and make a strong first impression.'
                ],
                [
                    'role' => 'user',
                    'content' => $prompt,
                ]
            ],
            'max_tokens' => 500,
            'temperature' => 0.7
        ]);
        
        if ($response->failed()) {
            \Log::error('DeepSeek API failed', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'AI service temporarily unavailable. Please try again later.'
            ], 500);
        }
        
$data = $response->json();
//Log::info('DATA: ', [$data]);

// Simple and robust extraction
$generatedDescription = '';

// Try direct access first (most common)
if (isset($data['choices'][0]['message']['content'])) {
    $generatedDescription = $data['choices'][0]['message']['content'];
    Log::info('Extracted directly: ' . $generatedDescription);
} 
// Try array format if direct access fails
elseif (isset($data[0]['choices'][0]['message']['content'])) {
    $generatedDescription = $data[0]['choices'][0]['message']['content'];
    Log::info('Extracted from array format: ' . $generatedDescription);
}

if (empty($generatedDescription)) {
    Log::error('GENERATE DESCRIPTION EMPTY - Full data dump: ', [$data]);
    return response()->json([
        'success' => false,
        'message' => 'Failed to extract generated description. Please try again.'
    ]);
}
        
        // Clean up the generated text
        $generatedDescription = $this->cleanGeneratedText($generatedDescription);
		Log::info('FINAL DESCRIPTION: ' . $generatedDescription);
        
        return response()->json([
            'success' => true,
            'description' => $generatedDescription
        ]);
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid request data.',
            'errors' => $e->errors()
        ], 422);
        
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json([
            'success' => false,
            'message' => 'vCard not found.'
        ], 404);
        
    } catch (\Exception $e) {
        \Log::error('Description generation failed', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'An error occurred while generating the description.'
        ], 500);
    }
}
 
    /**
     * Build the AI prompt based on profile data
     */
    private function buildDescriptionPrompt($vcard, $profileData)
    {
		//Log::info('Vcard: ', [$vcard]);
		Log::info('ProfileData: ', [$profileData]);
        $prompt = "Create a professional and engaging description for a digital business card profile. Here are the details:\n\n";
        
        // Add available information
        if (!empty($profileData['name'])) {
            $prompt .= "Name: " . $profileData['name'] . "\n";
        }
        
        if (!empty($profileData['job_title'])) {
            $prompt .= "Job Title: " . $profileData['job_title'] . "\n";
        }
        
        if (!empty($profileData['occupation'])) {
            $prompt .= "Occupation: " . $profileData['occupation'] . "\n";
        }
        
        if (!empty($profileData['company'])) {
            $prompt .= "Company: " . $profileData['company'] . "\n";
        }
        
        if (!empty($profileData['location'])) {
            $prompt .= "Location: " . $profileData['location'] . "\n";
        }
        
        if (!empty($profileData['current_description'])) {
            $prompt .= "Current Description: " . $profileData['current_description'] . "\n";
        }
        
        $prompt .= "\nPlease create a compelling professional description that:\n";
        $prompt .= "- Is 2-3 sentences long (50-150 words)\n";
        $prompt .= "- Highlights key professional strengths and expertise\n";
        $prompt .= "- Is engaging and makes a strong first impression\n";
        $prompt .= "- Uses professional but approachable tone\n";
        $prompt .= "- Focuses on value proposition and what makes this person unique\n";
        $prompt .= "- Avoids generic phrases and clichés\n";
        $prompt .= "- Is suitable for a digital business card or professional profile\n\n";
        $prompt .= "Return only the description text, no additional formatting or explanations.";
        
        return $prompt;
    }
    
    /**
     * Clean up the generated text
     */
    private function cleanGeneratedText($text)
    {
		Log::info('TEXT: ', [$text]);
        // Remove quotes if the AI wrapped the response in quotes
        $text = trim($text, '"\'');
        
        // Remove any markdown formatting
        $text = preg_replace('/\*\*(.*?)\*\*/', '$1', $text);
        $text = preg_replace('/\*(.*?)\*/', '$1', $text);
        
        // Clean up extra whitespace
        $text = preg_replace('/\s+/', ' ', $text);
        $text = trim($text);
        $text = '<p>' . $text . '</p>';
			
		Log::info('FINAL TEXT: ', [$text]);
        return $text;
    }

}
