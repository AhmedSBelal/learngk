@extends('layouts.site1')
@section('title', 'LGK - Offered Jobs - ' . $job->name)
@section('og_title', 'LGK - Offered Jobs - ' . $job->name)
@section('seo_description', settingText('job_seo_description', 'short_description'))
@section('og_description', settingText('job_seo_description', 'short_description'))
@section('seo_keywords', settingText('job_seo_keywords', 'short_description'))
@section('content')

    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.footer.job') }}</h1>
    </header>

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

    <section>
        <div class="container-fluid px-md-5 my-5">
            <div class="text-start">
                <h5 class="m-0 pop-up-main-title">{{ $job->name }}</h5>
                <p class="m-0 faq-sub-title">
                    {!! $job->description !!}
                </p>
                <h5 class="mt-5 faq-main-title">
                    {{ trans('website.german.apply') }}
                </h5>
                <p class="mb-5 faq-sub-title">
                    {{ trans('website.german.apply-desc') }}
                </p>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 mb-3">
                    <div class="course-information p-md-5 p-3 h-100">
                        <form action="{{ route('jobs.send', $job->slug) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <!-- الاسم -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <input type="text" name="name" class="form-control py-2 bg-transparent"
                                            placeholder="{{ trans('website.german.name') }}" value="{{ old('name', '') }}"
                                            required>
                                    </div>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- الاسم -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <input type="text" name="family_name" class="form-control py-2 bg-transparent"
                                            placeholder="{{ trans('website.german.family_name') }}"
                                            value="{{ old('family_name', '') }}" required>
                                    </div>
                                    @error('family_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- البريد -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <input type="email" name="email" class="form-control py-2 bg-transparent"
                                            placeholder="{{ trans('website.german.email') }}" value="{{ old('email', '') }}"
                                            required>
                                    </div>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- الهاتف -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <input type="text" name="phone" class="form-control py-2 bg-transparent"
                                            placeholder="{{ trans('website.german.phone') }}" value="{{ old('phone', '') }}"
                                            required>
                                    </div>
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- تاريخ الميلاد -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <input type="date" name="birthdate" class="form-control py-2 bg-transparent"
                                            placeholder="{{ trans('website.german.birthdate') }}"
                                            value="{{ old('birthdate', '') }}" required>
                                    </div>
                                    @error('birthdate')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- الجنسية -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <input type="text" class="form-control py-2 bg-transparent" name="nationality"
                                            placeholder="{{ trans('website.german.nationality') }}"
                                            value="{{ old('nationality', '') }}" required>
                                    </div>
                                    @error('nationality')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- الحالة الاجتماعية -->
                                <div class="col-md-6">
                                    <select class="form-select bg-transparent py-2" name="status" required>
                                        <option>{{ trans('website.german.status') }}</option>
                                        <option value="single" {{ old('status') == 'single' ? 'selected' : '' }}>
                                            {{ trans('website.german.single') }}
                                        </option>
                                        <option value="married" {{ old('status') == 'married' ? 'selected' : '' }}>
                                            {{ trans('website.german.married') }}
                                        </option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- طريقة التواصل -->
                                <div class="col-md-6">
                                    <select class="form-select bg-transparent py-2" name="reach" required>
                                        <option>{{ trans('website.german.reach') }}</option>
                                        <option value="phone" {{ old('reach') == 'phone' ? 'selected' : '' }}>
                                            {{ trans('website.german.phone') }}
                                        </option>
                                        <option value="whatsapp" {{ old('reach') == 'whatsapp' ? 'selected' : '' }}>
                                            Whatsapp
                                        </option>
                                        <option value="email" {{ old('reach') == 'email' ? 'selected' : '' }}>
                                            {{ trans('website.german.email') }}
                                        </option>
                                    </select>
                                    @error('reach')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- العنوان -->
                                <div class="col-md-6">
                                    <div class="input-group position-relative">
                                        <input type="text" name="address"
                                            placeholder="{{ trans('website.german.address') }}"
                                            class="form-control py-2 bg-transparent" placeholder="Wohnort, Land" required
                                            value="{{ old('address', '') }}" />
                                    </div>
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- السيرة الذاتية -->
                                <div>
                                    <div class="input-group position-relative">
                                        <label for="resume">{{ trans('website.german.resume') }}</label>
                                        <div class="col-12"></div>
                                        <input type="file" class="form-control py-2 bg-transparent" name="resume"
                                            id="resume" accept="application/pdf">
                                    </div>
                                    @error('resume')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- الموافقة -->
                                <div class="col-12">
                                    <div class="form-check d-flex gap-4 mb-2">
                                        <input type="checkbox" name="approve" id="approve" class="form-check-input"
                                            value="1" {{ old('approve') == true ? 'checked' : '' }}>
                                        <label class="form-check-label apply-text me-2" for="approve">
                                            {{ trans('website.german.approve-desc') }}
                                        </label>
                                        @error('approve')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <!-- زر الإرسال -->
                                <div class="d-flex w-100">
                                    <button type="submit"
                                        class="primary-btn w-100 text-center px-5 py-2 rounded-3 text-decoration-none">
                                        {{ trans('website.german.apply-now') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection