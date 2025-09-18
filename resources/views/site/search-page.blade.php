@php
    use Carbon\Carbon;
@endphp
@extends('layouts.site1')
@section('title', 'Learn German Kuwait - Search Results')
@section('og_title', 'Learn German Kuwait - Search Results')
@section('content')

    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.global.search-page-title') }}</h1>
    </header>

    <section>
        <form action="{{ route('search') }}" method="get" class="container-fluid px-md-5">
            <div class="d-flex gap-4 flex-wrap my-5">
                <div class="position-relative">
                    <input type="text" class="form-control search-input-2 py-2 rounded-3" placeholder="{{ trans('website.global.search-section-field') }}" name="search">
                    <i class="fa-solid fa-search position-absolute search-icon-2"></i>
                </div>
                <button type="submit" class="primary-btn text-nowrap px-5 py-2 rounded-3 text-decoration-none">{{ trans('website.global.search-section-button') }}</button>
            </div>
        </form>
    </section>

    @if($courses->count() > 0)
        <section>
            <div class="container-fluid mt-4 px-md-5">
                <h2 class="why-main-text-2 mb-4">{{ trans('website.header.courses') }}</h2>
                <div class="row mt-2 cards-container">


                    @forelse($courses as $course)

                        <x-course-card :course="$course" modal-prefix="detailsModal-" col-size="4"
                            view="{{ session('courseView', 'grid') }}" />

                    @empty
                        <div class="col-12 no-results">
                            <p class="lead text-center" style="font-size: 25px; font-weight: 700;">
                                {{ trans('website.course.course-no-result') }}
                            </p>
                        </div>
                    @endforelse

                </div>
            </div>
        </section>
    @endif

    @if($studies->count() > 0)
        <section>
            <div class="container-fluid mt-4 px-md-5">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="why-main-text-2 mb-4">{{ trans('website.header.study') }}</h2>
                </div>
                <div class="row mt-2 cards-container">


                    @forelse($studies as $study)
                        <div class="col-lg-4 mb-3">
                            <div class="card p-3 rounded-4 course-card article-card course-information h-100">
                                <div class="cards-long">
                                    <div class="position-relative">
                                        <img src="{{ $study->image->url }}" class="course-img rounded-3 w-100"
                                            alt="{{ $study->title }}">
                                        <div class="primary-bg p-3 article-date">
                                            {{ \Carbon\Carbon::parse($study->updated_at)->locale(App::getLocale())->translatedFormat('d F, Y') }}
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <h5 class="card-title why-text mb-4">{{ $study->title }}</h5>
                                        <p class="card-text mb-4">
                                            {{ $study->short_description }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <a href="{{ route('study-work.detail', $study->slug) }}"
                                                class="read-more">{{ trans('website.global.read')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                    @endforelse

                </div>
            </div>
        </section>
    @endif

    @if($works->count() > 0)
        <section>
            <div class="container-fluid mt-4 px-md-5">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="why-main-text-2 mb-4">{{ trans('website.header.work') }}</h2>
                </div>
                <div class="row mt-2 cards-container">

                    @forelse($works as $work)

                        <div class="col-lg-4 mb-3">
                            <div class="card p-3 rounded-4 course-card article-card course-information h-100">
                                <div class="cards-long">
                                    <div class="position-relative">
                                        <img src="{{ $work->image->url }}" class="course-img rounded-3 w-100" alt="course-img">
                                        <div class="primary-bg p-3 article-date">
                                            {{ \Carbon\Carbon::parse($work->updated_at)->locale(App::getLocale())->translatedFormat('d F, Y') }}
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <h5 class="card-title why-text mb-4">{{ $work->title }}</h5>
                                        <p class="card-text mb-4">
                                            {{ $work->short_description }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <a href="{{ route('study-work.detail', $work->slug) }}" class="read-more">
                                                {{ trans('website.global.read') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                    @endforelse

                </div>
            </div>
        </section>
    @endif

    @if($articles->count() > 0)
        <section>
            <div class="container-fluid mt-4 px-md-5">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="why-main-text-2 mb-4">{{ trans('website.header.article') }}</h2>
                </div>
                <div class="row mt-2 cards-container">


                    @forelse($articles as $article)

                        <div class="col-lg-4 mb-3">
                        <div class="card p-3 rounded-4 course-card article-card course-information h-100">
                            <div class="cards-long">
                                <div class="position-relative">
                                    <img src="{{ $article->image->url }}" class="course-img rounded-3 w-100" alt="course-img">
                                    <div class="primary-bg p-3 article-date">{{ \Carbon\Carbon::parse($article->updated_at)->locale(App::getLocale())->translatedFormat('d F, Y') }}</div>
                                </div>
                                <div class="card-body px-0">
                                    <h5 class="card-title why-text mb-4">{{ $article->title }}</h5>
                                    <p class="card-text mb-4">
                                        {{ Str::limit($article->description, 300, '...')  }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <a href="{{ route('articles.show', $article->slug) }}" class="read-more">{{ trans('website.global.read') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @empty
                    @endforelse

                </div>
            </div>
        </section>
    @endif

@endsection