@extends('layouts.auth')
{{-- @dd(trans('website.register.title'))                                                         --}}
@section('title', trans("website.register.title"))
@section('og_title',  trans("website.register.og_title") )
@section('seo_description', settingText('register_seo_description', 'short_description'))
@section('og_description', settingText('register_seo_description', 'short_description'))
@section('seo_keywords', settingText('register_seo_keywords', 'short_description'))
@section('content')

    <section>
        <div class="container-fluid">
            <div class="row py-3 align-items-center min-vh-100">
                <div class="col-md-6 px-md-5">
                    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data" class="rounded-5"
                        style="background-color:#F9F9F9 ;">
                        @csrf
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ settingImage('logo') }}" style="height: 90px; width: 100px"
                                alt="{{ trans('website.register.logo_alt') }}" />
                            <h3 class="login-main-title mb-2">{{ trans('website.register.main_title') }}</h3>
                            <p class="login-sub-title mb-3">{{ trans('website.register.sub_title') }}</p>

                            <div class="d-flex flex-column w-80-100 gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.register.username_label') }}</p>
                                <input name="name" type="text" class="form-control py-2"
                                    placeholder="{{ trans('website.register.username_placeholder') }}"
                                    value="{{ old('name', '') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="d-flex flex-column w-80-100 gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.register.email_label') }}</p>
                                <input name="email" type="email" class="form-control py-2"
                                    placeholder="{{ trans('website.register.email_placeholder') }}"
                                    value="{{ old('email', '') }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="d-flex flex-column w-80-100 gap-1 mb-4 position-relative">
                                <p class="form-label m-0">{{ trans('website.register.password_label') }}</p>
                                <input name="password" type="password" id="password-input" class="form-control py-2"
                                    placeholder="{{ trans('website.register.password_placeholder') }}">
                                <!-- Eye icon -->
                                <span class="material-icons position-absolute top-50 toggle-password hovers"
                                    id="togglePassword">
                                    visibility
                                </span>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="d-flex flex-column w-80-100 gap-1 mb-4 position-relative">
                                <p class="form-label m-0">{{ trans('website.register.confirm_password_label') }}</p>
                                <input name="password_confirmation" type="password" id="confirm-password-input"
                                    class="form-control py-2"
                                    placeholder="{{ trans('website.register.confirm_password_placeholder') }}">
                                <!-- Eye icon -->
                                <span class="material-icons position-absolute top-50 toggle-password hovers"
                                    id="toggleConfirmPassword">
                                    visibility
                                </span>
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="d-flex flex-column w-80-100 gap-1 mb-4 position-relative">
                                <p class="form-label m-0">{{ trans('website.register.avatar_label') }}</p>
                                <input type="file" id="avatar" name="avatar" class="form-control py-2">
                                @error('avatar')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <button href="sign-in.html"
                                class="primary-btn text-center w-80-100 py-2 rounded-3 text-decoration-none">{{ trans('website.register.register_button') }}</button>
                        </div>
                        <div class="separator w-50 mx-auto my-3">
                            <span>{{ trans('website.register.or') }}</span>
                        </div>
                        <div class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('social-login', 'google') }}">
                                <img src="{{ asset('Learn-German-Kuwait/img/google-svgrepo-com.png') }}"
                                    alt="{{ trans('website.register.google_alt') }}">
                            </a>
                            <a href="{{ route('social-login', 'facebook') }}">
                                <img src="{{ asset('Learn-German-Kuwait/img/facebook-svgrepo-com.png') }}"
                                    alt="{{ trans('website.register.facebook_alt') }}">
                            </a>
                        </div>
                        <div class="d-flex gap-1 justify-content-center my-3">
                            <h6 class="have-account m-0">{{ trans('website.register.have_account') }}</h6>
                            <h6 class="have-account m-0"><a href="{{ route('login') }}"
                                    class="primary-color">{{ trans('website.register.login_link') }}</a></h6>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 h-100">
                    <?php
                            $loginImages = [];
                            for ($i = 1; $i <= 10; $i++) {
                                $image = settingImage('login_image_' . $i);
                                if (!$image) {
                                    break;
                                }
                                $loginImages[] = $image;
                            }
                        ?>
                    <img src="{{ $loginImages[0] }}" id="why-slider" class="img-fluid w-100 rounded-3 login-img"
                        alt="{{ trans('website.register.slider_image_alt') }}">
                </div>
            </div>
        </div>
    </section>

@endsection

@push('css')
    <style>
        .toggle-password {
            cursor: pointer;
            transform: translateY(-50%);
        }

        [dir="rtl"] .toggle-password {
            left: 10px;
        }

        [dir="ltr"] .toggle-password {
            right: 10px;
        }
    </style>
@endpush

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const slider = document.getElementById("why-slider");
            if (slider) {
                const images = @json($loginImages);
                let index = 0;

                setInterval(() => {
                    slider.classList.add("fade-out");
                    setTimeout(() => {
                        index = (index + 1) % images.length;
                        slider.src = images[index];
                        slider.classList.remove("fade-out");
                    }, 300);
                }, 3000);
            }

            const togglePassword = document.getElementById("togglePassword");
            const passwordInput = document.getElementById("password-input");
            if (togglePassword && passwordInput) {
                togglePassword.addEventListener("click", function () {
                    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                    passwordInput.setAttribute(type, "type");
                    this.textContent = type === "password" ? "visibility" : "visibility_off";
                });
            }

            const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
            const confirmPasswordInput = document.getElementById("confirm-password-input");
            if (toggleConfirmPassword && confirmPasswordInput) {
                toggleConfirmPassword.addEventListener("click", function () {
                    const type = confirmPasswordInput.getAttribute("type") === "password" ? "text" : "password";
                    confirmPasswordInput.setAttribute(type, "type");
                    this.textContent = type === "password" ? "visibility" : "visibility_off";
                });
            }
        });
    </script>
@endpush