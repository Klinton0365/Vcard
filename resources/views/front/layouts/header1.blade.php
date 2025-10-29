<!-- start header section -->
<style>
    /* Fixed Header CSS - Always stays on top */
    .header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        z-index: 9999;
        /* Very high z-index to stay above everything */
        transition: all 0.3s ease;
        background: transparent;
        /* No background by default */
    }

    /* Ensure the header has proper background and doesn't interfere with scrolling */
    .header .container {
        background-color: inherit;
    }

    /* Add padding to body to prevent content from hiding behind fixed header */

    /* For RTL direction header */
    .header[dir="rtl"] {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        z-index: 9999;
        background: transparent;
        box-shadow: none;
    }

    /* Show blurry transparent background on scroll */
    .header.scrolled {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .header.scrolled[dir="rtl"] {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Ensure navbar toggler and dropdowns work properly with fixed positioning */
    .header .navbar-collapse {
        background-color: inherit;
    }

    .header .dropdown-menu {
        z-index: 10000;
        /* Even higher z-index for dropdowns */
    }

    /* Mobile responsive adjustments */
    @media (max-width: 991.98px) {
        body {
            padding-top: 70px;
            /* Adjust for smaller header on mobile */
        }

        .header .navbar-collapse {
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(222, 226, 230, 0.5);
            margin-top: 10px;
            padding: 15px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header.scrolled .navbar-collapse {
            background-color: #ffffff;
            backdrop-filter: none;
            border-top: 1px solid #dee2e6;
        }
    }

    @media (max-width: 767.98px) {
        body {
            padding-top: 60px;
            /* Further adjust for very small screens */
        }
    }

    /* Ensure no content can appear above the header */
    * {
        position: relative;
    }

    .header {
        position: fixed !important;
        z-index: 9999 !important;
    }

    /* Optional: Add smooth scroll behavior when navigating to anchors */
    html {
        scroll-behavior: smooth;
        scroll-padding-top: 100px;
        /* Accounts for fixed header when jumping to anchors */
    }
</style>

<script>
// JavaScript to add/remove 'scrolled' class based on scroll position
window.addEventListener('scroll', function() {
    const header = document.querySelector('.header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});
</script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<header class="header" @if (checkFrontLanguageSession() == 'ar') dir="rtl" @endif>
    <div class="container" id="frontHomeTab">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-2 col-md-8 col-sm-7 col-5 order-lg-1 order-0">
                <a class="navbar-brand p-0" href="#">
                    {{-- <img src="{{ getLogoUrl() }}" alt="company-logo" class="w-auto h-100" /> --}}
                    <img src="{{ asset('assets/images/popup-logo.png') }}" alt="company-logo" class="w-auto h-100" />
                </a>
            </div>
            <div class="col-lg-10 col-sm-1 col-2 order-lg-1 order-2">
                <nav class="navbar navbar-expand-lg navbar-light justify-content-end">
                    <div class="navbar-toggler mt-2 nav-btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation" id="toogler-icon">
                        <span class="navbar-toggler-icon top-bar"></span>
                        <span class="navbar-toggler-icon middle-bar"></span>
                        <span class="navbar-toggler-icon bottom-bar"></span>
                    </div>
                    <div class="navbar-collapse justify-content-end new-home-nav d-none" id="navbarNav">
                        <ul class="navbar-nav align-items-lg-center" data-turbo="false">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" data-turbo="false"
                                    href="{{ asset('') . '#frontHomeTab' }}">{{ __('auth.home') }}</a>
                            </li>
                            {{-- <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ asset('') . '#frontFeaturesTab' }}">{{ __('auth.features') }}</a>
                                </li> --}}
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ asset('') . '#frontAboutTabUsTab' }}">{{ __('auth.about') }}</a>
                            </li>
                            <li class="nav-item @if ($faqs === null) d-none @endif">
                                <a class="nav-link" href="{{ route('fornt-faq') }}">{{ __('messages.faqs.faqs') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ asset('') . '#frontPricingTab' }}">{{ __('auth.pricing') }}</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link mt-1"
                                    href="{{ route('fornt-blog') }}">{{ __('messages.blog.blogs') }} </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ asset('') . '#frontContactUsTab' }}">{{ __('auth.contact') }}</a>
                            </li>
<li class="nav-item">
    <div class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
            data-bs-toggle="dropdown" aria-expanded="false">
            {{ __('messages.language') }} <i class="fas fa-chevron-down ms-1"></i>
        </a>
        <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuLink">
            @foreach (getAllLanguageWithFullData() as $key => $language)
                <li class="languageSelection {{ checkFrontLanguageSession() == $key ? 'active' : '' }}"
                    data-prefix-value="{{ $language->iso_code }}">
                    <a href="javascript:void(0)"
                        class="nav-link d-flex align-items-center dropdown-item {{ checkFrontLanguageSession() == $key ? 'active' : '' }}">
                        @if (array_key_exists($language->iso_code, \App\Models\User::FLAG))
                            @foreach (\App\Models\User::FLAG as $imageKey => $imageValue)
                                @if ($imageKey == $language->iso_code)
                                    <img src="{{ asset($imageValue) }}" class="me-1" />
                                @endif
                            @endforeach
                        @else
                            @if (count($language->media) != 0)
                                <img src="{{ $language->image_url }}" class="me-1" />
                            @else
                                <i class="fa fa-flag fa-xl me-3 text-danger" aria-hidden="true"></i>
                            @endif
                        @endif
                        {{ $language->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</li>
                            @if (empty(getLogInUser()))
                                <li>
                                    <a class="btn btn-white fs-18 d-lg-block d-none" href="{{ route('login') }}"
                                        role="button" data-turbo="false">{{ __('auth.sign_in') }}</a>
                                </li>
                            @else
                                @if (getLogInUser()->hasrole('admin') || getLogInUser()->hasrole('user'))
                                    <li>
                                        <a class="btn btn-white fs-18 d-lg-block d-none"
                                            href="{{ route('admin.dashboard') }}" role="button"
                                            data-turbo="false">{{ __('messages.dashboard') }}</a>
                                    </li>
                                @endif
                                @if (getLogInUser()->hasrole('super_admin'))
                                    <li>
                                        <a class="btn btn-white fs-18 d-lg-block d-none"
                                            href="{{ route('sadmin.dashboard') }}" role="button"
                                            data-turbo="false">{{ __('messages.dashboard') }}</a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-5 text-end order-lg-2 order-1 pe-lg-2 pe-0 ps-0 d-lg-none">

                @if (empty(getLogInUser()))
                    <a class="btn btn-white fs-18 me-sm-2" href="{{ route('login') }}" data-turbo="false"
                        role="button">
                        <span>{{ __('auth.sign_in') }}</span>
                    </a>
                @else
                    @if (getLogInUser()->hasrole('admin') || getLogInUser()->hasrole('user'))
                        <span> <a class="btn btn-white fs-18 me-sm-2" href="{{ route('admin.dashboard') }}"
                                data-turbo="false" role="button">
                                {{ __('messages.dashboard') }}
                            </a></span>
                    @endif
                    @if (getLogInUser()->hasrole('super_admin'))
                        <span><a class="btn btn-white fs-18 me-sm-2" href="{{ route('sadmin.dashboard') }}"
                                data-turbo="false" role="button">
                                {{ __('messages.dashboard') }}
                            </a></span>
                    @endif
                @endif

            </div>
        </div>
    </div>
</header>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- end header section -->