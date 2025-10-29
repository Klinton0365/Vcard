@extends('front.layouts.app1')
@section('title')
    {{ getAppName() }}
@endsection
@section('content')

    <!-- start banner section -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/assets/css/main.css') }}" /> --}}
    <section style="position: relative; width: 100%; height: 95vh; overflow: hidden;">

        <article class="slide"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 1; transition: opacity 1.5s ease-in-out; z-index: 1;">
            <img src="{{ asset('assets/assets/images/banner/front_page (1).png') }}" alt="Mountain Landscape"
                style="width: 100%; height: 100%; object-fit: cover; display: block;">
        </article>

        <article class="slide"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; transition: opacity 1.5s ease-in-out; z-index: 0;">
            <img src="{{ asset('assets/assets/images/banner/marketing_cards (1).png') }}" alt="Forest Trail"
                style="width: 100%; height: 100%; object-fit: cover; display: block;">
        </article>

        <article class="slide"
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; transition: opacity 1.5s ease-in-out; z-index: 0;">
            <img src="{{ asset('assets/assets/images/banner/cards_model (1).png') }}" alt="Ocean View"
                style="width: 100%; height: 100%; object-fit: cover; display: block;">
        </article>


        <!-- Navigation Dots -->
        <div class="slider-nav"
            style="position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%); display: flex; gap: 12px; z-index: 10;">
            <button class="nav-dot active" onclick="goToSlide(0)"
                style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid white; background: white; cursor: pointer; transition: all 0.3s ease; opacity: 1;"></button>
            <button class="nav-dot" onclick="goToSlide(1)"
                style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid white; background: transparent; cursor: pointer; transition: all 0.3s ease; opacity: 0.7;"></button>
            <button class="nav-dot" onclick="goToSlide(2)"
                style="width: 12px; height: 12px; border-radius: 50%; border: 2px solid white; background: transparent; cursor: pointer; transition: all 0.3s ease; opacity: 0.7;"></button>
        </div>

        <!-- Arrow Navigation -->
        <button onclick="previousSlide()"
            style="position: absolute; top: 50%; left: 30px; transform: translateY(-50%); background: rgba(255,255,255,0.2); border: 2px solid white; color: white; font-size: 24px; width: 50px; height: 50px; border-radius: 50%; cursor: pointer; transition: all 0.3s ease; z-index: 10; backdrop-filter: blur(10px);">‹</button>
        <button onclick="nextSlide()"
            style="position: absolute; top: 50%; right: 30px; transform: translateY(-50%); background: rgba(255,255,255,0.2); border: 2px solid white; color: white; font-size: 24px; width: 50px; height: 50px; border-radius: 50%; cursor: pointer; transition: all 0.3s ease; z-index: 10; backdrop-filter: blur(10px);">›</button>

    </section>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <div style="display: flex; align-items: center; justify-content: center; z-index: 999; position: relative;">
        <div
            style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border-radius: 20px; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); max-width: 600px; width: 100%;margin-top: -80px; padding: 20px;">
            <h2 style="color: #333; font-weight: 600; margin-bottom: 30px; text-align: center;">Search VCard Alias</h2>

            <div style="position: relative; margin-bottom: 20px;">
                <input id="search-alias-input" type="text" class="form-control" placeholder="Enter your vCard alias..."
                    style="border: 2px solid #e1e5e9; border-radius: 50px; padding: 15px 140px 15px 20px; font-size: 16px; transition: all 0.3s ease; background: #fff; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);"
                    onfocus="this.style.borderColor='#667eea'; this.style.boxShadow='0 0 0 0.2rem rgba(102, 126, 234, 0.25)'; this.style.outline='none';"
                    onblur="this.style.borderColor='#e1e5e9'; this.style.boxShadow='0 4px 15px rgba(0, 0, 0, 0.05)';"
                    required>
                <button id="search-alias-btn" type="submit" class="btn"
                    style="position: absolute; top: 50%; right: 8px; transform: translateY(-50%); background: linear-gradient(45deg, #667eea, #764ba2); border: none; border-radius: 25px; padding: 8px 20px; color: white; font-weight: 500; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);"
                    onmouseover="this.style.transform='translateY(-50%) translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(102, 126, 234, 0.4)'; this.style.background='linear-gradient(45deg, #5a6fd8, #6a4190)';"
                    onmouseout="this.style.transform='translateY(-50%)'; this.style.boxShadow='0 4px 15px rgba(102, 126, 234, 0.3)'; this.style.background='linear-gradient(45deg, #667eea, #764ba2)';"
                    onmousedown="this.style.transform='translateY(-50%) translateY(0px)';"
                    onmouseup="this.style.transform='translateY(-50%) translateY(-2px)';">
                    Available
                </button>
            </div>

            <div id="search-alias-error"
                style="font-size: 14px; margin-top: 10px; margin-left: 5px; font-weight: 500; color: #dc3545; display: none;">
                This alias URL is already taken
            </div>
            <div id="search-alias-success"
                style="font-size: 14px; margin-top: 10px; margin-left: 5px; font-weight: 500; color: #28a745; display: none;">
                This URL alias is available!
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('search-alias-btn').addEventListener('click', function() {
            const input = document.getElementById('search-alias-input');
            const errorDiv = document.getElementById('search-alias-error');
            const successDiv = document.getElementById('search-alias-success');

            // Hide both messages first
            errorDiv.style.display = 'none';
            successDiv.style.display = 'none';

            if (input.value.trim()) {
                // Simulate API call - randomly show success or error for demo
                setTimeout(() => {
                    if (Math.random() > 0.5) {
                        successDiv.style.display = 'block';
                    } else {
                        errorDiv.style.display = 'block';
                    }
                }, 500);
            }
        });

        // Handle enter key
        document.getElementById('search-alias-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.getElementById('search-alias-btn').click();
            }
        });
    </script>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.nav-dot');
        const totalSlides = slides.length;
        let slideInterval;

        function showSlide(n) {
            // Hide all slides
            slides.forEach((slide, index) => {
                slide.style.opacity = '0';
                slide.style.zIndex = '0';
            });

            // Show current slide
            slides[n].style.opacity = '1';
            slides[n].style.zIndex = '1';

            // Update navigation dots
            dots.forEach((dot, index) => {
                if (index === n) {
                    dot.style.background = 'white';
                    dot.style.opacity = '1';
                } else {
                    dot.style.background = 'transparent';
                    dot.style.opacity = '0.7';
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            showSlide(currentSlide);
        }

        function previousSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            showSlide(currentSlide);
        }

        function goToSlide(n) {
            currentSlide = n;
            showSlide(currentSlide);
            resetInterval();
        }

        function startSlideshow() {
            slideInterval = setInterval(nextSlide, 4000); // Change slide every 4 seconds
        }

        function resetInterval() {
            clearInterval(slideInterval);
            startSlideshow();
        }

        // Hover to pause
        const sliderSection = document.querySelector('section');
        sliderSection.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });

        sliderSection.addEventListener('mouseleave', () => {
            startSlideshow();
        });

        // Initialize slideshow
        showSlide(0);
        startSlideshow();

        // Add hover effects to navigation buttons
        const navButtons = document.querySelectorAll('button');
        navButtons.forEach(button => {
            if (button.textContent === '‹' || button.textContent === '›') {
                button.addEventListener('mouseenter', () => {
                    button.style.background = 'rgba(255,255,255,0.4)';
                    button.style.transform = button.textContent === '‹' ? 'translateY(-50%) scale(1.1)' :
                        'translateY(-50%) scale(1.1)';
                });
                button.addEventListener('mouseleave', () => {
                    button.style.background = 'rgba(255,255,255,0.2)';
                    button.style.transform = 'translateY(-50%) scale(1)';
                });
            }
        });

        // Add hover effects to dots
        dots.forEach(dot => {
            dot.addEventListener('mouseenter', () => {
                dot.style.transform = 'scale(1.2)';
            });
            dot.addEventListener('mouseleave', () => {
                dot.style.transform = 'scale(1)';
            });
        });
    </script>

    <!-- start hero section -->
    {{-- <section class="hero-section position-relative pb-60" @if (checkFrontLanguageSession() == 'ar') dir="rtl" @endif>
        <div class="container"> @include('flash::message') </div>
        <div class="hero-bg-img text-end">
            <img src="{{ asset('assets/img/new_home_page/hero-bg.png') }}" class="w-100 h-100" alt="hero-img" />
        </div>
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-6 text-lg-start text-center mb-lg-0 mb-md-5 mb-4">
                    <div class="hero-content">
                        <h1 class="text-black mb-2">{{ $setting['home_page_title'] }}</h1>
                        <p class="text-gray-100 fs-18 mb-40 ">
                            {{ $setting['sub_text'] ?? '' }}
                        </p>
                        <div class="position-relative vcard-alias-search">
                            <input id="search-alias-input" type="text" class="form-control" placeholder="{{ __('messages.vcard.search_vcard_alias') }}" required>
                            <button id="search-alias-btn" type="submit" class="btn btn-sm-success btn-primary top-50 end-0 me-2">
                                {{ __('messages.vcard.available') }}
                            </button>
                        </div>
                            <div id="search-alias-error" class="text-danger mt-1 ms-1 d-none">{{ __('messages.vcard.already_alias_url') }}</div>
                            <div id="search-alias-success" class="text-success mt-1 ms-1 d-none">{{ __('messages.vcard.url_alias_available') }}</div> --}}
    {{-- <a href="{{ route('register') }}" class="btn btn-primary" role="button" data-turbo="false">
                            {{ __('auth.get_started') }}</a> --}}
    {{-- </div>
                </div>
                <div class="col-lg-6 text-center mt-lg-0 mt-4">
                    <div class="hero-img mx-auto">
                        <img src="{{ isset($setting['home_page_banner']) ? $setting['home_page_banner'] : asset('assets/img/new_front/hero-img.png') }}"
                            alt="Vcard" class="zoom-in-zoom-out w-100 h-auto" />
                    </div>

                </div>
            </div>
        </div>
        <div class="main-banner banner-img-1">
            <img src="{{ asset('assets/img/new_home_page/shape-1.png') }}" class="w-100 h-auto" alt="image">
        </div>
        <div class="main-banner banner-img-2">
            <img src="{{ asset('assets/img/new_home_page/shape-2.png') }}" class="w-100 h-auto" alt="image">
        </div>
        <div class="main-banner banner-img-3">
            <img src="{{ asset('assets/img/new_home_page/shape-3.png') }}" class="w-100 h-auto" alt="image">
        </div>
        <div class="main-banner banner-img-4">
            <img src="{{ asset('assets/img/new_home_page/shape-4.png') }}" class="w-100 h-auto" alt="image">
        </div>
        <div class="main-banner banner-img-5">
            <img src="{{ asset('assets/img/new_home_page/shape-5.png') }}" class="w-100 h-auto" alt="image">
        </div>
        <div class="main-banner banner-img-6">
            <img src="{{ asset('assets/img/new_home_page/shape-6.png') }}" class="w-100 h-auto" alt="image">
        </div>
        <div class="main-banner banner-img-7">
            <img src="{{ asset('assets/img/new_home_page/shape-7.png') }}" class="w-100 h-auto" alt="image">
        </div>
        <div class="main-banner banner-img-8">
            <img src="{{ asset('assets/img/new_home_page/shape-8.png') }}" class="w-100 h-auto" alt="image">
        </div>
    </section> --}}
    <!-- end hero section -->



    <!-- Scripts -->
    {{-- <script src="{{ asset('assets/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/jquery.scrollex.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/skel.min.js') }}"></script>
    <script src="{{ asset('assets/assets/js/util.js') }}"></script>
<script src="{{ asset('assets/assets/js/main.js') }}"></script> --}}
    <!-- end banner section -->

    <div class="vcard-template-section pt-60 pb-100 position-relative">
        <div class="vcard-bg position-absolute">
            <img src="{{ asset('assets/img/new_home_page/vcard-template-bg.png') }}" alt="vcard-bg" class="w-100 h-auto">
        </div>
        <div class="plus-vector1 position-absolute">
            <img src="{{ asset('assets/img/new_home_page/plus-vector.png') }}" alt="vector" class="w-100 h-auto">
        </div>
        <div class="plus-vector2 position-absolute">
            <img src="{{ asset('assets/img/new_home_page/plus-vector.png') }}" alt="vector" class="w-100 h-auto">
        </div>
        <div class="plus-vector3 position-absolute">
            <img src="{{ asset('assets/img/new_home_page/plus-vector2.png') }}" alt="vector" class="w-100 h-auto">
        </div>
        {{-- vcard slider --}}
        <section class="vcard-section pb-100" id="">
            <div class="container w-100">
                <div class="section-heading text-center mb-60">
                    <h2 class="d-inline-block"> {{ __('messages.vcards_templates') }}</h2>
                </div>
                <div class="center-slider">
                    <div>
                        <div class="vcard-card">
                            <img src="{{ asset('assets/img/templates/home/vcard33.png') }}" class="w-100 vcard-img"
                                alt="vcard-img">
                        </div>
                    </div>
                    <div>
                        <div class="vcard-card">
                            <img src="{{ asset('assets/img/templates/home/vcard32.png') }}" class="img-fluid vcard-img"
                                alt="vcard-img">
                        </div>
                    </div>
                    <div>
                        <div class="vcard-card">
                            <img src="{{ asset('assets/img/templates/home/vcard31.png') }}" class="w-100 vcard-img "
                                alt="vcard-img">
                        </div>
                    </div>
                    <div>
                        <div class="vcard-card">
                            <img src="{{ asset('assets/img/templates/home/vcard30.png') }}" class="w-100 vcard-img"
                                alt="vcard-img">
                        </div>
                    </div>
                    <div>
                        <div class="vcard-card">
                            <img src="{{ asset('assets/img/templates/home/vcard29.png') }}" class="w-100 vcard-img"
                                alt="vcard-img">
                        </div>
                    </div>
                    <div>
                        <div class="vcard-card">
                            <img src="{{ asset('assets/img/templates/home/vcard28.png') }}" class="w-100 vcard-img"
                                alt="vcard-img">
                        </div>
                    </div>
                    <div>
                        <div class="vcard-card">
                            <img src="{{ asset('assets/img/templates/home/vcard27.png') }}" class="w-100 vcard-img"
                                alt="vcard-img">
                        </div>
                    </div>

                </div>
                <div class="col-12 text-center mt-5">
                    {{-- <a href="{{ route('vcard-templates') }}" class="btn btn-primary-light" role="button"
                        data-turbo="false">{{ __('messages.common.view_more') }}</a> --}}
                    <style>
                        .view-button {
                            --green: #1f96fe;
                            font-size: 15px;
                            padding: 0.7em 2.7em;
                            letter-spacing: 0.06em;
                            position: relative;
                            font-family: inherit;
                            border-radius: 0.6em;
                            overflow: hidden;
                            transition: all 0.3s;
                            line-height: 1.4em;
                            border: 2px solid var(--green);
                            background: linear-gradient(to right, rgba(27, 253, 156, 0.1) 1%, transparent 40%, transparent 60%, rgba(27, 253, 156, 0.1) 100%);
                            color: var(--green);
                            box-shadow: inset 0 0 10px rgba(9, 201, 254, 0.847), 0 0 9px 3px rgba(27, 166, 253, 0.858);
                        }

                        .view-button:hover {
                            color: #21b5ff;
                            box-shadow: inset 0 0 10px rgb(3, 121, 255), 0 0 9px 3px rgba(27, 253, 156, 0.2);
                        }

                        .view-button:before {
                            content: "";
                            position: absolute;
                            left: -4em;
                            width: 4em;
                            height: 100%;
                            top: 0;
                            transition: transform .4s ease-in-out;
                            background: linear-gradient(to right, transparent 1%, rgba(27, 253, 156, 0.1) 40%, rgba(27, 253, 156, 0.1) 60%, transparent 100%);
                        }

                        .view-button:hover:before {
                            transform: translateX(15em);
                        }
                    </style>
                    <a href="{{ route('vcard-templates') }}">
                        <button class="view-button"> View More...
                        </button>
                    </a>
                </div>
            </div>
        </section>
    </div>
    <!-- start features section -->
    <section class="features-section overflow-hidden @if (checkFrontLanguageSession() == 'ar') rtl @endif" id="frontFeaturesTab">
        <div class="container">
            <div class="section-heading text-start mb-60">
                <h2 class="d-inline-block">{{ __('messages.plan.features') }}</h2>
            </div>
            <div class="feature-slider">
                @foreach ($features as $feature)
                    <div class="" style="flex: 0 0 300px; margin-right: 25px;">
                        <div class="feature-card"
                            style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(15px); border-radius: 20px; padding: 30px 25px; display: flex; align-items: center; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08); border: 1px solid rgba(255, 255, 255, 0.3); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); height: 100px; position: relative; overflow: hidden; min-width: 300px;"
                            onmouseover="this.style.transform='translateY(-8px) scale(1.02)'; this.style.boxShadow='0 25px 50px rgba(0, 0, 0, 0.15)'; this.style.background='rgba(255, 255, 255, 0.98)';"
                            onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 15px 35px rgba(0, 0, 0, 0.08)'; this.style.background='rgba(255, 255, 255, 0.95)';">
                            <!-- Decorative gradient overlay -->
                            <div
                                style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #667eea 0%, #764ba2 50%, #f093fb 100%); border-radius: 20px 20px 0 0;">
                            </div>
                            {{-- <div class="card-img overflow-hidden">
                                <img src="{{ $feature->profile_image }}" class="w-100 h-100 object-fit-cover"
                                    alt="feature-img">
                            </div> --}}
                            <!-- Icon container with image -->
                            <div class="card-img overflow-hidden" style="margin-right: 20px; flex-shrink: 0;">
                                <div
                                    style="width: 70px; height: 70px; border-radius: 50%; position: relative; padding: 3px; background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%); box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);">
                                    <div
                                        style="width: 100%; height: 100%; border-radius: 50%; overflow: hidden; background: white; display: flex; align-items: center; justify-content: center;">
                                        <img src="{{ $feature->profile_image }}"
                                            style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; transition: transform 0.3s ease;"
                                            onmouseover="this.style.transform='scale(1.1)'"
                                            onmouseout="this.style.transform='scale(1)'" alt="feature-img">
                                    </div>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="card-body p-0" style="flex: 1; text-align: left;">
                                <h3
                                    style="font-size: 1.2rem; margin-bottom: 8px; font-weight: 700; color: #2d3748; line-height: 1.3; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                    {{ $feature->name }}
                                </h3>
                                <p
                                    style="color: #718096; margin-bottom: 0; line-height: 1.5; font-size: 13px; font-weight: 400; opacity: 0.9; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                    {!! $feature->description !!}
                                </p>
                            </div>
                            <!-- Decorative gradient overlay -->
                            <div
                                style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, #667eea 0%, #764ba2 50%, #f093fb 100%); border-radius: 20px 20px 0 0;">
                            </div>
                            {{-- <div class="card-body p-0">
                                <h3 class="fs-18 mb-3">{{ $feature->name }}</h3>
                                <p class="text-gray-100 mb-0">{!! $feature->description !!}
                                </p>
                            </div> --}}
                            <!-- Hover effect background -->
                            <div
                                style="position: absolute; top: 50%; left: 50%; width: 0; height: 0; background: radial-gradient(circle, rgba(102, 126, 234, 0.05) 0%, transparent 70%); border-radius: 50%; transform: translate(-50%, -50%); transition: all 0.4s ease; pointer-events: none; z-index: -1;">
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end features section -->

    <!-- start modern & powerful-interface section -->
    <section class="modern-interface-section overflow-hidden pb-100" id="frontAboutTabUsTab"
        @if (checkFrontLanguageSession() == 'ar') dir="rtl" @endif>
        <div class="container">
            <div class="section-heading text-center mb-60">
                <h2 class="d-inline-block">{{ __('auth.modern_&_powerful_interface') }}</h2>
            </div>
            <div class="interface-card mb-40">
                <div class="row m-0 pb-2 justify-content-between align-items-center">
                    <div class="col-lg-5 col-md-6 mb-md-0 mb-40">
                        <div class="interface-img">
                            <img class="h-auto w-100"
                                src="{{ isset($aboutUS[0]['about_url']) ? $aboutUS[0]['about_url'] : asset('front/images/about-1.png') }}"
                                alt="interface-img">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card-desc ps-lg-0 ps-md-4">
                            <h3 class="card-title fs-20 fw-6 mb-3">
                                {{ $aboutUS[0]['title'] }}
                            </h3>
                            <p class="card-text text-gray-100">
                                {!! nl2br(e($aboutUS[0]['description'])) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="interface-card mb-40">
                <div class="row pb-2 m-0 flex-md-row flex-column-reverse justify-content-between align-items-center">
                    <div class="col-lg-6 col-md-6 pe-lg-0 pe-md-4">
                        <div class="card-desc">
                            <h3 class="card-title fs-20 fw-6 mb-3">
                                {{ $aboutUS[1]['title'] }}
                            </h3>
                            <p class="card-text text-gray-100">
                                {!! nl2br(e($aboutUS[1]['description'])) !!}
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 mb-md-0 mb-40">
                        <div class="interface-img">
                            <img class="h-auto w-100"
                                src="{{ isset($aboutUS[1]['about_url']) ? $aboutUS[1]['about_url'] : asset('front/images/about-2.png') }}"
                                alt="interface img" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="interface-card">
                <div class="row m-0 pb-2 justify-content-between align-items-center">
                    <div class="col-lg-5 col-md-6 mb-md-0 mb-40">
                        <div class="interface-img">
                            <img class="h-auto w-100"
                                src="{{ isset($aboutUS[2]['about_url']) ? $aboutUS[2]['about_url'] : asset('front/images/about-3.png') }}"
                                alt="interface img" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card-desc ps-lg-0 ps-md-4">
                            <h3 class="card-title fs-20 fw-6 mb-3">
                                {{ $aboutUS[2]['title'] }}
                            </h3>
                            <p class="card-text text-gray-100">
                                {!! nl2br(e($aboutUS[2]['description'])) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end modern & powerful-interface section  -->

    <!-- start pricing section -->
    <section class="pricing-plan-section pb-100 @if (checkFrontLanguageSession() == 'ar') rtl @endif" id="frontPricingTab">
        <div class="container">
            <div class="section-heading text-center mb-60">
                <h2 class="d-inline-block"> {{ __("auth.choose_a_plan_that's_right_for_you") }}</h2>
            </div>
            <div class="pricing-slider">
                @foreach ($plans as $plan)
                    <div class="">
                        <div class="pricing-card h-100 position-relative">
                            @if ($plan->trial_days > 0)
                                <div class="trial-plan-lable">
                                    <span class="px-4 py-1">{{ __('messages.subscription.trial_plan') }}</span>
                                </div>
                            @endif
                            <div class="pricing-card-body">
                                <div class="text-center">
                                    <h3 class="card-title text-primary">{!! $plan->name !!}</h3>
                                    <div
                                        class="{{ getLoggedInUserRoleId() != getSuperAdminRoleId() ? '' : 'd-flex justify-content-center align-items-center mb-4' }}">
                                        @if ($plan->custom_select == 1 && $plan->planCustomFields->isNotEmpty())
                                            <h2 class="price text-center fw-5 mb-30">
                                                {{ $plan->currency->currency_icon }} <span
                                                    class="custom-price-{{ $plan->id }}">{{ $plan->planCustomFields[0]->custom_vcard_price }}</span>
                                                @if ($plan->frequency == 1)
                                                    <span class="fs-18">/ {{ __('messages.plan.monthly') }}</span>
                                                @elseif($plan->frequency == 2)
                                                    <span class="fs-18">/ {{ __('messages.plan.yearly') }}</span>
                                                @endif
                                            </h2>
                                        @else
                                            <h2 class="price text-center fw-5 mb-30" id="price_{{ $plan->id }}">
                                                {{ $plan->currency->currency_icon }} {{ $plan->price }}
                                                @if ($plan->frequency == 1)
                                                    <span class="fs-18">/ {{ __('messages.plan.monthly') }}</span>
                                                @elseif($plan->frequency == 2)
                                                    <span class="fs-18">/ {{ __('messages.plan.yearly') }}</span>
                                                @endif
                                            </h2>
                                        @endif
                                        <div
                                            class="d-flex justify-content-center align-items-center {{ getLoggedInUserRoleId() != getSuperAdminRoleId() ? 'mb-4' : 'ms-2' }}">
                                            @if ($plan->custom_select == 1 && $plan->planCustomFields->isNotEmpty())
                                                {{-- <label
                                                 class="fs-18 mb-3 text-gray-100">{{ __('messages.plan.custom_no_of_vcards') }}</label> --}}
                                                <select id="vcardNumber-{{ $plan->id }}"
                                                    class="form-select customSelect me-2"
                                                    data-plan-id="{{ $plan->id }}"
                                                    style="{{ getLoggedInUserRoleId() != getSuperAdminRoleId() ? 'width:30% !important; padding: 10px 30px' : 'width:100% !important; padding: 10px 30px' }}">
                                                    @foreach ($plan->planCustomFields as $customField)
                                                        @php
                                                            $formattedPrice = $customField->custom_vcard_price;
                                                        @endphp
                                                        <option value="{{ $customField->id }}"
                                                            data-price="{{ $formattedPrice }}"
                                                            data-currency="{{ $plan->currency->currency_code }}">
                                                            {{ $customField->custom_vcard_number }} </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                            <div class="text-center">
                                                @if (getLoggedInUserRoleId() != getSuperAdminRoleId())
                                                    @if (getLogInUser() && getLoggedInUserRoleId() != getSuperAdminRoleId())
                                                        <div class="mx-auto">
                                                            @if (
                                                                !empty(getCurrentSubscription()) &&
                                                                    $plan->id == getCurrentSubscription()->plan_id &&
                                                                    !getCurrentSubscription()->isExpired())
                                                                @if ($plan->price != 0)
                                                                    <button type="button"
                                                                        class="btn btn-success rounded-3  mx-auto w-100 d-block cursor-remove-plan pricing-plan-button-active"
                                                                        data-id="{{ $plan->id }}" data-turbo="false">
                                                                        {{ __('messages.subscription.currently_active') }}</button>
                                                                @else
                                                                    <button type="button"
                                                                        class="btn btn-info rounded-3  mx-auto d-block cursor-remove-plan"
                                                                        data-turbo="false">
                                                                        {{ __('messages.subscription.renew_free_plan') }}
                                                                    </button>
                                                                @endif
                                                            @else
                                                                @if (
                                                                    !empty(getCurrentSubscription()) &&
                                                                        !getCurrentSubscription()->isExpired() &&
                                                                        ($plan->price == 0 || $plan->price != 0))
                                                                    @if ($plan->hasZeroPlan->count() == 0)
                                                                        <a href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                            class="btn btn-primary rounded-3 mx-auto w-100 {{ $plan->price == 0 ? 'freePayment' : '' }}"
                                                                            data-id="{{ $plan->id }}"
                                                                            id="planId{{ $plan->id }}"
                                                                            data-plan-price="{{ $plan->price }}"
                                                                            data-turbo="false">
                                                                            {{ __('messages.subscription.switch_plan') }}</a>
                                                                    @else
                                                                        <button type="button"
                                                                            class="btn btn-info rounded-3 mx-auto d-block cursor-remove-plan"
                                                                            data-turbo="false">
                                                                            {{ __('messages.subscription.renew_free_plan') }}
                                                                        </button>
                                                                    @endif
                                                                @else
                                                                    @if ($plan->hasZeroPlan->count() == 0)
                                                                        <a href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                            class="btn btn-primary rounded-3 mx-auto w-100 {{ $plan->price == 0 ? 'freePayment' : '' }}"
                                                                            data-id="{{ $plan->id }}"
                                                                            id="planId{{ $plan->id }}"
                                                                            data-plan-price="{{ $plan->price }}"
                                                                            data-turbo="false">
                                                                            {{ __('messages.subscription.choose_plan') }}</a>
                                                                    @else
                                                                        <button type="button"
                                                                            class="btn btn-info rounded-3 mx-auto d-block cursor-remove-plan"
                                                                            data-turbo="false">
                                                                            {{ __('messages.subscription.renew_free_plan') }}
                                                                        </button>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </div>
                                                    @else
                                                        <div class="mx-auto">
                                                            @if ($plan->hasZeroPlan->count() == 0)
                                                                <a href="{{ $plan->price != 0 ? route('choose.payment.type', $plan->id) : 'javascript:void(0)' }}"
                                                                    class="btn btn-primary rounded-3 mx-auto w-100 {{ $plan->price == 0 ? 'freePayment' : '' }}"
                                                                    data-id="{{ $plan->id }}"
                                                                    data-plan-price="{{ $plan->price }}"
                                                                    id="planId{{ $plan->id }}" data-turbo="false">
                                                                    {{ __('messages.subscription.choose_plan') }}</a>
                                                            @else
                                                                <button type="button"
                                                                    class="btn btn-info rounded-3 mx-auto d-block cursor-remove-plan"
                                                                    data-turbo="false">
                                                                    {{ __('messages.subscription.renew_free_plan') }}
                                                                </button>
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="pricing-plan-list ps-xl-4 ps-lg-3 ps-md-4 ps-3 mb-60">
                                    @if ($plan->trial_days > 0)
                                        <li class="active-check">
                                            <span class="check-box">
                                                <i class="fa-solid fa-check"
                                                    style="font-size: 18px; color: #7638f9; margin-right: 20px"></i>
                                            </span>
                                            <label
                                                class="">{{ __('messages.subscription.trial_plan') . ' (' . $plan->trial_days . ' ' . __('messages.plan.days') . ')' }}</label>
                                        </li>
                                    @endif
                                    @if ($plan->custom_select == 0 && $plan->planCustomFields->isEmpty())
                                        <li class="active-check">
                                            <span class="check-box">
                                                <i class="fa-solid fa-check"
                                                    style="font-size: 18px; color: #7638f9; margin-right: 20px"></i>
                                            </span>
                                            <label class="">{{ __('messages.plan.no_of_vcards') }}
                                                : {{ $plan->no_of_vcards }}</label>
                                        </li>
                                    @endif
                                    <li class="active-check">
                                        <span class="check-box">
                                            <i class="fa-solid fa-check"
                                                style="font-size: 18px; color: #7638f9; margin-right: 20px"></i>
                                        </span>
                                        <label class="">{{ __('messages.plan.storage_limit') }}:
                                            {{ $plan->storage_limit }} {{ __('messages.mb') }}</label>
                                    </li>
                                    @php
                                        $skipCount =
                                            $plan->custom_select == 0 && $plan->planCustomFields->isEmpty() ? 9 : 10;
                                    @endphp
                                    @foreach (collect(getPlanFeature($plan))->take($skipCount) as $feature => $value)
                                        <li class="{{ $value == 1 ? 'active-check' : 'unactive-check' }}"
                                            @if (checkFrontLanguageSession() == 'ar') style="text-align: right !important" @endif>
                                            @if (checkFrontLanguageSession() == 'ar')
                                                {{ __('messages.feature.' . $feature) }}
                                                <span class="check-box">
                                                    <i class="fa-solid {{ $value == 1 ? 'fa-check' : 'fa-xmark' }}"></i>
                                                </span>
                                            @else
                                                <span class="check-box">
                                                    <i class="fa-solid {{ $value == 1 ? 'fa-check' : 'fa-xmark' }}"></i>
                                                </span>
                                                {{ __('messages.feature.' . $feature) }}
                                            @endif
                                        </li>
                                    @endforeach
                                    <div class="all-features d-none" style="display: none;">

                                        @foreach (collect(getPlanFeature($plan))->skip($skipCount) as $feature => $value)
                                            <li class="{{ $value == 1 ? 'active-check' : 'unactive-check' }}"
                                                @if (checkFrontLanguageSession() == 'ar') style="text-align: right !important" @endif>
                                                @if (checkFrontLanguageSession() == 'ar')
                                                    {{ __('messages.feature.' . $feature) }}
                                                    <span class="check-box">
                                                        <i
                                                            class="fa-solid {{ $value == 1 ? 'fa-check' : 'fa-xmark' }}"></i>
                                                    </span>
                                                @else
                                                    <span class="check-box">
                                                        <i
                                                            class="fa-solid {{ $value == 1 ? 'fa-check' : 'fa-xmark' }}"></i>
                                                    </span>
                                                    {{ __('messages.feature.' . $feature) }}
                                                @endif
                                            </li>
                                        @endforeach
                                    </div>
                                </ul>
                                <div class="text-center show-plan-features" id="seeMorePlanFeatures">
                                    <i class="fa-solid fa-circle-chevron-down show-plan-icon-btn"></i>
                                </div>
                                <div class="text-center d-none less-plan-features" id="lessMorePlanFeatures">
                                    <i class="fa-solid fa-circle-chevron-up less-plan-icon-btn"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end pricing section -->

    <!-- start testimonial section -->
    @if (!$testimonials->isEmpty())
        <section class="testimonial-section @if (checkFrontLanguageSession() == 'ar') rtl @endif">
            <div class="section-heading text-center mb-60">
                <h2 class="d-inline-block">{{ __('auth.stories_from_our_customers') }}</h2>
            </div>
            <div class="testimonial bg-light pt-50 pb-50">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="testimonial-slider">
                                @foreach ($testimonials as $testimonial)
                                    <div class="">
                                        <div class="testimonial-card mb-60">
                                            <div class="quote-img">
                                                <img src="{{ asset('assets/img/new_home_page/quote-img.png') }}"
                                                    alt="quotation" class="w-sm-100 w-50 h-auto">
                                            </div>
                                            <div class="profile-img">
                                                <img src="{{ $testimonial->testimonial_url }}" alt="profile-img"
                                                    class="w-100 h-100 object-fit-cover">
                                            </div>
                                            <div class="profile-desc ps-3">
                                                <p class="fs-20 mb-0 fw-6">{{ $testimonial->name }}</p>
                                            </div>
                                            <p class="mt-4 mb-0 profile-text text-gray-100">{!! $testimonial->description !!}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    @endif
    <!-- end testimonial section -->

    <!-- start contact section -->
    {{-- <section class="contact-section pt-100 pb-100" id="frontContactUsTab"
        @if (checkFrontLanguageSession() == 'ar') dir="rtl" @endif>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="contact-info">
                        <div class="section-heading ms-0 mb-60">
                            <h2 class="d-inline-block">{{ __('messages.vcard_11.get_in_touch') }}</h2>
                        </div>
                        <div class="d-flex align-items-center contact-info__block">
                            <div class="contact-icon fs-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-location-dot icon-purpul"></i>
                            </div>
                            <p class="address-text text-secondary mb-0">
                                {{ $setting['address'] }}
                            </p>
                        </div>
                        <div class="d-flex align-items-center contact-info__block">
                            <div class="contact-icon fs-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-at icon-purpul"></i>
                            </div>
                            <a href="mailto:{{ $setting['email'] }}"
                                class="text-decoration-none text-secondary">{{ $setting['email'] }}</a>
                        </div>
                        <div class="d-flex align-items-center contact-info__block">
                            <div class="contact-icon fs-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-phone icon-purpul"></i>
                            </div>
                            <a href=" tel:{{ $setting['phone'] }}"
                                class="text-decoration-none text-secondary" dir="ltr">{{ '+' . $setting['prefix_code'] . ' ' . $setting['phone'] }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <form class="contact-form" id="myForm">
                        @csrf
                        <div id="contactError" class="alert alert-danger d-none"></div>

                        <p class="text-center mb-40 fs-4 fw-6">{{ __('messages.contact_us.send_message') }}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input name="name" id="name" type="text" class="form-control front-input"
                                        placeholder="{{ __('messages.front.enter_your_name') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input name="email" id="email" type="email" class="form-control front-input"
                                        placeholder="{{ __('messages.front.enter_your_email') }}" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <input name="subject" id="subject" type="text" class="form-control front-input"
                                        placeholder="{{ __('messages.common.subject') }}" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <textarea name="message" id="message" rows="4" class="form-control h-100 form-textarea front-input"
                                        placeholder="{{ __('messages.front.enter_your_message') }}" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <input type="submit" id="submit" name="send"
                                    class="contact-section-submit-btn btn btn-primary w-auto front-input "
                                    value="{{ __('messages.contact_us.send_message') }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> --}}
    <div
        style="margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #f5576c 75%, #4facfe 100%); background-size: 400% 400%; animation: gradientShift 15s ease infinite; min-height: 100vh; display: flex; align-items: center; justify-content: center;">
        <style>
            @keyframes gradientShift {
                0% {
                    background-position: 0% 50%;
                }

                50% {
                    background-position: 100% 50%;
                }

                100% {
                    background-position: 0% 50%;
                }
            }

            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(50px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes glow {
                from {
                    text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
                }

                to {
                    text-shadow: 0 0 30px rgba(255, 255, 255, 0.8), 0 0 40px rgba(255, 255, 255, 0.3);
                }
            }

            @keyframes expandLine {
                from {
                    width: 0;
                }

                to {
                    width: 80px;
                }
            }

            @keyframes fadeInLeft {
                from {
                    opacity: 0;
                    transform: translateX(-30px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes fadeInRight {
                from {
                    opacity: 0;
                    transform: translateX(30px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes sparkle {

                0%,
                100% {
                    opacity: 1;
                    transform: scale(1);
                }

                50% {
                    opacity: 0.5;
                    transform: scale(1.2);
                }
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px) rotate(0deg);
                }

                50% {
                    transform: translateY(-20px) rotate(180deg);
                }
            }
        </style>
        <section
            style="width: 100%; max-width: 1200px; margin: 2rem; background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(20px); border-radius: 30px; border: 1px solid rgba(255, 255, 255, 0.2); overflow: hidden; box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2); animation: slideUp 0.8s ease-out; position: relative;">
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; overflow: hidden;">
                <div
                    style="position: absolute; background: rgba(255, 255, 255, 0.1); border-radius: 50%; width: 80px; height: 80px; top: 10%; left: 10%; animation: float 6s ease-in-out infinite; animation-delay: 0s;">
                </div>
                <div
                    style="position: absolute; background: rgba(255, 255, 255, 0.1); border-radius: 50%; width: 60px; height: 60px; top: 70%; right: 10%; animation: float 6s ease-in-out infinite; animation-delay: 2s;">
                </div>
                <div
                    style="position: absolute; background: rgba(255, 255, 255, 0.1); border-radius: 50%; width: 40px; height: 40px; top: 30%; right: 20%; animation: float 6s ease-in-out infinite; animation-delay: 4s;">
                </div>
            </div>

            <div style="padding: 4rem 2rem;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: start;">
                    <div style="color: white; position: relative;">
                        <div style="margin-bottom: 3rem;">
                            <h2
                                style="font-size: 3rem; font-weight: 800; background: linear-gradient(135deg, #fff 0%, #e0e7ff 100%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 3rem; position: relative; animation: glow 2s ease-in-out infinite alternate;">
                                Get In Touch
                            </h2>
                        </div>

                        <div style="display: flex; align-items: center; margin-bottom: 2.5rem; padding: 1.5rem; background: rgba(255, 255, 255, 0.08); border-radius: 20px; border: 1px solid rgba(255, 255, 255, 0.1); transition: all 0.3s ease; animation: fadeInLeft 0.6s ease-out 0.2s both;"
                            onmouseover="this.style.transform='translateY(-5px)'; this.style.background='rgba(255, 255, 255, 0.15)'; this.style.boxShadow='0 15px 35px rgba(0, 0, 0, 0.2)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.background='rgba(255, 255, 255, 0.08)'; this.style.boxShadow='none'">
                            <div
                                style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, #ff6b6b, #4ecdc4); margin-right: 1.5rem; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                <i class="fa-solid fa-location-dot" style="color: white; font-size: 1.5rem;"></i>
                            </div>
                            <p style="color: rgba(255, 255, 255, 0.9); font-size: 1.1rem; margin: 0;">
                                23, 3rd floor, nandita manison, 1st Cross, 1st Stage, Kumaraswamy Layout,<br>
                                Bengaluru, Karnataka 560078
                            </p>
                        </div>

                        <div style="display: flex; align-items: center; margin-bottom: 2.5rem; padding: 1.5rem; background: rgba(255, 255, 255, 0.08); border-radius: 20px; border: 1px solid rgba(255, 255, 255, 0.1); transition: all 0.3s ease; animation: fadeInLeft 0.6s ease-out 0.4s both;"
                            onmouseover="this.style.transform='translateY(-5px)'; this.style.background='rgba(255, 255, 255, 0.15)'; this.style.boxShadow='0 15px 35px rgba(0, 0, 0, 0.2)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.background='rgba(255, 255, 255, 0.08)'; this.style.boxShadow='none'">
                            <div
                                style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, #ff6b6b, #4ecdc4); margin-right: 1.5rem; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                <i class="fa-solid fa-at" style="color: white; font-size: 1.5rem;"></i>
                            </div>
                            <a href="mailto:info@webdigitalmantra.in"
                                style="color: rgba(255, 255, 255, 0.9); font-size: 1.1rem; text-decoration: none; transition: color 0.3s ease;"
                                onmouseover="this.style.color='#4ecdc4'; this.style.textShadow='0 0 10px rgba(78, 205, 196, 0.5)'"
                                onmouseout="this.style.color='rgba(255, 255, 255, 0.9)'; this.style.textShadow='none'">info@webdigitalmantra.in</a>
                        </div>

                        <div style="display: flex; align-items: center; margin-bottom: 2.5rem; padding: 1.5rem; background: rgba(255, 255, 255, 0.08); border-radius: 20px; border: 1px solid rgba(255, 255, 255, 0.1); transition: all 0.3s ease; animation: fadeInLeft 0.6s ease-out 0.6s both;"
                            onmouseover="this.style.transform='translateY(-5px)'; this.style.background='rgba(255, 255, 255, 0.15)'; this.style.boxShadow='0 15px 35px rgba(0, 0, 0, 0.2)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.background='rgba(255, 255, 255, 0.08)'; this.style.boxShadow='none'">
                            <div
                                style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, #ff6b6b, #4ecdc4); margin-right: 1.5rem; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                <i class="fa-solid fa-phone" style="color: white; font-size: 1.5rem;"></i>
                            </div>
                            <a href="tel:+918050787877"
                                style="color: rgba(255, 255, 255, 0.9); font-size: 1.1rem; text-decoration: none; transition: color 0.3s ease;"
                                onmouseover="this.style.color='#4ecdc4'; this.style.textShadow='0 0 10px rgba(78, 205, 196, 0.5)'"
                                onmouseout="this.style.color='rgba(255, 255, 255, 0.9)'; this.style.textShadow='none'">+91
                                8050787877</a>
                        </div>
                    </div>

                    <style>
                        /* Fix placeholder styling */
                        input::placeholder,
                        textarea::placeholder {
                            color: #a0aec0 !important;
                            opacity: 1 !important;
                        }

                        input::-webkit-input-placeholder,
                        textarea::-webkit-input-placeholder {
                            color: #a0aec0 !important;
                        }

                        input::-moz-placeholder,
                        textarea::-moz-placeholder {
                            color: #a0aec0 !important;
                            opacity: 1 !important;
                        }

                        input:-ms-input-placeholder,
                        textarea:-ms-input-placeholder {
                            color: #a0aec0 !important;
                        }
                    </style>

                    <div>
                        <form id="myForm"
                            style="background: rgba(255, 255, 255, 0.95); padding: 3rem; border-radius: 25px; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1); backdrop-filter: blur(10px); animation: fadeInRight 0.8s ease-out 0.3s both; max-width: 600px; width: 100%;">
                            @csrf
                            <p
                                style="text-align: center; margin-bottom: 2.5rem; font-size: 1.8rem; font-weight: 700; color: #2d3748; position: relative;">
                                Send Us a Message
                                <span
                                    style="position: absolute; right: -30px; top: 0; animation: sparkle 2s ease-in-out infinite;">✨</span>
                            </p>

                            <div
                                style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                                <div style="position: relative; transition: transform 0.3s ease;">
                                    <label for="name"
                                        style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #2d3748;">Name</label>
                                    <input type="text" name="name" id="name" required
                                        style="width: 100%; padding: 1.2rem 1.5rem; border: 2px solid #e2e8f0; border-radius: 15px; font-size: 1rem; transition: all 0.3s ease; background: white; outline: none; box-sizing: border-box; color: #2d3748;"
                                        onfocus="this.style.borderColor='#4ecdc4'; this.style.boxShadow='0 0 0 3px rgba(78, 205, 196, 0.1)'; this.style.transform='translateY(-2px)'; this.parentElement.style.transform='scale(1.02)'"
                                        onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'; this.style.transform='translateY(0)'; this.parentElement.style.transform='scale(1)'">
                                </div>
                                <div style="position: relative; transition: transform 0.3s ease;">
                                    <label for="email"
                                        style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #2d3748;">Email</label>
                                    <input type="email" name="email" id="email" required
                                        style="width: 100%; padding: 1.2rem 1.5rem; border: 2px solid #e2e8f0; border-radius: 15px; font-size: 1rem; transition: all 0.3s ease; background: white; outline: none; box-sizing: border-box; color: #2d3748;"
                                        onfocus="this.style.borderColor='#4ecdc4'; this.style.boxShadow='0 0 0 3px rgba(78, 205, 196, 0.1)'; this.style.transform='translateY(-2px)'; this.parentElement.style.transform='scale(1.02)'"
                                        onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'; this.style.transform='translateY(0)'; this.parentElement.style.transform='scale(1)'">
                                </div>
                            </div>

                            <div style="position: relative; margin-bottom: 1.5rem; transition: transform 0.3s ease;">
                                <label for="subject"
                                    style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #2d3748;">Subject</label>
                                <input type="text" name="subject" id="subject" required
                                    style="width: 100%; color: #2d3748; padding: 1.2rem 1.5rem; border: 2px solid #e2e8f0; border-radius: 15px; font-size: 1rem; transition: all 0.3s ease; background: white; outline: none; box-sizing: border-box;"
                                    onfocus="this.style.borderColor='#4ecdc4'; this.style.boxShadow='0 0 0 3px rgba(78, 205, 196, 0.1)'; this.style.transform='translateY(-2px)'; this.parentElement.style.transform='scale(1.02)'"
                                    onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'; this.style.transform='translateY(0)'; this.parentElement.style.transform='scale(1)'">
                            </div>

                            <div style="position: relative; margin-bottom: 2rem; transition: transform 0.3s ease;">
                                <label for="message"
                                    style="display: block; margin-bottom: 0.5rem; font-weight: 600; color: #2d3748;">Message</label>
                                <textarea name="message" id="message" rows="4" required
                                    style="width: 100%; padding: 1.2rem 1.5rem; border: 2px solid #e2e8f0; border-radius: 15px; font-size: 1rem; transition: all 0.3s ease; background: white; outline: none; min-height: 120px; resize: vertical; font-family: inherit; box-sizing: border-box; color: #2d3748;"
                                    onfocus="this.style.borderColor='#4ecdc4'; this.style.boxShadow='0 0 0 3px rgba(78, 205, 196, 0.1)'; this.style.transform='translateY(-2px)'; this.parentElement.style.transform='scale(1.02)'"
                                    onblur="this.style.borderColor='#e2e8f0'; this.style.boxShadow='none'; this.style.transform='translateY(0)'; this.parentElement.style.transform='scale(1)'"></textarea>
                            </div>

                            <button type="submit"
                                style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 1.2rem 3rem; border: none; border-radius: 50px; font-size: 1.1rem; font-weight: 600; cursor: pointer; transition: all 0.3s ease; position: relative; overflow: hidden; margin: 0 auto; display: block; min-width: 200px;"
                                onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 35px rgba(102, 126, 234, 0.4)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                onmousedown="this.style.transform='translateY(-1px)'">
                                Send Message
                            </button>
                        </form>

                    </div>

                </div>
            </div>
        </section>
    </div>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const btn = this.querySelector('button[type="submit"]');
            const originalText = btn.textContent;

            btn.textContent = 'Sending...';
            btn.style.background = 'linear-gradient(135deg, #4ecdc4 0%, #44a08d 100%)';

            setTimeout(() => {
                btn.textContent = 'Message Sent! ✓';
                btn.style.background = 'linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%)';

                setTimeout(() => {
                    btn.textContent = originalText;
                    btn.style.background = 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)';
                    this.reset();
                }, 2000);
            }, 1500);
        });

        // Add typing animation for the title
        const title = document.querySelector('h2');
        const text = title.textContent;
        title.textContent = '';

        let i = 0;

        function typeWriter() {
            if (i < text.length) {
                title.textContent += text.charAt(i);
                i++;
                setTimeout(typeWriter, 100);
            }
        }

        setTimeout(typeWriter, 500);

        // Add media query styles for mobile responsiveness
        function applyMobileStyles() {
            if (window.innerWidth <= 768) {
                const gridContainer = document.querySelector('div[style*="grid-template-columns: 1fr 1fr"]');
                if (gridContainer) {
                    gridContainer.style.gridTemplateColumns = '1fr';
                    gridContainer.style.gap = '2rem';
                }

                const container = document.querySelector('div[style*="padding: 4rem 2rem"]');
                if (container) {
                    container.style.padding = '2rem 1rem';
                }

                const heading = document.querySelector('h2');
                if (heading) {
                    heading.style.fontSize = '2rem';
                }

                const formRowGrid = document.querySelector('div[style*="grid-template-columns: 1fr 1fr"]');
                if (formRowGrid) {
                    formRowGrid.style.gridTemplateColumns = '1fr';
                }

                const form = document.querySelector('form');
                if (form) {
                    form.style.padding = '2rem';
                }
            }
        }

        applyMobileStyles();
        window.addEventListener('resize', applyMobileStyles);
    </script>
    <!-- end contact section -->
@endsection
