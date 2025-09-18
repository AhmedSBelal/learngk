@props([
    'course',
    'modalPrefix' => 'detailsModal',
])
<div class="col-12 col-lg-{{ $attributes->get('col-size', 4) }} mb-3">
    <div class="card p-3 rounded-4 course-card course-information h-100 {{ $attributes->get('view', 'grid') === 'list' ? 'd-flex flex-row' : 'd-flex flex-column' }}">
        <div class="cards-long d-flex {{ $attributes->get('view', 'grid') === 'list' ? 'flex-row gap-3' : 'flex-column' }}">
            <img src="{{ $course->image->url ?? asset('LGK/img/placeholder.png') }}" 
                 class="course-img rounded-3 {{ $attributes->get('view', 'grid') === 'list' ? 'h-100' : 'w-100' }}" 
                 style="{{ $attributes->get('view', 'grid') === 'list' ? 'width: 400px;' : '' }}"
                 alt="{{ $course->name ?? 'Course' }}">
            <div class="card-body px-0">
                <h5 class="card-title why-text">
                    {{ $course->months ?? '' }}
                    {{ optional($course->course_level)->name ?? trans('website.home.not_specified') }}
                </h5>
                <p class="card-text">
                    {{ $course->translations->first()->short_description ?? trans('website.home.no_description') }}
                </p>
                <div class="d-flex gap-3 align-items-center mt-3 pb-4" style="border-bottom:5px solid #FDAF0433;">
                    <div class="d-flex gap-2 align-items-center">
                        <i class="fa-solid fa-calendar-days primary-color"></i>
                        @php
                            $date = \Carbon\Carbon::parse($course->start_date);
                            $formattedDate = app()->getLocale() === 'ar' ? $date->translatedFormat('d F') : $date->format('F d');
                        @endphp
                        <h4 class="card-text m-0">{{ $formattedDate }}</h4>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <i class="fa-solid fa-clock primary-color"></i>
                        <h4 class="card-text m-0">
                            {{ $course->from ? \Carbon\Carbon::createFromFormat('H:i:s', $course->from)->format('h:i A') : trans('website.home.not_specified') }}
                        </h4>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <i class="fa-solid fa-hourglass-half primary-color"></i>
                        <h4 class="card-text m-0">{{ $course->duration ?? trans('website.home.not_specified') }}</h4>
                    </div>
                </div>
                <div class="details-teacher d-flex justify-content-between align-items-center">
                    <div class="mt-3">
                        <div class="primary-btn hovers p-2 text-center" data-bs-toggle="modal" data-bs-target="#{{ $modalPrefix }}-{{ $course->id }}">
                            {{ trans('website.home.details') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal (unchanged from previous response, included for completeness) -->
<div class="modal fade" id="{{ $modalPrefix }}-{{ $course->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content p-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="m-0 pop-up-main-title">{{ trans('website.home.course_details') }}</h3>
                <i class="fa-regular fa-circle-xmark fa-2x hovers" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body p-0">
                <div class="row">
                    <div class="col-md-8">
                        <img src="{{ $course->image->url ?? asset('LGK/img/placeholder.png') }}" class="course-pop-up-img img-fluid w-100 mb-3" alt="{{ $course->name ?? 'Course' }}">
                        <div class="d-flex gap-2 mb-3">
                            <div class="rounded-pill py-2 px-3 keyword-badge">{{ trans('website.home.months') }}</div>
                            <div class="rounded-pill py-2 px-3 keyword-badge">{{ trans('website.home.new') }}</div>
                        </div>
                        <h3 class="pop-up-sub-title mb-3">
                            {{ $course->months ?? '' }}
                            {{ optional($course->course_level)->name ?? trans('website.home.not_specified') }}
                        </h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-clock primary-color" style="font-size: 25px;"></i>
                                    <h4 class="pop-up-mr-name m-0">{{ $course->duration ?? '22 ساعة' }}</h4>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-calendar-day primary-color" style="font-size: 25px;"></i>
                                    @php
                                        $date = \Carbon\Carbon::parse($course->start_date);
                                        $formattedDate = app()->getLocale() === 'ar' ? $date->translatedFormat('d F Y') : $date->format('d F Y');
                                    @endphp
                                    <h4 class="pop-up-mr-name m-0">{{ $formattedDate }}</h4>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex gap-2 align-items-center">
                                    <i class="fa-solid fa-tag primary-color" style="font-size: 25px;"></i>
                                    <h4 class="pop-up-mr-name m-0">{{ $course->price ?? '0' }} {{ trans('website.home.dinar') }}</h4>
                                </div>
                            </div>
                        </div>

                        <!-- Course Overview Section -->
                        <div class="row my-3 px-4 pop-up-filter-view-{{ $course->id }}">
                            <div class="col-12">
                                <h3 class="mb-2 pop-up-filter-main-title">{{ trans('website.home.course_description') }}</h3>
                                <h4 class="mb-2 pop-up-filter-sub-title">{!! $course->translations->first()->description ?? trans('website.home.no_description') !!}</h4>
                            </div>
                        </div>

                        <!-- Curriculum Section -->
                        <div class="row my-3 pop-up-filter-edu-{{ $course->id }} d-none">
                            <div class="col-12">
                                <div class="accordion" id="faqAccordion-{{ $course->id }}">
                                    <div class="accordion-item mb-2 rounded-4 border">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button rounded-4 d-flex justify-content-between align-items-center collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $course->id }}">
                                                <span class="me-auto">{{ trans('website.home.curriculum_item_1') }}</span>
                                            </button>
                                        </h2>
                                        <div id="collapseOne-{{ $course->id }}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion-{{ $course->id }}">
                                            <div class="accordion-body">
                                                {{ trans('website.home.curriculum_item_1_content') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Teacher Section -->
                        <div class="row my-3 pop-up-filter-teacher-{{ $course->id }} d-none">
                            <div class="col-md-5">
                                <div class="card bg-white rounded-4 team-card h-100">
                                    <div class="position-relative">
                                        <img src="{{ asset('LGK/img/Teacher.png') }}" class="teacher-img rounded-3 w-100" alt="teacher-img">
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title why-text mb-4">{{ $course->teacher_name ?? 'حسام أمين' }}</h5>
                                        <p class="teacher-role mb-4">{{ trans('website.home.teacher') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="course-information py-2 px-4 rounded-3" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                            <h3 class="pop-up-filter-main-title py-3 border-bottom m-0">{{ trans('website.home.course_information') }}</h3>
                            <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                                <i class="fa-solid fa-chart-simple primary-color"></i>
                                <h6 class="course-information-label m-0">{{ trans('website.home.level') }}</h6>
                                <h6 class="pop-up-filter-sub-title m-0">{{ optional($course->course_level)->name ?? trans('website.home.not_specified') }}</h6>
                            </div>
                            <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                                <i class="fa-solid fa-circle-play primary-color"></i>
                                <h6 class="course-information-label m-0">{{ trans('website.home.start_date') }}</h6>
                                <h6 class="pop-up-filter-sub-title m-0">{{ $formattedDate }}</h6>
                            </div>
                            <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                                <i class="fa-solid fa-circle-pause primary-color"></i>
                                <h6 class="course-information-label m-0">{{ trans('website.home.end_date') }}</h6>
                                @php
                                    $endDate = \Carbon\Carbon::parse($course->end_date);
                                    $formattedEndDate = app()->getLocale() === 'ar' ? $endDate->translatedFormat('d F Y') : $endDate->format('d F Y');
                                @endphp
                                <h6 class="pop-up-filter-sub-title m-0">{{ $formattedEndDate }}</h6>
                            </div>
                            <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                                <i class="fa-solid fa-location-dot primary-color"></i>
                                <h6 class="course-information-label m-0">{{ trans('website.home.type') }}</h6>
                                <h6 class="pop-up-filter-sub-title m-0">{{ trans('website.home.course_types.' . ($course->course_attend_type ?? 'not_specified')) }}</h6>
                            </div>
                            <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                                <i class="fa-solid fa-hourglass-half primary-color"></i>
                                <h6 class="course-information-label m-0">{{ trans('website.home.duration') }}</h6>
                                <h6 class="pop-up-filter-sub-title m-0">{{ $course->duration ?? trans('website.home.not_specified') }}</h6>
                            </div>
                            <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                                <i class="fa-solid fa-book primary-color"></i>
                                <h6 class="course-information-label m-0">{{ trans('website.home.course_book') }}</h6>
                                <h6 class="pop-up-filter-sub-title m-0">{{ $course->course_book ?? trans('website.home.not_specified') }}</h6>
                            </div>
                            <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                                <i class="fa-solid fa-pencil primary-color"></i>
                                <h6 class="course-information-label m-0">{{ trans('website.home.participants') }}</h6>
                                <h6 class="pop-up-filter-sub-title m-0">{{ $course->participant ?? trans('website.home.not_specified') }}</h6>
                            </div>
                            <div class="d-flex w-100">
                                <a href="{{ route('courses.enroll', $course->slug) }}" class="primary-btn w-100 text-center my-3 py-3 px-4 rounded-3 text-decoration-none">
                                    {{ trans('website.home.book_now') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>