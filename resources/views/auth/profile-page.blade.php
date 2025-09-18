@extends('layouts.site1')
@section('title', 'Learn German Kuwait - My Profile')
@section('og_title', 'Learn German Kuwait - My Profile')
@section('content')

    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.profile.my_profile') }}</h1>
    </header>

    <section>
        <div class="container-fluid px-md-5 my-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-3">
                    <img src="{{ $user->avatar ? $user->avatar->url : '' }}" class="w-100 img-fluid rounded-4"
                        style="height:360px ;" alt="{{ $user->name }}">
                </div>

                <div class="col-lg-3 col-md-6 mb-3">

                    <div class="course-information rounded-4 p-3 ">
                        <h2 class="mb-3 why-main-text">{{ trans('website.profile.update_profile') }}</h2>

                        <form action="{{ route('user-profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <!-- الاسم -->
                                <div class="col-12">
                                    <p class="form-label mb-1">الاسم</p>
                                    <div class="input-group position-relative">
                                        <span class="form-group-icon"><i class="fa-solid fa-user"></i></span>
                                        <input type="text" class="form-control bg-transparent" name="name"
                                            value="{{ old('name', $user->name) }}" placeholder="الاسم">
                                    </div>
                                </div>
                                <!-- البريد -->
                                <div class="col-12">
                                    <p class="form-label mb-1">البريد الالكترونى</p>
                                    <div class="input-group position-relative">
                                        <span class="form-group-icon"><i class="fa-solid fa-envelope"></i></span>
                                        <input type="email" class="form-control bg-transparent" name="email"
                                            value="{{ old('email', $user->email) }}" placeholder="بريدك الإلكتروني">
                                    </div>
                                </div>

                                <!-- العنوان -->
                                <div class="col-12">
                                    <p class="form-label mb-1">الصورة الشخصية</p>
                                    <div class="input-group position-relative">
                                        <span class="form-group-icon"><i class="fa-solid fa-image"></i></span>
                                        <input type="file" name="avatar" class="form-control bg-transparent">
                                    </div>
                                </div>
                                <div class="d-flex w-100">

                                    <button type="submit"
                                        class="primary-btn w-100 text-center px-5 py-2 rounded-3 text-decoration-none">{{ trans('website.profile.update_profile') }}</button>
                                </div>

                            </div>
                        </form>

                    </div>


                </div>

                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="course-information rounded-4 p-3 ">
                        <h2 class="mb-3 why-main-text">{{ trans('website.profile.change_password') }}</h2>
                        <form action="{{ route('user-profile.change') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <!-- الاسم -->
                                <div class="col-12">
                                    <p class="form-label mb-1">كلمة السر القديمة</p>
                                    <div class="input-group position-relative"> <input name="old_password" type="password"
                                            class="form-control bg-transparent" placeholder="كلمة السر القديمة">
                                    </div>
                                    @error('old_password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- الاسم -->
                                <div class="col-12">
                                    <p class="form-label mb-1">كلمة السر الجديدة</p>
                                    <div class="input-group position-relative"> <input name="password" type="password"
                                            class="form-control bg-transparent" placeholder="كلمة السر الجديدة">
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <!-- الاسم -->
                                <div class="col-12">
                                    <p class="form-label mb-1">تأكيد كلمة السر </p>
                                    <div class="input-group position-relative"> <input name="password_confirmation"
                                            type="password" class="form-control bg-transparent"
                                            placeholder="تأكيد كلمة السر ">
                                    </div>
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="d-flex w-100">

                                    <button type="submit"
                                        class="primary-btn w-100 text-center px-5 py-2 rounded-3 text-decoration-none">{{ trans('website.profile.update_password') }}</button>
                                </div>

                            </div>
                        </form>
                    </div>


                </div>
                <div class="col-lg-2 col-md-6 mb-3">
                    <div class="course-information rounded-4 p-3 ">
                        <h2 class="mb-3 why-main-text">{{ trans('website.profile.logout') }}</h2>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <div class="row g-3">

                                <div class="d-flex w-100">

                                    <button type="submit"
                                        class="primary-btn w-100 text-center px-5 py-2 rounded-3 text-decoration-none">{{ trans('website.profile.logout') }}</button>
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