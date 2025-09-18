@extends('layouts.site')
@section('title', 'LGK - Test for Germany Language')
@section('og_title', 'LGK - Test for Germany Language')
@section('seo_description', settingText('test_seo_description', 'short_description'))
@section('og_description', settingText('test_seo_description', 'short_description'))
@section('seo_keywords', settingText('test_seo_keywords', 'short_description'))
@section('content')

    <!--====== Page Banner Start ======-->

    <section class="page-banner">
        <div class="page-banner-bg bg_cover"
             style="background-image: url({{ settingImage('breadcrumb') ?? asset('assets/images/page-banner.webp') }});">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title">Test for Germany Language</h2>
                </div>
            </div>
        </div>
    </section>

    <!--====== Page Banner Ends ======-->


    <!--====== Top Course Start ======-->

    <section class="top-courses-area mb-3">
        <div class="container">
            @if(settingText('course-desc-page', 'long_description'))
                <div class="row">
                    <div class="col-lg-12">
                        {!! settingText('course-desc-page', 'long_description') !!}
                    </div>
                </div>
            @endif
            <div class="tab-content">
                <div class="tab-pane fade show active" id="list">
                    <div class="courses-wrapper wrapper-2">
                        @forelse($courses as $course)
                            <div class="courses-col">
                                <div class="single-courses-2 courses-list mt-30">
                                    <div class="courses-image">
                                        <a href="{{ route('courses.detail', $course->slug) }}">
                                            <img src="{{ $course->image->url }}" width="320"
                                                 height="300" alt="{{ $course->name }}">
                                        </a>
                                    </div>
                                    <div class="courses-content">
                                        <div class="courses-content-wrapper">
                                            <h4 class="courses-title">
                                                <a href="{{ route('courses.detail', $course->slug) }}">{{ $course->name }}</a>
                                            </h4>
                                            <p class="text-white">
                                                {{ $course->short_description }}
                                            </p>
                                            <div class="courses-link">
                                                <a class="more" href="{{ route('tests.detail', $course->slug) }}">
                                                    {{ trans('website.global.read') }}
                                                    <i @class(['fas', 'fa-chevron-right' => app()->getLocale() == 'en', 'fa-chevron-left' => app()->getLocale() == 'ar'])></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>


            {{ $courses->links('includes.custome-pagination') }}
        </div>
    </section>

    <!--====== Top Course Ends ======-->
@endsection
