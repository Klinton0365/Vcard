@extends('layouts.app')
@section('title')
    {{__('messages.users')}}
@endsection
@section('content')
    <h1>Chat with DeepSeek</h1>

    <form method="POST" action="{{ url('/deepseek-chat') }}">
        @csrf
        <textarea name="message" rows="5" cols="40" required></textarea><br>
        <button type="submit">Send</button>
    </form>

    @if(session('reply'))
        <h3>Response:</h3>
        <p>{{ session('reply') }}</p>
    @endif
@endsection