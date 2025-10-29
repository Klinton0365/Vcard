    <!-- start footer section -->
    <div class="curve-shape">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 4000 275">
            <path fill="#f3f3ff" d="M4000,125.3V275H0V109.9C1907.2,615.4,2670.5-323.1,4000,125.3z"></path>
        </svg>
    </div>
    @if (checkFrontLanguageSession() != 'ar')
        <footer class="bg-light">
            @if (isset($setting['mobile_app_enable']) && $setting['mobile_app_enable'] == 1)
                <div class="container">
                    <div class="footer-section">
                        <div class="row align-items-center flex-lg-row pt-4">
                            <div class="col-lg-6 mb-lg-0 mb-40 text-lg-start text-center mt-md-4">
                                <div class="footer-img pb-3 pt-0 pt-xl-4 pt-lg-0" style="height: 150px;">
                                    <img src="{{ getDashboardLogoUrl() }}" class="img-fluid w-auto h-100 me-2"
                                        alt="img">
                                    <span class="app-name fs-5 pt-2">{{ getAppName() }}</span>
                                </div>
                                <div class="main-social-links my-3">
                                    @if (isset($setting['website_link']) && !empty($setting['website_link']))
                                        <a class="globe" href="{{ $setting['website_link'] }}"><i
                                                class="fas fa-globe"></i></a>
                                    @endif
                                    @if (isset($setting['twitter_link']) && !empty($setting['twitter_link']))
                                        <a class="twitter" href="{{ $setting['twitter_link'] }}">
                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                width="19px" height="19px">
                                                <path
                                                    d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                            </svg>
                                        </a>
                                    @endif
                                    @if (isset($setting['facebook_link']) && !empty($setting['facebook_link']))
                                        <a class="facebook" href="{{ $setting['facebook_link'] }}"><i
                                                class="fab fa-facebook-square"></i></a>
                                    @endif
                                    @if (isset($setting['instagram_link']) && !empty($setting['instagram_link']))
                                        <a class="instagram" href="{{ $setting['instagram_link'] }}"><i
                                                class="fab fa-instagram"></i></a>
                                    @endif
                                    @if (isset($setting['youtube_link']) && !empty($setting['youtube_link']))
                                        <a class="youtube" href="{{ $setting['youtube_link'] }}"><i
                                                class="fab fa-youtube"></i></a>
                                    @endif
                                    @if (isset($setting['tumbir_link']) && !empty($setting['tumbir_link']))
                                        <a class="tumblr" href="{{ $setting['tumbir_link'] }}"><i
                                                class="fab fa-tumblr-square"></i></a>
                                    @endif
                                    @if (isset($setting['reddit_link']) && !empty($setting['reddit_link']))
                                        <a class="reddit" href="{{ $setting['reddit_link'] }}"><i
                                                class="fab fa-reddit-alien"></i></a>
                                    @endif
                                    @if (isset($setting['linkedin_link']) && !empty($setting['linkedin_link']))
                                        <a class="linkedin" href="{{ $setting['linkedin_link'] }}"><i
                                                class="fab fa-linkedin"></i></a>
                                    @endif
                                    @if (isset($setting['whatsapp_link']) && !empty($setting['whatsapp_link']))
                                        <a class="whatsapp" href="{{ $setting['whatsapp_link'] }}"><i
                                                class="fab fa-whatsapp"></i></a>
                                    @endif
                                    @if (isset($setting['pinterest_link']) && !empty($setting['pinterest_link']))
                                        <a class="pinterest" href="{{ $setting['pinterest_link'] }}"><i
                                                class="fab fa-pinterest"></i></a>
                                    @endif
                                    @if (isset($setting['tiktok_link']) && !empty($setting['tiktok_link']))
                                        <a class="tiktok" href="{{ $setting['tiktok_link'] }}"><i
                                                class="fab fa-tiktok"></i></a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pt-4 pt-lg-5 ">
                                <div class="text-center pe-xxl-3">
                                    <h3 class="fs-30 mb-20 mb-lg-1">{{ __('messages.Subscribe_Our_Newsletter') }}
                                    </h3>
                                    <p class="text-gray-100 fs-18 mb-40 pb-lg-3">
                                        {{ __('messages.Receive_latest_news_update_and_many_other_things_every_week') }}
                                    </p>
                                </div>
                                <form action="{{ route('email.sub') }}" method="post" id="addEmail">
                                    @csrf()
                                    <div class="email">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="{{ __('messages.front.enter_your_email') }}" required>
                                        <div class=" subscribe-btn text-sm-end text-center mt-sm-0 mt-4">
                                            <button type="submit"
                                                class="btn btn-primary h-100 subscribeBtn">{{ __('messages.subscribe') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center pb-md-4 pb-3 ">
                        <div class="col-lg-4 text-md-start text-center mb-md-0 mb-2">
                            <p class="text-black fw-light mb-0">
                                © {{ \Carbon\Carbon::now()->year }} {{ __('auth.copyright_by') . ' ' }}<span
                                    class="fw-6">{{ $setting['app_name'] }}</span>
                            </p>
                        </div>
                        <div class="col-lg-8 text-md-end">
                            <div class="d-flex justify-content-md-end justify-content-center flex-wrap">
                                <a href="{{ route('terms.conditions') }}"
                                    class="text-black text-decoration-none me-3">{!! __('messages.vcard.term_condition') !!}</a>
                                <a href="{{ route('privacy.policy') }}"
                                    class="text-black text-decoration-none me-3">{{ __('messages.vcard.privacy_policy') }}</a>
                                <a href="{{ route('refund.cancellation.policy') }}"
                                    class="text-black text-decoration-none me-3">{{ __('messages.vcard.refund_&_cancellation') }}</a>
                                <a href="{{ route('shipping.delivery.policy') }}"
                                    class="text-black text-decoration-none">{{ __('messages.vcard.shipping_&_delivery') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                {{-- <div class="container">
                    <div class="row align-items-center flex-lg-row flex-column-reverse pt-50 pb-40">
                        <div class="col-lg-6">
                            <div class="text-lg-start text-center pe-xxl-5 me-xxl-5">
                                <h3 class="fs-30 mb-20">{{ __('messages.Subscribe_Our_Newsletter') }}</h3>
                                <p class="text-gray-100 fs-18 mb-40 pb-lg-3 pe-xl-5 me-xl-5">
                                    {{ __('messages.Receive_latest_news_update_and_many_other_things_every_week') }}
                                </p>
                            </div>
                            <form action="{{ route('email.sub') }}" method="post" id="addEmail">
                                @csrf()
                                <div class="email">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="{{ __('messages.front.enter_your_email') }}" required>
                                    <div class=" subscribe-btn text-sm-end text-center mt-sm-0 mt-4">
                                        <button type="submit"
                                            class="btn btn-primary h-100 subscribeBtn">{{ __('messages.subscribe') }}</button>
                                    </div>
                                </div>
                            </form>
                            <div class="main-social-links my-3">
                                @if (isset($setting['website_link']) && !empty($setting['website_link']))
                                    <a class="globe" href="{{ $setting['website_link'] }}"><i
                                            class="fas fa-globe"></i></a>
                                @endif
                                @if (isset($setting['twitter_link']) && !empty($setting['twitter_link']))
                                    <a class="twitter" href="{{ $setting['twitter_link'] }}">
                                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            width="19px" height="19px">
                                            <path
                                                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                        </svg>
                                    </a>
                                @endif
                                @if (isset($setting['facebook_link']) && !empty($setting['facebook_link']))
                                    <a class="facebook" href="{{ $setting['facebook_link'] }}"><i
                                            class="fab fa-facebook-square"></i></a>
                                @endif
                                @if (isset($setting['instagram_link']) && !empty($setting['instagram_link']))
                                    <a class="instagram" href="{{ $setting['instagram_link'] }}"><i
                                            class="fab fa-instagram"></i></a>
                                @endif
                                @if (isset($setting['youtube_link']) && !empty($setting['youtube_link']))
                                    <a class="youtube" href="{{ $setting['youtube_link'] }}"><i
                                            class="fab fa-youtube"></i></a>
                                @endif
                                @if (isset($setting['tumbir_link']) && !empty($setting['tumbir_link']))
                                    <a class="tumblr" href="{{ $setting['tumbir_link'] }}"><i
                                            class="fab fa-tumblr-square"></i></a>
                                @endif
                                @if (isset($setting['reddit_link']) && !empty($setting['reddit_link']))
                                    <a class="reddit" href="{{ $setting['reddit_link'] }}"><i
                                            class="fab fa-reddit-alien"></i></a>
                                @endif
                                @if (isset($setting['linkedin_link']) && !empty($setting['linkedin_link']))
                                    <a class="linkedin" href="{{ $setting['linkedin_link'] }}"><i
                                            class="fab fa-linkedin"></i></a>
                                @endif
                                @if (isset($setting['whatsapp_link']) && !empty($setting['whatsapp_link']))
                                    <a class="whatsapp" href="{{ $setting['whatsapp_link'] }}"><i
                                            class="fab fa-whatsapp"></i></a>
                                @endif
                                @if (isset($setting['pinterest_link']) && !empty($setting['pinterest_link']))
                                    <a class="pinterest" href="{{ $setting['pinterest_link'] }}"><i
                                            class="fab fa-pinterest"></i></a>
                                @endif
                                @if (isset($setting['tiktok_link']) && !empty($setting['tiktok_link']))
                                    <a class="tiktok" href="{{ $setting['tiktok_link'] }}"><i
                                            class="fab fa-tiktok"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 text-lg-end text-center mb-lg-0 mb-40">
                            <div class="footer-img ">
                                <img src="{{ asset('assets/img/new_home_page/footer-img.png') }}"
                                    class="zoom-in-zoom-out img-fluid w-auto h-100" alt="img">
                            </div>

                        </div>
                    </div>
                    <div class="row align-items-center pb-md-4 pb-3 ">
                        <div class="col-lg-4 text-md-start text-center mb-md-0 mb-2">
                            <p class="text-black fw-light mb-0">
                                © {{ \Carbon\Carbon::now()->year }} {{ __('auth.copyright_by') . ' ' }}<span
                                    class="fw-6">{{ $setting['app_name'] }}</span>
                            </p>
                        </div>
                        <div class="col-lg-8 text-md-end">
                            <div class="d-flex justify-content-md-end justify-content-center flex-wrap">
                                <a href="{{ route('terms.conditions') }}"
                                    class="text-black text-decoration-none me-3">{!! __('messages.vcard.term_condition') !!}</a>
                                <a href="{{ route('privacy.policy') }}"
                                    class="text-black text-decoration-none me-3">{{ __('messages.vcard.privacy_policy') }}</a>
                                <a href="{{ route('refund.cancellation.policy') }}"
                                    class="text-black text-decoration-none me-3">{{ __('messages.vcard.refund_&_cancellation') }}</a>
                                <a href="{{ route('shipping.delivery.policy') }}"
                                    class="text-black text-decoration-none">{{ __('messages.vcard.shipping_&_delivery') }}</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div
                    style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #f8fafc;">

                    <!-- Newsletter Section -->
                    <div
                        style="background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #ec4899 100%); position: relative; overflow: hidden; padding: 80px 20px; min-height: 500px;">
                        <!-- Animated Background Elements -->
                        <div
                            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(255,255,255,0.08) 0%, transparent 50%); animation: drift 15s ease-in-out infinite;">
                        </div>

                        <!-- Floating Shapes -->
                        <div
                            style="position: absolute; top: 15%; right: 10%; width: 120px; height: 120px; background: rgba(255,255,255,0.08); border-radius: 50%; animation: float 6s ease-in-out infinite;">
                        </div>
                        <div
                            style="position: absolute; bottom: 20%; left: 8%; width: 80px; height: 80px; background: rgba(255,255,255,0.05); border-radius: 20px; transform: rotate(45deg); animation: float 8s ease-in-out infinite reverse;">
                        </div>
                        <div
                            style="position: absolute; top: 30%; left: 20%; width: 60px; height: 60px; background: rgba(255,255,255,0.06); border-radius: 50%; animation: pulse 4s ease-in-out infinite;">
                        </div>

                        <div style="max-width: 1200px; margin: 0 auto; position: relative; z-index: 2;">
                            <div style="display: flex; align-items: center; gap: 60px; flex-wrap: wrap;">

                                <!-- Left Content Section -->
                                <div style="flex: 1; min-width: 300px; color: white;">
                                    <div style="margin-bottom: 40px;">
                                        <h3
                                            style="font-size: 48px; font-weight: 800; margin: 0 0 25px 0; line-height: 1.2; background: linear-gradient(45deg, #ffffff, #f0f0f0); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: -1px;">
                                            Subscribe to Our Newsletter
                                        </h3>
                                        <p
                                            style="font-size: 18px; line-height: 1.7; margin: 0; color: rgba(255,255,255,0.85); max-width: 480px;">
                                            Stay ahead of the curve with exclusive insights, latest updates, and premium
                                            content delivered directly to your inbox every week.
                                        </p>
                                    </div>

                                    <!-- Newsletter Form -->
                                    <form style="margin-bottom: 40px; max-width: 500px;">
                                        <div style="position: relative; display: flex; gap: 15px; flex-wrap: wrap;">
                                            <div style="flex: 1; min-width: 250px; position: relative;">
                                                <input type="email" name="email"
                                                    placeholder="Enter your email address" required
                                                    style="width: 100%; padding: 20px 25px; border: 2px solid rgba(255,255,255,0.2); border-radius: 20px; background: rgba(255,255,255,0.1); color: white; font-size: 16px; outline: none; transition: all 0.3s ease; backdrop-filter: blur(15px); box-sizing: border-box; font-weight: 500;"
                                                    onfocus="this.style.borderColor='rgba(255,255,255,0.5)'; this.style.background='rgba(255,255,255,0.15)'; this.style.transform='scale(1.02)'"
                                                    onblur="this.style.borderColor='rgba(255,255,255,0.2)'; this.style.background='rgba(255,255,255,0.1)'; this.style.transform='scale(1)'">
                                            </div>

                                            <button type="submit"
                                                style="padding: 20px 35px; background: linear-gradient(45deg, #ff6b6b, #ffa500); border: none; border-radius: 20px; color: white; font-size: 16px; font-weight: 700; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 10px 30px rgba(255,107,107,0.4); text-transform: uppercase; letter-spacing: 1px; min-width: 140px; white-space: nowrap;"
                                                onmouseover="this.style.transform='translateY(-3px) scale(1.05)'; this.style.boxShadow='0 15px 40px rgba(255,107,107,0.5)'; this.style.background='linear-gradient(45deg, #ff5252, #ff9800)'"
                                                onmouseout="this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 10px 30px rgba(255,107,107,0.4)'; this.style.background='linear-gradient(45deg, #ff6b6b, #ffa500)'"
                                                onmousedown="this.style.transform='translateY(0) scale(0.98)'"
                                                onmouseup="this.style.transform='translateY(-3px) scale(1.05)'">
                                                Subscribe
                                            </button>
                                        </div>

                                        <div
                                            style="margin-top: 15px; font-size: 14px; color: rgba(255,255,255,0.6); display: flex; align-items: center; gap: 8px;">
                                            <i class="fas fa-shield-alt" style="font-size: 14px;"></i>
                                            <span>100% secure. No spam. Unsubscribe anytime.</span>
                                        </div>
                                    </form>

                                    <!-- Social Media Links -->
                                    <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                                        <span
                                            style="font-size: 16px; font-weight: 600; color: rgba(255,255,255,0.8); margin-right: 10px;">Follow
                                            us:</span>

                                        <!-- Website -->
                                        <a href="#"
                                            style="display: flex; align-items: center; justify-content: center; width: 55px; height: 55px; background: rgba(255,255,255,0.15); border-radius: 18px; color: white; text-decoration: none; transition: all 0.3s ease; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);"
                                            onmouseover="this.style.background='rgba(255,255,255,0.25)'; this.style.transform='translateY(-3px) scale(1.1)'; this.style.boxShadow='0 12px 30px rgba(0,0,0,0.2)'"
                                            onmouseout="this.style.background='rgba(255,255,255,0.15)'; this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='none'">
                                            <i class="fas fa-globe" style="font-size: 20px;"></i>
                                        </a>

                                        <!-- Twitter/X -->
                                        <a href="#"
                                            style="display: flex; align-items: center; justify-content: center; width: 55px; height: 55px; background: rgba(255,255,255,0.15); border-radius: 18px; color: white; text-decoration: none; transition: all 0.3s ease; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);"
                                            onmouseover="this.style.background='#1da1f2'; this.style.transform='translateY(-3px) scale(1.1)'; this.style.boxShadow='0 12px 30px rgba(29,161,242,0.4)'"
                                            onmouseout="this.style.background='rgba(255,255,255,0.15)'; this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='none'">
                                            <i class="fab fa-twitter" style="font-size: 20px;"></i>
                                        </a>

                                        <!-- Instagram -->
                                        <a href="#"
                                            style="display: flex; align-items: center; justify-content: center; width: 55px; height: 55px; background: rgba(255,255,255,0.15); border-radius: 18px; color: white; text-decoration: none; transition: all 0.3s ease; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);"
                                            onmouseover="this.style.background='linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%)'; this.style.transform='translateY(-3px) scale(1.1)'; this.style.boxShadow='0 12px 30px rgba(225,48,108,0.4)'"
                                            onmouseout="this.style.background='rgba(255,255,255,0.15)'; this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='none'">
                                            <i class="fab fa-instagram" style="font-size: 20px;"></i>
                                        </a>

                                        <!-- LinkedIn -->
                                        <a href="#"
                                            style="display: flex; align-items: center; justify-content: center; width: 55px; height: 55px; background: rgba(255,255,255,0.15); border-radius: 18px; color: white; text-decoration: none; transition: all 0.3s ease; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);"
                                            onmouseover="this.style.background='#0077b5'; this.style.transform='translateY(-3px) scale(1.1)'; this.style.boxShadow='0 12px 30px rgba(0,119,181,0.4)'"
                                            onmouseout="this.style.background='rgba(255,255,255,0.15)'; this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='none'">
                                            <i class="fab fa-linkedin-in" style="font-size: 20px;"></i>
                                        </a>

                                        <!-- WhatsApp -->
                                        <a href="#"
                                            style="display: flex; align-items: center; justify-content: center; width: 55px; height: 55px; background: rgba(255,255,255,0.15); border-radius: 18px; color: white; text-decoration: none; transition: all 0.3s ease; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2);"
                                            onmouseover="this.style.background='#25D366'; this.style.transform='translateY(-3px) scale(1.1)'; this.style.boxShadow='0 12px 30px rgba(37,211,102,0.4)'"
                                            onmouseout="this.style.background='rgba(255,255,255,0.15)'; this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='none'">
                                            <i class="fab fa-whatsapp" style="font-size: 20px;"></i>
                                        </a>

                                    </div>
                                </div>

                                <!-- Right Image Section -->
                                <div style="flex: 1; min-width: 300px; text-align: center;">
                                    <div
                                        style="position: relative; display: inline-block; animation: levitate 6s ease-in-out infinite;">
                                        <div style="background: rgba(255,255,255,0.1); padding: 30px; border-radius: 30px; backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.2); box-shadow: 0 20px 60px rgba(0,0,0,0.1); transform: perspective(1000px) rotateY(-5deg) rotateX(5deg); transition: transform 0.3s ease;"
                                            onmouseover="this.style.transform='perspective(1000px) rotateY(0deg) rotateX(0deg) scale(1.05)'"
                                            onmouseout="this.style.transform='perspective(1000px) rotateY(-5deg) rotateX(5deg) scale(1)'">
                                            <img src="{{ asset('assets/images/popup-logo.png') }}" alt="company-logo"
                                                style="width: 100%; max-width: 400px; height: auto; border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.2);"
                                                alt="Newsletter Image">
                                        </div>

                                        <!-- Floating badges -->
                                        <div
                                            style="position: absolute; top: -10px; right: -10px; background: linear-gradient(45deg, #ff6b6b, #ffa500); padding: 8px 16px; border-radius: 25px; color: white; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; box-shadow: 0 8px 25px rgba(255,107,107,0.4); animation: bounce 2s ease-in-out infinite;">
                                            New!
                                        </div>

                                        <div
                                            style="position: absolute; bottom: -15px; left: -15px; background: rgba(255,255,255,0.9); padding: 10px 20px; border-radius: 20px; color: #4f46e5; font-size: 14px; font-weight: 600; box-shadow: 0 10px 30px rgba(0,0,0,0.1); backdrop-filter: blur(10px);">
                                            <i class="fas fa-users" style="margin-right: 8px;"></i>
                                            10K+ Subscribers
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Section -->
                    <div style="background: #ffffff; padding: 10px 20px; border-top: 1px solid #e5e7eb;">
                        <div style="max-width: 1200px; margin: 0 auto;">
                            <div
                                style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 20px;">

                                <!-- Copyright -->
                                <div style="color: #6b7280; font-size: 14px; font-weight: 400;">
                                    <p style="margin: 0; display: flex; align-items: center; gap: 8px;">
                                        <i class="fas fa-copyright" style="font-size: 12px;"></i>
                                        <span>2025 Copyright by <strong style="color: #1f2937; font-weight: 600;">WEB
                                                DIGITAL MANTRA IT SERVICES PVT LTD</strong></span>
                                    </p>
                                </div>

                                <!-- Footer Links -->
                                <div style="display: flex; align-items: center; gap: 25px; flex-wrap: wrap;">
                                    <a href="{{ route('terms.conditions') }}"
                                        style="color: #6b7280; text-decoration: none; font-size: 14px; font-weight: 500; padding: 8px 12px; border-radius: 8px; transition: all 0.3s ease;"
                                        onmouseover="this.style.color='#4f46e5'; this.style.background='rgba(79,70,229,0.1)'"
                                        onmouseout="this.style.color='#6b7280'; this.style.background='transparent'">
                                        Terms & Conditions
                                    </a>
                                    <a href="{{ route('privacy.policy') }}"
                                        style="color: #6b7280; text-decoration: none; font-size: 14px; font-weight: 500; padding: 8px 12px; border-radius: 8px; transition: all 0.3s ease;"
                                        onmouseover="this.style.color='#4f46e5'; this.style.background='rgba(79,70,229,0.1)'"
                                        onmouseout="this.style.color='#6b7280'; this.style.background='transparent'">
                                        Privacy Policy
                                    </a>
                                    <a href="{{ route('refund.cancellation.policy') }}"
                                        style="color: #6b7280; text-decoration: none; font-size: 14px; font-weight: 500; padding: 8px 12px; border-radius: 8px; transition: all 0.3s ease;"
                                        onmouseover="this.style.color='#4f46e5'; this.style.background='rgba(79,70,229,0.1)'"
                                        onmouseout="this.style.color='#6b7280'; this.style.background='transparent'">
                                        Refund & Cancellation
                                    </a>
                                    <a href="{{ route('shipping.delivery.policy') }}"
                                        style="color: #6b7280; text-decoration: none; font-size: 14px; font-weight: 500; padding: 8px 12px; border-radius: 8px; transition: all 0.3s ease;"
                                        onmouseover="this.style.color='#4f46e5'; this.style.background='rgba(79,70,229,0.1)'"
                                        onmouseout="this.style.color='#6b7280'; this.style.background='transparent'">
                                        Shipping & Delivery
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    @keyframes float {

                        0%,
                        100% {
                            transform: translateY(0px);
                        }

                        50% {
                            transform: translateY(-15px);
                        }
                    }

                    @keyframes pulse {

                        0%,
                        100% {
                            transform: scale(1);
                            opacity: 0.6;
                        }

                        50% {
                            transform: scale(1.1);
                            opacity: 0.9;
                        }
                    }

                    @keyframes drift {

                        0%,
                        100% {
                            transform: translateX(0px) translateY(0px);
                        }

                        33% {
                            transform: translateX(30px) translateY(-30px);
                        }

                        66% {
                            transform: translateX(-20px) translateY(20px);
                        }
                    }

                    @keyframes levitate {

                        0%,
                        100% {
                            transform: translateY(0px);
                        }

                        50% {
                            transform: translateY(-10px);
                        }
                    }

                    @keyframes bounce {

                        0%,
                        20%,
                        50%,
                        80%,
                        100% {
                            transform: translateY(0);
                        }

                        40% {
                            transform: translateY(-10px);
                        }

                        60% {
                            transform: translateY(-5px);
                        }
                    }

                    input::placeholder {
                        color: rgba(255, 255, 255, 0.6) !important;
                    }

                    /* Responsive Design */
                    @media (max-width: 768px) {
                        div[style*="font-size: 48px"] {
                            font-size: 36px !important;
                        }

                        div[style*="display: flex; gap: 15px"] {
                            flex-direction: column !important;
                        }

                        div[style*="display: flex; align-items: center; gap: 25px"] {
                            justify-content: center !important;
                            text-align: center !important;
                        }

                        div[style*="min-width: 140px"] {
                            width: 100% !important;
                            min-width: auto !important;
                        }
                    }

                    @media (max-width: 480px) {
                        div[style*="display: flex; align-items: center; gap: 15px"] {
                            justify-content: center !important;
                        }

                        div[style*="gap: 25px"] {
                            gap: 15px !important;
                            justify-content: center !important;
                        }
                    }
                </style>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const form = document.querySelector('form');
                        const emailInput = document.querySelector('input[type="email"]');
                        const submitBtn = document.querySelector('button[type="submit"]');

                        // Form submission handling
                        form.addEventListener('submit', function(e) {
                            e.preventDefault();

                            const email = emailInput.value;
                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                            if (emailRegex.test(email)) {
                                // Success state
                                submitBtn.innerHTML =
                                    '<i class="fas fa-check" style="margin-right: 8px;"></i>Subscribed!';
                                submitBtn.style.background = 'linear-gradient(45deg, #10b981, #059669)';
                                submitBtn.style.boxShadow = '0 15px 40px rgba(16,185,129,0.5)';

                                // Reset after 3 seconds
                                setTimeout(() => {
                                    submitBtn.innerHTML = 'Subscribe';
                                    submitBtn.style.background = 'linear-gradient(45deg, #ff6b6b, #ffa500)';
                                    submitBtn.style.boxShadow = '0 10px 30px rgba(255,107,107,0.4)';
                                    emailInput.value = '';
                                }, 3000);
                            } else {
                                // Error state
                                emailInput.style.borderColor = '#ef4444';
                                emailInput.style.background = 'rgba(239,68,68,0.1)';
                                emailInput.style.boxShadow = '0 0 0 3px rgba(239,68,68,0.1)';

                                setTimeout(() => {
                                    emailInput.style.borderColor = 'rgba(255,255,255,0.2)';
                                    emailInput.style.background = 'rgba(255,255,255,0.1)';
                                    emailInput.style.boxShadow = 'none';
                                }, 2000);
                            }
                        });

                        // Add scroll reveal animation
                        const observer = new IntersectionObserver((entries) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                    entry.target.style.opacity = '1';
                                    entry.target.style.transform = 'translateY(0)';
                                }
                            });
                        });

                        // Initially hide elements for reveal effect
                        const revealElements = document.querySelectorAll('div[style*="flex: 1"]');
                        revealElements.forEach(el => {
                            el.style.opacity = '0';
                            el.style.transform = 'translateY(30px)';
                            el.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                            observer.observe(el);
                        });
                    });

                    // Add particle effect on click
                    document.addEventListener('click', function(e) {
                        if (e.target.tagName === 'BUTTON' && e.target.type === 'submit') {
                            createParticles(e.clientX, e.clientY);
                        }
                    });

                    function createParticles(x, y) {
                        for (let i = 0; i < 6; i++) {
                            const particle = document.createElement('div');
                            particle.style.position = 'fixed';
                            particle.style.left = x + 'px';
                            particle.style.top = y + 'px';
                            particle.style.width = '4px';
                            particle.style.height = '4px';
                            particle.style.background = '#ff6b6b';
                            particle.style.borderRadius = '50%';
                            particle.style.pointerEvents = 'none';
                            particle.style.zIndex = '9999';

                            document.body.appendChild(particle);

                            const angle = (i * 60) * Math.PI / 180;
                            const velocity = 50;
                            const vx = Math.cos(angle) * velocity;
                            const vy = Math.sin(angle) * velocity;

                            let opacity = 1;
                            const animate = () => {
                                const rect = particle.getBoundingClientRect();
                                particle.style.left = (rect.left + vx * 0.1) + 'px';
                                particle.style.top = (rect.top + vy * 0.1) + 'px';
                                opacity -= 0.05;
                                particle.style.opacity = opacity;

                                if (opacity > 0) {
                                    requestAnimationFrame(animate);
                                } else {
                                    particle.remove();
                                }
                            };

                            animate();
                        }
                    }
                </script>
            @endif
        </footer>
    @else
        <footer class="bg-light" dir="rtl">
            @if (isset($setting['mobile_app_enable']) && $setting['mobile_app_enable'] == 1)
                <div class="container">
                    <div class="footer-section">
                        <div class="row align-items-center flex-lg-row pt-4">
                            <div class="col-lg-6 mb-lg-0 mb-40 text-lg-start text-center mt-md-4">
                                <div class="footer-img pb-3 pt-0 pt-xl-4 pt-lg-0" style="height: 150px;">
                                    <img src="{{ getDashboardLogoUrl() }}" class="img-fluid w-auto h-100 me-2"
                                        alt="img">
                                    <span class="app-name fs-5 pt-2">{{ getAppName() }}</span>
                                </div>
                                <div class="main-social-links my-3">
                                    @if (isset($setting['website_link']) && !empty($setting['website_link']))
                                        <a class="globe" href="{{ $setting['website_link'] }}"><i
                                                class="fas fa-globe"></i></a>
                                    @endif
                                    @if (isset($setting['twitter_link']) && !empty($setting['twitter_link']))
                                        <a class="twitter" href="{{ $setting['twitter_link'] }}">
                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 512 512" width="19px" height="19px">
                                                <path
                                                    d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                            </svg>
                                        </a>
                                    @endif
                                    @if (isset($setting['facebook_link']) && !empty($setting['facebook_link']))
                                        <a class="facebook" href="{{ $setting['facebook_link'] }}"><i
                                                class="fab fa-facebook-square"></i></a>
                                    @endif
                                    @if (isset($setting['instagram_link']) && !empty($setting['instagram_link']))
                                        <a class="instagram" href="{{ $setting['instagram_link'] }}"><i
                                                class="fab fa-instagram"></i></a>
                                    @endif
                                    @if (isset($setting['youtube_link']) && !empty($setting['youtube_link']))
                                        <a class="youtube" href="{{ $setting['youtube_link'] }}"><i
                                                class="fab fa-youtube"></i></a>
                                    @endif
                                    @if (isset($setting['tumbir_link']) && !empty($setting['tumbir_link']))
                                        <a class="tumblr" href="{{ $setting['tumbir_link'] }}"><i
                                                class="fab fa-tumblr-square"></i></a>
                                    @endif
                                    @if (isset($setting['reddit_link']) && !empty($setting['reddit_link']))
                                        <a class="reddit" href="{{ $setting['reddit_link'] }}"><i
                                                class="fab fa-reddit-alien"></i></a>
                                    @endif
                                    @if (isset($setting['linkedin_link']) && !empty($setting['linkedin_link']))
                                        <a class="linkedin" href="{{ $setting['linkedin_link'] }}"><i
                                                class="fab fa-linkedin"></i></a>
                                    @endif
                                    @if (isset($setting['whatsapp_link']) && !empty($setting['whatsapp_link']))
                                        <a class="whatsapp" href="{{ $setting['whatsapp_link'] }}"><i
                                                class="fab fa-whatsapp"></i></a>
                                    @endif
                                    @if (isset($setting['pinterest_link']) && !empty($setting['pinterest_link']))
                                        <a class="pinterest" href="{{ $setting['pinterest_link'] }}"><i
                                                class="fab fa-pinterest"></i></a>
                                    @endif
                                    @if (isset($setting['tiktok_link']) && !empty($setting['tiktok_link']))
                                        <a class="tiktok" href="{{ $setting['tiktok_link'] }}"><i
                                                class="fab fa-tiktok"></i></a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 pt-4 pt-lg-5 ">
                                <div class="text-center pe-xxl-3">
                                    <h3 class="fs-30 mb-20 mb-lg-1">{{ __('messages.Subscribe_Our_Newsletter') }}
                                    </h3>
                                    <p class="text-gray-100 fs-18 mb-40 pb-lg-3">
                                        {{ __('messages.Receive_latest_news_update_and_many_other_things_every_week') }}
                                    </p>
                                </div>
                                <form action="{{ route('email.sub') }}" method="post" id="addEmail">
                                    @csrf()
                                    <div class="email">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="{{ __('messages.front.enter_your_email') }}" required>
                                        <div class=" subscribe-btn text-sm-end text-center mt-sm-0 mt-4">
                                            <button type="submit"
                                                class="btn btn-primary h-100 subscribeBtn">{{ __('messages.subscribe') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center pb-md-4 pb-3 ">
                        <div class="col-lg-4 text-md-start text-center mb-md-0 mb-2">
                            <p class="text-black fw-light mb-0">
                                © {{ \Carbon\Carbon::now()->year }} {{ __('auth.copyright_by') . ' ' }}<span
                                    class="fw-6">{{ $setting['app_name'] }}</span>
                            </p>
                        </div>
                        <div class="col-lg-8 text-md-end">
                            <div class="d-flex justify-content-md-end justify-content-center flex-wrap">
                                <a href="{{ route('terms.conditions') }}"
                                    class="text-black text-decoration-none ms-3">{!! __('messages.vcard.term_condition') !!}</a>
                                <a href="{{ route('privacy.policy') }}"
                                    class="text-black text-decoration-none ms-3">{{ __('messages.vcard.privacy_policy') }}</a>
                                <a href="{{ route('refund.cancellation.policy') }}"
                                    class="text-black text-decoration-none ms-3">{{ __('messages.vcard.refund_&_cancellation') }}</a>
                                <a href="{{ route('shipping.delivery.policy') }}"
                                    class="text-black text-decoration-none">{{ __('messages.vcard.shipping_&_delivery') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="container">
                    <div class="row align-items-center flex-lg-row flex-column-reverse pt-50 pb-40">
                        <div class="col-lg-6">
                            <div class="text-lg-end text-center pe-xxl-5 me-xxl-5">
                                <h3 class="fs-30 mb-20">{{ __('messages.Subscribe_Our_Newsletter') }}</h3>
                                <p class="text-gray-100 fs-18 mb-40 pb-lg-3 text-lg-end">
                                    {{ __('messages.Receive_latest_news_update_and_many_other_things_every_week') }}
                                </p>
                            </div>
                            <form action="{{ route('email.sub') }}" method="post" id="addEmail">
                                @csrf()
                                <div class="email">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="{{ __('messages.front.enter_your_email') }}" required>
                                    <div class=" subscribe-btn text-sm-end text-center mt-sm-0 mt-4">
                                        <button type="submit"
                                            class="btn btn-primary h-100 subscribeBtn">{{ __('messages.subscribe') }}</button>
                                    </div>
                                </div>
                            </form>
                            <div class="main-social-links my-3">
                                @if (isset($setting['website_link']) && !empty($setting['website_link']))
                                    <a class="globe" href="{{ $setting['website_link'] }}"><i
                                            class="fas fa-globe"></i></a>
                                @endif
                                @if (isset($setting['twitter_link']) && !empty($setting['twitter_link']))
                                    <a class="twitter" href="{{ $setting['twitter_link'] }}">
                                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            width="19px" height="19px">
                                            <path
                                                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                                        </svg>
                                    </a>
                                @endif
                                @if (isset($setting['facebook_link']) && !empty($setting['facebook_link']))
                                    <a class="facebook" href="{{ $setting['facebook_link'] }}"><i
                                            class="fab fa-facebook-square"></i></a>
                                @endif
                                @if (isset($setting['instagram_link']) && !empty($setting['instagram_link']))
                                    <a class="instagram" href="{{ $setting['instagram_link'] }}"><i
                                            class="fab fa-instagram"></i></a>
                                @endif
                                @if (isset($setting['youtube_link']) && !empty($setting['youtube_link']))
                                    <a class="youtube" href="{{ $setting['youtube_link'] }}"><i
                                            class="fab fa-youtube"></i></a>
                                @endif
                                @if (isset($setting['tumbir_link']) && !empty($setting['tumbir_link']))
                                    <a class="tumblr" href="{{ $setting['tumbir_link'] }}"><i
                                            class="fab fa-tumblr-square"></i></a>
                                @endif
                                @if (isset($setting['reddit_link']) && !empty($setting['reddit_link']))
                                    <a class="reddit" href="{{ $setting['reddit_link'] }}"><i
                                            class="fab fa-reddit-alien"></i></a>
                                @endif
                                @if (isset($setting['linkedin_link']) && !empty($setting['linkedin_link']))
                                    <a class="linkedin" href="{{ $setting['linkedin_link'] }}"><i
                                            class="fab fa-linkedin"></i></a>
                                @endif
                                @if (isset($setting['whatsapp_link']) && !empty($setting['whatsapp_link']))
                                    <a class="whatsapp" href="{{ $setting['whatsapp_link'] }}"><i
                                            class="fab fa-whatsapp"></i></a>
                                @endif
                                @if (isset($setting['pinterest_link']) && !empty($setting['pinterest_link']))
                                    <a class="pinterest" href="{{ $setting['pinterest_link'] }}"><i
                                            class="fab fa-pinterest"></i></a>
                                @endif
                                @if (isset($setting['tiktok_link']) && !empty($setting['tiktok_link']))
                                    <a class="tiktok" href="{{ $setting['tiktok_link'] }}"><i
                                            class="fab fa-tiktok"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 text-lg-start text-center mb-lg-0 mb-40">
                            <div class="footer-img ">
                                <img src="{{ asset('assets/img/new_home_page/footer-img.png') }}"
                                    class="zoom-in-zoom-out img-fluid w-auto h-100" alt="img">
                            </div>

                        </div>
                    </div>
                    <div class="row align-items-center pb-md-4 pb-3 ">
                        <div class="col-lg-4 text-md-start text-center mb-md-0 mb-2">
                            <p class="text-black fw-light mb-0">
                                © {{ \Carbon\Carbon::now()->year }} {{ __('auth.copyright_by') . ' ' }}<span
                                    class="fw-6">{{ $setting['app_name'] }}</span>
                            </p>
                        </div>
                        <div class="col-lg-8 text-md-end">
                            <div class="d-flex justify-content-md-end justify-content-center flex-wrap">
                                <a href="{{ route('terms.conditions') }}"
                                    class="text-black text-decoration-none ms-3">{!! __('messages.vcard.term_condition') !!}</a>
                                <a href="{{ route('privacy.policy') }}"
                                    class="text-black text-decoration-none ms-3">{{ __('messages.vcard.privacy_policy') }}</a>
                                <a href="{{ route('refund.cancellation.policy') }}"
                                    class="text-black text-decoration-none ms-3">{{ __('messages.vcard.refund_&_cancellation') }}</a>
                                <a href="{{ route('shipping.delivery.policy') }}"
                                    class="text-black text-decoration-none">{{ __('messages.vcard.shipping_&_delivery') }}</a>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
        </footer>
    @endif
    <!--support banner -->
    @if (isset($setting['banner_enable']) && $setting['banner_enable'] == 1)
        <section class="banner-section bg-light banner-cookie d-none">
            <div class="hero-bg-img text-end">
            </div>
            <div class="container">
                <div class="row mt-5 pt-4 pb-3">
                    <div class="text-center text">
                        <h3>{{ $setting['banner_title'] }}</h3>
                        <p>{{ $setting['banner_description'] }}</p>
                    </div>
                    <div class="text-center pt-2">
                        <a href="{{ $setting['banner_url'] }}" class="btn btn-primary act-now" target="blank"
                            data-turbo="false">{{ $setting['banner_button'] }}</a>
                    </div>
                </div>
            </div>
            <div class="main-banner top-0 left-curve-1">
                <img src="{{ asset('assets/img/new_home_page/left-curve-1.png') }}" class="w-100 h-auto"
                    alt="image">
            </div>
            <div class="main-banner left-curve2">
                <img src="{{ asset('/assets/img/new_home_page/left-curve2.png') }}" class="w-100 h-auto"
                    alt="image">
            </div>

            <div class="main-banner bottom-0 right-curve1">
                <img src="{{ asset('assets/img/new_home_page/right-curve1.png') }}" class="w-100 h-auto"
                    alt="image">
            </div>
            <div class="main-banner right-curve-2">
                <img src="{{ asset('assets/img/new_home_page/right-curve-2.png') }}" class="w-100 " alt="image">
            </div>
            <div class="main-banner square-1">
                <img src="{{ asset('assets/img/new_home_page/squre.png') }}" class="w-100 " alt="image">
            </div>
            <div class="main-banner banner-img-3">
                <img src="{{ asset('assets/img/new_home_page/round-1.png') }}" class="w-100 h-auto" alt="image">
            </div>
            <div class="main-banner square-2">
                <img src="{{ asset('assets/img/new_home_page/squre.png') }}" class="w-100 h-auto" alt="image">
            </div>
            <div class="main-banner banner-img-4">
                <img src="{{ asset('assets/img/new_home_page/round-2.png') }}" class="w-100 h-auto" alt="image">
            </div>
            <div class="main-banner group-dot">
                <img src="{{ asset('assets/img/new_home_page/group-1.png') }}" class="w-100 h-auto" alt="image">
            </div>
            <div class="main-banner squre-img">
                <img src="{{ asset('assets/img/new_home_page/round-1.png') }}" class="w-100 h-auto" alt="image">
            </div>
            <div class="main-banner round-1">
                <img src="{{ asset('assets/img/new_home_page/round-1.png') }}" class="w-100 h-auto" alt="image">
            </div>
            <div class="main-banner group-dot-2">
                <img src="{{ asset('assets/img/new_home_page/group-2.png') }}" class="w-100 h-auto" alt="image">
            </div>
            <div class="main-banner triangel-img">
                <img src="{{ asset('assets/img/new_home_page/triangel.png') }}" class="w-100 h-auto"
                    alt="image">
            </div>
            <div class="main-banner close-btn bg-transparent">
                <button type="button" class="border-0 bg-transparent disbale-cookie"><i
                        class="fa-solid fa-xmark"></i></button>
            </div>
        </section>
    @endif
    <!-- end footer section -->
