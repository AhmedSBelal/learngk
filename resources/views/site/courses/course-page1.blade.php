@php
    use Carbon\Carbon;
    Carbon::setLocale(app()->getLocale());
@endphp
@extends('layouts.site1')
@section('title', 'LGK - ' . ($courseType ? $courseType->name : trans('website.course.all-courses')))
@section('og_title', 'LGK - ' . ($courseType ? $courseType->name : trans('website.course.all-courses')))
@section('seo_description', settingText('course_seo_description', 'short_description'))
@section('og_description', settingText('course_seo_description', 'short_description'))
@section('seo_keywords', settingText('course_seo_keywords', 'short_description'))
@push('css')
    <style>
        .cards-container .col-lg-4 .cards-long {
            display: flex;
            flex-direction: column;
        }

        .cards-container .col-12 .cards-long {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 1rem;
        }

        .cards-container .col-12 .course-img {
            width: 400px;
            height: 100%;
        }

        .cards-container .col-12 .card-body {
            flex: 1;
        }

        .cards-filter {
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cards-filter.active {
            background-color: #fdaf04;
            color: white;
        }

        .cards-filter:hover {
            background-color: #e9ecef;
        }

        .drop-down-arrow {
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }

        .select-input {
            padding-right: 30px;
        }

        .no-results {
            pointer-events: none;
        }
    </style>
@endpush
@section('content')


    <div class="fixed-share d-none d-lg-block">
        <div class="d-flex flex-column align-items-center gap-2">
            <h6 class="m-0">{{ trans('website.global.share') }}</h6>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank">
                <i class="fa-brands share-icon hovers fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" target="_blank">
                <i class="fa-brands share-icon hovers fa-twitter"></i>
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank">
                <i class="fa-brands share-icon hovers fa-linkedin-in"></i>
            </a>
            <a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank">
                <i class="fa-brands share-icon hovers fa-whatsapp"></i>
            </a>
            <h6 class="m-0">{{ trans('website.global.follow_us') }}</h6>
            <a href="{{ settingText('facebook', 'text') }}"><i class="fa-brands share-icon hovers fa-facebook-f"></i></a>
            <a href="{{ settingText('twitter', 'text') }}"><i class="fa-brands share-icon hovers fa-twitter"></i></a>
            <a href="{{ settingText('linkedin', 'text') }}"><i class="fa-brands share-icon hovers fa-linkedin-in"></i></a>
            <a href="{{ settingText('instagram', 'text') }}"><i class="fa-brands share-icon hovers fa-instagram"></i></a>
            <a href="{{ settingText('whatsapp', 'text') }}"><i class="fa-brands share-icon hovers fa-whatsapp"></i></a>
        </div>
    </div>

    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">
            {{ $courseType ? $courseType->name : trans('website.course.all-courses') }}
        </h1>
    </header>

    <section>
        <div class="container-fluid px-md-5">
            <form action="" method="get" class="d-flex gap-4 flex-wrap my-5">
                <div class="position-relative">
                    <i class="fa-solid fa-caret-down position-absolute drop-down-arrow"></i>
                    <select name="type" class="form-control select-input py-2">
                        <option value="">{{ trans('website.course.course-type') }}</option>
                        @forelse($courseTypes as $type)
                            <option value="{{ $type->slug }}" {{ request('type') == $type->slug ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="position-relative">
                    <i class="fa-solid fa-caret-down position-absolute drop-down-arrow"></i>
                    <select name="level" class="form-control select-input py-2">
                        <option value="">{{ trans('website.course.course-level') }}</option>
                        @forelse($courseLevels as $level)
                            <option value="{{ $level }}" {{ request('level') == $level ? 'selected' : '' }}>
                                {{ $level }}
                            </option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="position-relative">
                    <i class="fa-solid fa-caret-down position-absolute drop-down-arrow"></i>
                    <select name="attend" class="form-control select-input py-2">
                        <option value="">{{ trans('website.course.course-attend-type') }}</option>
                        <option value="online" {{ request('attend') == 'online' ? 'selected' : '' }}>
                            {{ trans('website.course.online') }}
                        </option>
                        <option value="presence" {{ request('attend') == 'presence' ? 'selected' : '' }}>
                            {{ trans('website.course.presence') }}
                        </option>
                    </select>
                </div>
                <div class="d-none d-lg-flex rounded-3 border bg-transparent">
                    <div class="py-2 px-4 d-flex gap-1 cards-filter row-cards hovers border-start rounded-end-3"
                        data-view="list">
                        <div class="material-icons cards-filter-icon">sort</div>
                        <p class="m-0 cards-filter-label">{{ trans('website.course.list_view') }}</p>
                    </div>
                    <div class="py-2 px-4 d-flex gap-1 cards-filter long-cards hovers rounded-start-3 active"
                        data-view="grid">
                        <div class="material-icons cards-filter-icon">grid_view</div>
                        <p class="m-0 cards-filter-label">{{ trans('website.course.grid_view') }}</p>
                    </div>
                </div>
                <button class="primary-btn text-nowrap px-5 py-2 rounded-3 text-decoration-none">
                    {{ trans('website.global.search-section-button') }}
                </button>
            </form>
        </div>
    </section>

    <section>
        <div class="container-fluid mt-4 px-md-5">
            <h2 class="why-main-text-2 mb-4">{{ trans('website.course.current_courses') }}</h2>
            <div class="row mt-2 cards-container" id="current-courses-container">
                @forelse ($current_courses as $course)
                    <x-course-card :course="$course" modal-prefix="detailsModal-current" col-size="4"
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

    <section>
        <div class="container-fluid mt-4 px-md-5">
            <h2 class="why-main-text-2 mb-4">{{ trans('website.course.future_courses') }}</h2>
            <div class="row mt-2 cards-container" id="future-courses-container">
                @forelse ($future_courses as $course)
                    <x-course-card :course="$course" modal-prefix="detailsModal-future" col-size="4"
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

    <section>
        <div class="container-fluid my-4 px-md-5">
            <h2 class="why-main-text-2 mb-4">{{ trans('website.course.all-courses') }}</h2>
            <div class="row mt-2 cards-container" id="all-courses-container">
                @forelse ($courses as $course)
                    <x-course-card :course="$course" modal-prefix="detailsModal-all" col-size="4"
                        view="{{ session('courseView', 'grid') }}" />
                @empty
                    <div class="col-12 no-results">
                        <p class="lead text-center" style="font-size: 25px; font-weight: 700;">
                            {{ trans('website.course.course-no-result') }}
                        </p>
                    </div>
                @endforelse
            </div>
            {{ $courses->links('includes.custome-pagination') }}
        </div>
    </section>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const viewButtons = document.querySelectorAll('.cards-filter');
            const containers = [
                document.getElementById('current-courses-container'),
                document.getElementById('future-courses-container'),
                document.getElementById('all-courses-container')
            ];

            // Debugging: Log containers
            console.log('Containers:', containers);

            // Load saved view from localStorage or default to grid
            const savedView = localStorage.getItem('courseView') || 'grid';
            viewButtons.forEach(btn => btn.classList.remove('active'));
            document.querySelector(`.cards-filter[data-view="${savedView}"]`).classList.add('active');
            updateView(savedView);

            viewButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Remove active class from all buttons
                    viewButtons.forEach(btn => btn.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');

                    // Get the view type (list or grid)
                    const view = this.getAttribute('data-view');
                    localStorage.setItem('courseView', view);

                    // Update view and send to server to persist in session
                    updateView(view);
                    fetch('{{ route('set-course-view') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ view: view })
                    }).catch(error => console.error('Error saving view:', error));
                });
            });

            function updateView(view) {
                containers.forEach(container => {
                    if (!container) {
                        console.warn('Container not found:', container);
                        return;
                    }
                    const cards = container.querySelectorAll('.col-lg-4, .col-12');
                    console.log('Cards in container', container.id, ':', cards.length); // Debugging
                    cards.forEach(card => {
                        const cardElement = card.querySelector('.card');
                        const cardsLong = card.querySelector('.cards-long');
                        const courseImg = card.querySelector('.course-img');
                        if (!cardElement || !cardsLong || !courseImg) {
                            console.warn('Missing elements in card:', card);
                            return;
                        }
                        if (view === 'list') {
                            card.classList.remove('col-lg-4');
                            card.classList.add('col-12');
                            cardElement.classList.remove('d-flex', 'flex-column');
                            cardElement.classList.add('d-flex', 'flex-row');
                            cardsLong.classList.remove('d-flex', 'flex-column');
                            cardsLong.classList.add('d-flex', 'flex-row', 'gap-3');
                            courseImg.classList.remove('w-100');
                            courseImg.classList.add('h-100');
                            courseImg.style.width = '400px';
                        } else {
                            card.classList.remove('col-12');
                            card.classList.add('col-lg-4');
                            cardElement.classList.remove('d-flex', 'flex-row');
                            cardElement.classList.add('d-flex', 'flex-column');
                            cardsLong.classList.remove('d-flex', 'flex-row', 'gap-3');
                            cardsLong.classList.add('d-flex', 'flex-column');
                            courseImg.classList.remove('h-100');
                            courseImg.classList.add('w-100');
                            courseImg.style.width = '';
                        }
                    });
                });
            }
        });

        function showModalTab(element, courseId) {
            const target = element.getAttribute('data-target');
            const modal = element.closest('.modal');
            const sections = modal.querySelectorAll(`[id^="pop-up-filter-"][id$="${courseId}"]`);
            sections.forEach(section => section.classList.add('d-none'));
            modal.querySelector(`#${target}`).classList.remove('d-none');
        }
    </script>
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                timer: 3000,
                timerProgressBar: true,
            })
        </script>
    @endif
@endpush