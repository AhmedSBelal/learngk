@extends('layouts.site1')
@section('title', 'LGK - Our Team - '.$team->name)
@section('og_title', 'LGK - Our Team - '.$team->name)
@section('seo_description', settingText('team_seo_description', 'short_description'))
@section('og_description', settingText('team_seo_description', 'short_description'))
@section('seo_keywords', settingText('team_seo_keywords', 'short_description'))
@section('content')

    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ $team->name }}</h1>
    </header>

    <section>
        <div class="container-fluid px-md-5 my-5">
            <div class="row">
                <div class="col-md-6 mb-3">
                     <img src="{{ $team->image->url }}" class="w-100 img-fluid teacher-main-img slider-img"  alt="slider">    {{-- data-images='["img/teacher-2.jpeg","img/teacher-3.jpeg","img/teacher-4.jpeg","img/teacher-1.jpeg"]'              --}}
                </div>
                <div class="col-md-6 mb-3">
                  <div class=" p-3">
                    <p class="mb-3 course-information-label fw-semibold">
                        {{ $team->description }}
                    </p>
                    <div class="d-flex gap-3 align-items-center mb-3 pb-4 border-bottom">
                        <div class="contact-icon-container d-flex justify-content-center align-items-center"><i class="fa-solid fa-phone"></i></div>
                        <div>
                            <h6 class="mb-2 contact-title">{{ trans('website.global.phone') }}</h6>
                            <p class="mb-0 contact-desc">{{ $team->phone }}</p>
                        </div>
                    </div>

                    <div class="d-flex gap-3 align-items-center mb-3 pb-4 border-bottom">
                        <div class="contact-icon-container d-flex justify-content-center align-items-center"><i class="fa-solid fa-envelope"></i></div>
                        <div>
                            <h6 class="mb-2 contact-title">{{ trans('website.global.email') }}</h6>
                            <p class="mb-0 contact-desc">{{ $team->email }}</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3 align-items-center justify-content-center mb-3 pb-4">
                        <div
                        class="d-flex align-items-center justify-content-center gap-4">
                        <div class="contact-icon-container d-flex justify-content-center align-items-center">
                            <a href="{{ $team->facebook }}" class="primary-color"
                            ><i class="fa-brands hovers fa-facebook-f"></i
                          ></a></div>
                        <div class="contact-icon-container d-flex justify-content-center align-items-center">
                            <a href="{{ $team->phone }}" class="primary-color"
                            ><i class="fa-solid hovers fa-phone"></i
                          ></a></div>
                        <div class="contact-icon-container d-flex justify-content-center align-items-center">
                            <a href="mailto:{{ $team->email }}" class="primary-color"
                            ><i class="fa-solid hovers fa-envelope"></i
                          ></a></div>
                        <div class="contact-icon-container d-flex justify-content-center align-items-center">
                            <a href="{{ $team->twitter }}" class="primary-color"
                            ><i class="fa-brands hovers fa-twitter"></i
                          ></a></div>
                      </div>
                    </div>
                  </div>


                </div>
            </div>
        </div>
    </section>

@endsection
