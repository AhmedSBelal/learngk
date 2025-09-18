@extends('layouts.site1')
@section('title', 'LGK - ' . $studyWork->name)
@section('og_title', 'LGK - ' . $studyWork->name)
@section('seo_description', $studyWork->seo_description)
@section('og_description', $studyWork->seo_description)
@section('seo_keywords', $studyWork->seo_keywords)
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

    <section>
        <div class="container-fluid my-5 px-md-5">
            <div class="cards-long">
                <div class="position-relative">
                    <img src="{{ $studyWork->image->url }}" class="article-details-img w-100" alt="{{ $studyWork->name }}">
                    <div class="primary-bg p-3 article-date">
                        {{ \Carbon\Carbon::parse($studyWork->updated_at)->locale(App::getLocale())->translatedFormat('d F, Y') }}
                    </div>
                </div>
                <div class="card-body px-0">
                    <h5 class="card-title article-details-main-title mt-5 mb-4">{{ $studyWork->name }}</h5>
                    <p class="card-text article-details-sub-title mb-4">
                        {!! $studyWork->description !!}
                    </p>
                    <div class="d-flex justify-content-between align-items-center mt-3 {{ app()->getLocale() === 'en' ? 'flex-row-reverse' : 'flex-row' }}">
                        @if($prev != null)

                            <a href="{{ route('study-work.detail', $prev->slug) }}"
                                class="primary-btn text-nowrap py-2 px-4 d-flex align-items-center gap-1 rounded-pill text-decoration-none
                                {{ app()->getLocale() === 'en' ? 'flex-row-reverse' : 'flex-row' }}
                                ">
                                <i class="fa-solid fa-caret-right"></i>
                                {{ trans('website.global.prev') }}
                            </a>

                        @endif
                        @if($next != null)

                            <a href="{{ route('study-work.detail', $next->slug) }}"
                                class="primary-btn text-nowrap py-2 px-4 d-flex align-items-center gap-1 rounded-pill text-decoration-none
                                {{ app()->getLocale() === 'en' ? 'flex-row-reverse' : 'flex-row' }}
                                 ">
                                {{ trans('website.global.next') }}
                                <i class="fa-solid fa-caret-left"></i>
                            </a>

                        @endif

                    </div>
                    <div class="d-flex justify-content-between align-items-center flex-wrap mt-4">
                        <div class="d-flex gap-2 mb-3">
                            <p class="article-details-sub-title m-0">{{ trans('website.global.tags') }}</p>
                            @foreach (explode(' ', $studyWork->seo_keywords) as $keyword)
                                <div class="rounded-pill py-2 px-3 keyword-badge">{{ $keyword }}</div>
                            @endforeach
                        </div>
                        <div class="d-flex gap-2 mb-3">
                            <p class="article-details-sub-title m-0">المشاركة</p>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                class="card p-2 bg-transparent rounded-circle primary-color"><i
                                    class="fa-brands hovers fa-facebook-f"></i></a>
                            <a href="https://wa.me/?text={{ urlencode(url()->current()) }}"
                                class="card p-2 bg-transparent rounded-circle primary-color">
                                <i class="fa-brands share-icon hovers fa-whatsapp"></i>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                class="card p-2 bg-transparent rounded-circle primary-color">
                                <i class="fa-brands share-icon hovers fa-linkedin-in"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}"
                                class="card p-2 bg-transparent rounded-circle primary-color"><i
                                    class="fa-brands hovers fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @if($articles->count() > 0)

        <section>
            <div class="container-fluid mb-5 px-md-5">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="why-main-text-2 mb-4">{{ trans('website.global.similar_articles') }}</h2>
                    <a href="more-articles.html"
                        class="primary-btn text-nowrap py-2 px-4 rounded-3 text-decoration-none">{{ trans('website.home.more') }}</a>
                </div>
                <div class="row mt-2 cards-container">


                    @forelse ($articles as $article)
                        <div class="col-lg-4 mb-3">
                            <div class="card p-3 rounded-4 course-card article-card course-information h-100">
                                <div class="cards-long">
                                    <div class="position-relative">
                                        <img src="{{ $article->image->url ?? ' ' }}" class="course-img rounded-3 w-100" alt="{{ $article->title }}" />
                                        <div class="primary-bg p-3 article-date">{{ \Carbon\Carbon::make($article->created_at)->format('d M, Y') }}</div>
                                    </div>
                                    <div class="card-body px-0">
                                        <h5 class="card-title why-text mb-4">{{ $article->title }}</h5>
                                        <p class="card-text mb-4">
                                            {{ Str::limit($article->description, 300, '...') }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <a href="{{ route('study-work.detail', $article->slug) }}" class="read-more">{{
                        trans('website.global.read')}}</a>
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

@push('css')
    <style>
        /* RTL Support for English */
        @if(app()->getLocale() === 'en')
            
        @endif
    </style>
@endpush