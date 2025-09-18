@extends('layouts.site1')
@section('title', 'LGK - News&Articles')
@section('og_title', 'LGK - News&Articles')
@section('seo_description', settingText('blog_seo_description', 'short_description'))
@section('og_description', settingText('blog_seo_description', 'short_description'))
@section('seo_keywords', settingText('blog_seo_keywords', 'short_description'))
@section('content')
    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.header.article') }}</h1>
    </header>
    <section>
        <div class="container-fluid px-md-5">
            <form action="{{ route('articles') }}" method="GET" class="d-flex gap-4 flex-wrap my-5">
                @csrf
                <div class="position-relative">
                    <input type="text" name="search" class="form-control search-input-2 py-2 rounded-3" placeholder="{{ trans('website.blog.search_for_the_article') }}" value="{{ request()->input('search') }}">
                    <i class="fa-solid fa-search position-absolute search-icon-2"></i>
                </div>
                <div class="d-none d-lg-flex rounded-3 border bg-transparent">
                    <div class="py-2 px-4 d-flex gap-1 cards-filter row-cards hovers border-start rounded-end-3" data-view="list">
                        <div class="material-icons cards-filter-icon">sort</div>
                        <p class="m-0 cards-filter-label">{{ trans('website.course.list_view') }}</p>
                    </div>
                    <div class="py-2 px-4 d-flex gap-1 cards-filter long-cards hovers rounded-start-3 {{ $articleView == 'grid' ? 'active' : '' }}" data-view="grid">
                        <div class="material-icons cards-filter-icon">grid_view</div>
                        <p class="m-0 cards-filter-label">{{ trans('website.course.grid_view') }}</p>
                    </div>
                </div>
                <button type="submit" class="primary-btn text-nowrap px-5 py-2 rounded-3 text-decoration-none">{{ trans('website.global.search-section-button') }}</button>
            </form>
        </div>
    </section>

    <section>
        <div class="container-fluid mt-4 px-md-5">
            <div class="row mt-2 cards-container {{ $articleView == 'list' ? 'list-view' : 'grid-view' }}">
                @forelse($articles as $article)
                    <div class="col-lg-4 mb-3">
                        <div class="card p-3 rounded-4 course-card article-card course-information h-100">
                            <div class="cards-long">
                                <div class="position-relative">
                                    <img src="{{ $article->image->url }}" class="course-img rounded-3 w-100" alt="{{ $article->title }}">
                                    <div class="primary-bg p-3 article-date">{{ \Carbon\Carbon::parse($article->updated_at)->locale(App::getLocale())->translatedFormat('d F, Y') }}</div>
                                </div>
                                <div class="card-body px-0">
                                    <h5 class="card-title why-text mb-4">{{ $article->title }}</h5>
                                    <p class="card-text mb-4">
                                        {{ Str::limit($article->description, 300, '...') }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <a href="{{ route('articles.show', $article->slug) }}" class="read-more">{{ trans('website.global.read') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>{{ trans('website.global.no_articles_found') }}</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@push('css')
    <style>
        .cards-container.grid-view {
            display: flex;
            flex-wrap: wrap;
        }

        .cards-container.list-view .article-card {
            display: flex;
            flex-direction: row;
        }

        .cards-container.list-view .article-card img {
            max-width: 200px;
            margin-right: 1rem;
        }

        .cards-container.list-view .card-body {
            flex: 1;
        }
    </style>
@endpush

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const viewButtons = document.querySelectorAll('.cards-filter');
            const cardsContainer = document.querySelector('.cards-container');

            // Load saved view from localStorage or session
            const savedView = localStorage.getItem('articleView') || '{{ $articleView }}';
            viewButtons.forEach(btn => btn.classList.remove('active'));
            document.querySelector(`.cards-filter[data-view="${savedView}"]`).classList.add('active');
            updateView(savedView);

            function updateView(view) {
                if (view === 'list') {
                    cardsContainer.classList.remove('grid-view');
                    cardsContainer.classList.add('list-view');
                    cardsContainer.querySelectorAll('.col-lg-4').forEach(col => col.classList.replace('col-lg-4', 'col-12'));
                } else {
                    cardsContainer.classList.remove('list-view');
                    cardsContainer.classList.add('grid-view');
                    cardsContainer.querySelectorAll('.col-12').forEach(col => col.classList.replace('col-12', 'col-lg-4'));
                }
            }

            viewButtons.forEach(button => {
                button.addEventListener('click', function () {
                    viewButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    const view = this.getAttribute('data-view');
                    localStorage.setItem('articleView', view);
                    updateView(view);

                    fetch('{{ route('set-article-view') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ view: view })
                    }).catch(error => console.error('Error saving view:', error));
                });
            });
        });
    </script>
@endpush