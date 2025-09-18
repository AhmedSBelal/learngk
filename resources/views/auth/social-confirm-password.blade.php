@extends('layouts.site')
@section('title', 'LGK - Confirm Password')
@section('og_title', 'LGK - Confirm Password')
@section('seo_description', settingText('login_seo_description', 'short_description'))
@section('og_description', settingText('login_seo_description', 'short_description'))
@section('seo_keywords', settingText('login_seo_keywords', 'short_description'))
@section('content')

    <!--====== Page Banner Start ======-->

    <section class="page-banner">
        <div class="page-banner-bg bg_cover"
             style="background-image: url({{ settingImage('breadcrumb') ?? asset('assets/images/page-banner.webp') }});">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title">Confirm Password</h2>
                </div>
            </div>
        </div>
    </section>

    <!--====== Page Banner Ends ======-->

    <!--====== Login Start ======-->

    <section class="login-register">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-register-content">
                        <h4 class="title">Confirm Password</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="login-register-form">
                            <form action="{{ route('social-login.store') }}" method="post">
                                @csrf

                                <input type="hidden" name="email" value="{{ $social->getEmail() }}">

                                <input type="hidden" name="name" value="{{ $social->getName() }}">

                                <input type="hidden" name="avatar" value="{{ $social->getAvatar() }}">

                                <div class="single-form">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password">
                                </div>
                                <div class="single-form">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="confirm_password">
                                </div>
                                <div class="single-form">
                                    <button class="main-btn" type="submit">Confirm new password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-50"></div>
        </div>
    </section>

    <!--====== Login Ends ======-->

@endsection
