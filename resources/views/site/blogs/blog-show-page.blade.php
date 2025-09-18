@extends('layouts.site1')
@section('title', 'LGK - ' . $article->title)
@section('og_title', 'LGK - ' . $article->title)
@section('seo_description', $article->seo_description)
@section('og_description', $article->seo_description)
@section('seo_keywords', $article->seo_keywords)
@section('css')
    <style>
        .share-button {
            display: inline-block;
            color: #ffffff;
            border: none;
            padding: 0.5em;
            width: 4em;
            opacity: 0.9;
            box-shadow: 0 2px 0 0 rgba(0, 0, 0, 0.2);
            outline: none;
            text-align: center;
            border-radius: 7px;
        }

        .share-button:hover {
            color: #fff;
        }

        .share-button.facebook {
            background-color: #3B5998;
        }

        .share-button.whatsapp {
            background-color: #075E54;
        }

        .share-button.linkedin {
            background-color: #0e76a8;
        }

        .share-button.twitter {
            background-color: #00acee;
        }

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
                    <img src="{{ $article->image->url }}" class="article-details-img w-100" alt="{{ $article->title }}">
                    <div class="primary-bg p-3 article-date">
                        {{ \Carbon\Carbon::parse($article->updated_at)->locale(App::getLocale())->translatedFormat('d F, Y') }}
                    </div>
                </div>
                <div class="card-body px-0">
                    <h5 class="card-title article-details-main-title mt-5 mb-4">{{ $article->title }}</h5>
                    <p class="card-text article-details-sub-title mb-4">
                        {!! $article->article !!}
                    </p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        @if($prev != null)

                            <a href="{{ route('articles.show', $prev->slug) }}"
                                class="primary-btn text-nowrap py-2 px-4 d-flex align-items-center gap-1 rounded-pill text-decoration-none">
                                <i class="fa-solid fa-caret-right"></i>
                                {{ trans('website.global.prev') }}
                            </a>

                        @endif
                        @if($next != null)

                            <a href="{{ route('articles.show', $next->slug) }}"
                                class="primary-btn text-nowrap py-2 px-4 d-flex align-items-center gap-1 rounded-pill text-decoration-none">
                                {{ trans('website.global.next') }}
                                <i class="fa-solid fa-caret-left"></i>
                            </a>

                        @endif

                    </div>
                    <div class="d-flex justify-content-between align-items-center flex-wrap mt-4">
                        {{-- <div class="d-flex gap-2 mb-3">
                            <p class="article-details-sub-title m-0">Tags: </p>
                            <div class="rounded-pill py-2 px-3 keyword-badge">Learning</div>
                            <div class="rounded-pill py-2 px-3 keyword-badge">German</div>
                        </div> --}}
                        <div class="d-flex gap-2 mb-3">
                            <p class="article-details-sub-title m-0">{{ trans('website.blog.share') }}:</p>
                            <a href="{{ $social['facebook'] }}"
                                class="card p-2 bg-transparent rounded-circle primary-color"><i
                                    class="fa-brands hovers fa-facebook-f"></i></a>
                            <a href="{{ $social['whatsapp'] }}"
                                class="card p-2 bg-transparent rounded-circle primary-color"><i
                                    class="fa-solid hovers fa-phone"></i></a>
                            <a href="{{ $social['linkedin'] }}"
                                class="card p-2 bg-transparent rounded-circle primary-color"><i
                                    class="fa-solid hovers fa-envelope"></i></a>
                            <a href="{{ $social['twitter'] }}"
                                class="card p-2 bg-transparent rounded-circle primary-color"><i
                                    class="fa-brands hovers fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    @if($articles->count() > 0)
    <section class="my-5 px-md-5">
      <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="why-main-text">{{ trans('website.home.article') }}</h3>
          <a href="{{ route('articles') }}" class="primary-btn text-nowrap py-2 px-4 rounded-3 text-decoration-none">{{
        trans('website.global.read') }}</a>
        </div>
        <div class="row mt-2">

          @forelse($articles as $article)
            <div class="col-lg-4 mb-3">
              <div class="card p-3 bg-transparent rounded-4 article-card h-100">
                <div class="position-relative">
                  <img src="{{ $article->image->url ?? ' ' }}" class="course-img rounded-3 w-100" alt="course-img">
                  <div class="primary-bg p-3 article-date">{{ \Carbon\Carbon::make($article->created_at)->format('d M, Y') }}</div>
                </div>
                <div class="card-body px-0">
                  <h5 class="card-title why-text mb-4">{{ $article->title }}</h5>
                  <p class="card-text mb-4">{{ Str::limit($article->description, 300, '...') }}</p>
                  <div class="d-flex justify-content-between align-items-center mt-3">
                    <a href="{{ route('articles.show', $article->slug) }}" class="read-more">{{ trans('website.global.read')}}</a>
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