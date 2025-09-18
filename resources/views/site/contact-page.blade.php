@extends('layouts.site1')
@section('title', trans('website.contact.title'))
@section('og_title', trans('website.contact.og_title'))
@section('seo_description', settingText('contact_seo_description', 'short_description'))
@section('og_description', settingText('contact_seo_description', 'short_description'))
@section('seo_keywords', settingText('contact_seo_keywords', 'short_description'))
@section('content')

    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.contact.header_title') }}</h1>
    </header>

    <section>
        <div class="container-fluid px-md-5 my-5">
            <div class="row">
                <div class="col-md-7 mb-3">
                    <div class="course-information p-md-5 p-3 h-100">
                        <h2 class="mb-3 pop-up-main-title">{{ trans('website.contact.form_title') }}</h2>
                        <p class="mb-3 why-sub-title">{{ trans('website.contact.form_subtitle') }}</p>

                       
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-exclamation-triangle me-2"></i>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('contact.send') }}" method="post" id="contactForm">
                            @csrf
                            <div class="row g-3">
                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <span class="form-group-icon"><i class="fa-solid fa-envelope"></i></span>
                                        <input type="email" name="email" class="form-control bg-transparent"
                                            placeholder="{{ trans('website.contact.email_placeholder') }}"
                                            value="{{ old('email', '') }}" required>
                                    </div>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Name -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <span class="form-group-icon"><i class="fa-solid fa-user"></i></span>
                                        <input type="text" name="name" class="form-control bg-transparent"
                                            placeholder="{{ trans('website.contact.name_placeholder') }}"
                                            value="{{ old('name', '') }}" required>
                                    </div>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Subject -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <span class="form-group-icon"><i class="fa-solid fa-pen"></i></span>
                                        <input type="text" class="form-control bg-transparent" name="subject"
                                            placeholder="{{ trans('website.contact.subject_placeholder') }}"
                                            value="{{ old('subject', '') }}" required>
                                    </div>
                                    @error('subject')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <span class="form-group-icon"><i class="fa-solid fa-phone"></i></span>
                                        <input type="text" class="form-control bg-transparent" name="phone"
                                            placeholder="{{ trans('website.contact.phone_placeholder') }}"
                                            value="{{ old('phone', '') }}" required>
                                    </div>
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Message -->
                                <div class="col-12">
                                    <div class="input-group position-relative">
                                        <span class="form-group-icon"><i class="fa-solid fa-comment"></i></span>
                                        <textarea class="form-control bg-transparent" rows="4" name="message"
                                            placeholder="{{ trans('website.contact.message_placeholder') }}"
                                            required>{{ old('message', '') }}</textarea>
                                    </div>
                                    @error('message')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="d-flex w-100">
                                    <button type="submit" id="submitBtn"
                                        class="primary-btn w-100 text-center px-5 py-2 rounded-3 text-decoration-none">
                                        {{ trans('website.contact.submit_button') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-5 mb-3">
                    <div class="course-information p-md-5 p-3">
                        <h2 class="mb-3 pop-up-main-title">{{ trans('website.contact.info_title') }}</h2>
                        <div class="d-flex gap-3 align-items-center mb-3 pb-4 border-bottom justify-content-start w-100">
                            <div class="contact-icon-container d-flex justify-content-center align-items-center"><i
                                    class="fa-solid fa-phone"></i></div>
                            <div>
                                <h6 class="mb-2 contact-title">{{ trans('website.contact.phone') }}</h6>
                                <p class="mb-0 contact-desc">
                                    {{ settingText('phone-one', 'text') }}
                                </p>
                                <p class="mb-0 contact-desc">
                                    {{ settingText('phone-two', 'text') }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex gap-3 align-items-center mb-3 pb-4 border-bottom">
                            <div class="contact-icon-container d-flex justify-content-center align-items-center"><i
                                    class="fa-brands fa-whatsapp"></i></div>
                            <div>
                                <h6 class="mb-2 contact-title">{{ trans('website.contact.whatsapp_label') }}</h6>
                                <p class="mb-0 contact-desc">
                                    {{ settingText('phone-whatsapp', 'text') }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex gap-3 align-items-center mb-3 pb-4 border-bottom">
                            <div class="contact-icon-container d-flex justify-content-center align-items-center"><i
                                    class="fa-solid fa-location-dot"></i></div>
                            <div>
                                <h6 class="mb-2 contact-title">{{ trans('website.contact.address') }}</h6>
                                <p class="mb-0 contact-desc">
                                    {{ settingText('address', 'short_description') }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex gap-3 align-items-center mb-3 pb-4 border-bottom">
                            <div class="contact-icon-container d-flex justify-content-center align-items-center"><i
                                    class="fa-solid fa-envelope"></i></div>
                            <div>
                                <h6 class="mb-2 contact-title">{{ trans('website.contact.email') }}</h6>
                                <p class="mb-0 contact-desc">
                                    {{ settingText('email', 'text') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('css')
    <style>
        /* RTL Support for English */
        @if(app()->getLocale() === 'en')
            .form-group-icon {
                left: auto !important;
                right: 10px;
                width: 25px;
            }
        @endif
    </style>
@endpush

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');

            if (form && submitBtn) {
                // Show loading state on submit
                form.addEventListener('submit', function (e) {
                    submitBtn.classList.add('btn-loading');
                    // Keep the original text hidden but preserve it
                    const originalText = submitBtn.innerHTML;
                    submitBtn.innerHTML = '<span>' + originalText + '</span>';
                });
            }

            // Auto-hide alerts after 5 seconds (optional)
            setTimeout(function () {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(function (alert) {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });
    </script>
@endpush