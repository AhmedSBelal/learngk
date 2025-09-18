@extends('layouts.site1')
@section('title', 'Learn German Kuwait - Reviews')
@section('og_title', 'Learn German Kuwait - Reviews')
@section('seo_description', settingText('review_seo_description', 'short_description'))
@section('og_description', settingText('review_seo_description', 'short_description'))
@section('seo_keywords', settingText('review_seo_keywords', 'short_description'))
@section('content')

    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.global.read-review') }}</h1>
    </header>

    <section>
        <div class="container-fluid px-md-5 my-5">
            <div class="row justify-content-center">
                <div class="col-md-7 mb-3">
                    <div class="course-information p-md-5 p-3 h-100">
                        <h2 class="mb-3 pop-up-main-title">{{ trans('website.create_review.leave_review') }}</h2>
                        <p class="mb-3 why-sub-title">{{ trans('website.create_review.form_description') }}</p>

                        <form action="{{ route('reviews.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <!-- البريد -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <span class="form-group-icon {{ App::getLocale() == 'ar' ? 'start-0 ps-3' : 'end-0 pe-3' }} d-flex align-items-center">
                                            <i class="fa-solid fa-envelope"></i>
                                        </span>
                                        <input type="email" name="email" class="form-control bg-transparent {{ App::getLocale() == 'ar' ? 'ps-5' : 'pe-5' }}"
                                            placeholder="{{ trans('website.create_review.email') }}"
                                            value="{{ old('email', auth()->user()->email ?? '') }}" required>
                                    </div>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- الاسم -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <span class="form-group-icon {{ App::getLocale() == 'ar' ? 'start-0 ps-3' : 'end-0 pe-3' }} d-flex align-items-center">
                                            <i class="fa-solid fa-user"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control bg-transparent {{ App::getLocale() == 'ar' ? 'ps-5' : 'pe-5' }}"
                                            placeholder="{{ trans('website.create_review.name') }}"
                                            value="{{ old('name', auth()->user()->name ?? '') }}" required>
                                    </div>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- العنوان -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <span class="form-group-icon {{ App::getLocale() == 'ar' ? 'start-0 ps-3' : 'end-0 pe-3' }} d-flex align-items-center">
                                            <i class="fa-solid fa-pen"></i>
                                        </span>
                                        <input type="text" name="title" class="form-control bg-transparent {{ App::getLocale() == 'ar' ? 'ps-5' : 'pe-5' }}"
                                            placeholder="{{ trans('website.create_review.title') }}"
                                            value="{{ old('title', '') }}" required>
                                    </div>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- الهاتف -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <span class="form-group-icon {{ App::getLocale() == 'ar' ? 'start-0 ps-3' : 'end-0 pe-3' }} d-flex align-items-center">
                                            <i class="fa-solid fa-phone"></i>
                                        </span>
                                        <input type="text" name="phone" class="form-control bg-transparent {{ App::getLocale() == 'ar' ? 'ps-5' : 'pe-5' }}"
                                            placeholder="{{ trans('website.create_review.phone') }}"
                                            value="{{ old('phone', '') }}" required>
                                    </div>
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- الصورة -->
                                <div class="col-12">
                                    <div class="input-group position-relative">
                                        <input class="form-control bg-transparent" type="file" name="image" id="image"
                                            accept="image/*">
                                    </div>
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- الرسالة -->
                                <div class="col-12">
                                    <div class="input-group position-relative">
                                        <span class="form-group-icon {{ App::getLocale() == 'ar' ? 'start-0 ps-3' : 'end-0 pe-3' }} d-flex align-items-center">
                                            <i class="fa-solid fa-comment"></i>
                                        </span>
                                        <textarea name="review" class="form-control bg-transparent {{ App::getLocale() == 'ar' ? 'ps-5' : 'pe-5' }}" rows="4"
                                            placeholder="{{ trans('website.create_review.review') }}">{{ old('review', '') }}</textarea>
                                    </div>
                                    @error('review')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- زر الإرسال -->
                                <div class="d-flex w-100">
                                    <button type="submit"
                                        class="primary-btn w-100 text-center px-5 py-2 rounded-3 text-decoration-none">{{ trans('website.create_review.submit') }}</button>
                                </div>
                            </div>
                        </form>
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