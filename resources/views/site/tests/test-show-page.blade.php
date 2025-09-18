@extends('layouts.site')
@section('title', 'LGK - '. $course->name)
@section('og_title', 'LGK - '. $course->name)
@section('seo_description', $course->seo_description)
@section('og_description', $course->seo_description)
@section('seo_keywords', $course->seo_keywords)
@section('css')
    <style>

        .blog-pagination-btn {
            padding: 15px 30px;
            background-color: #fdaf04;
            color: #313131;
            border-radius: 7px;
            display: inline-block;
            transition: background-color .3s linear;
        }

        .blog-pagination-btn:hover {
            background-color: #313131;
            color: #fdaf04;
        }

    </style>
@endsection
@section('content')

    <!--====== Page Banner Start ======-->

    <section class="page-banner">
        <div class="page-banner-bg bg_cover"
             style="background-image: url({{ settingImage('breadcrumb') ?? asset('assets/images/page-banner.webp') }});">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title">{{ $course->name }}</h2>
                </div>
            </div>
        </div>
    </section>

    <!--====== Page Banner End ======-->

    <!--====== Courses Details Start ======-->

    <section class="courses-details">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-12">
                            {!! $course->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 my-3">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ $course->image->url }}" style="width: 100%;height: 450px;"
                                 alt="{{ $course->name }}">
                        </div>
                    </div>
                    <div class="mb-130"></div>
                    <div class="row justify-content-between mt-3">
                        @if($course->exam_link)
                            <div class="col-lg-8 text-center">
                                <a href="{{ $course->exam_link }}" target="_blank" class="main-btn main-btn-2 rounded">
                                    {{ trans('website.course.test') }}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mb-150"></div>
            <div class="row mb-4 justify-content-between align-items-center">
                @if($prev != null)
                    <div class="col col-md-2">
                        <a href="{{ route('tests.detail', $prev->slug) }}"
                           class="blog-pagination-btn">
                            <i @class(['fas', 'fa-arrow-alt-left' => app()->getLocale() != 'ar', 'fa-arrow-alt-right' => app()->getLocale() == 'ar'])></i>
                            {{ trans('website.global.prev') }}
                        </a>
                    </div>
                @endif

                @if($next != null)
                    <div class="col col-md-2">
                        <a href="{{ route('tests.detail', $next->slug) }}"
                           class="blog-pagination-btn">
                            {{ trans('website.global.next') }}
                            <i @class(['fas', 'fa-arrow-alt-right' => app()->getLocale() != 'ar', 'fa-arrow-alt-left' => app()->getLocale() == 'ar'])></i>
                        </a>
                    </div>
                @endif
            </div>
            <div class="mb-70"></div>
        </div>
    </section>

    <!--====== Courses Details Ends ======-->
@endsection
