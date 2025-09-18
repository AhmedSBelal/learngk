@php 
                      use Carbon\Carbon;
  Carbon::setLocale(app()->getLocale());
@endphp
@extends('layouts.site1')

@section('title', 'Learn German Kuwait - Homepage')
@section('og_title', 'Learn German Kuwait - Homepage')
@section('seo_description', settingText('home_seo_description', 'short_description'))
@section('og_description', settingText('home_seo_description', 'short_description'))
@section('seo_keywords', settingText('home_seo_keywords', 'short_description'))

@section('content')

  <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content bg-dark">
        <div class="modal-body p-0">
          <video id="videoPlayer" class="w-100" controls>
            <source id="videoSource" src="" type="video/mp4" />
            {{ trans('website.global.video_not_supported') }}
          </video>
        </div>
      </div>
    </div>
  </div>

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

  <header>
    <div class="container-fluid">
      <h1 class="main-title py-md-5 my-3 text-center">
        {!! settingText('landing_desc', 'long_description') !!} <!-- Escaped for safety -->
      </h1>

      <div
        class="d-flex gap-5 align-items-center justify-content-center flex-wrap flex-lg-nowrap mx-lg-5 videos-container">
        <div class="video-thumb position-relative">
          @php
            $ved1 = settingFile('video_landing_1') ? settingFile('video_landing_1') :
              asset('Learn-German-Kuwait/ved/ved.mp4');
          @endphp
          <img src="{{ settingImage('video_landing_1') }}" class="img-fluid ved-1"
            alt="Thumbnail for German learning video 1" data-bs-toggle="modal" data-bs-target="#videoModal"
            data-video="{{ $ved1 }}" />
          <i class="fa-solid fa-play-circle video-icon"></i>
        </div>

        <div class="video-thumb position-relative">
          @php
            $ved2 = settingFile('video_landing_2') ? settingFile('video_landing_2') :
              asset('Learn-German-Kuwait/ved/ved.mp4');
          @endphp
          <img src="{{ settingImage('video_landing_2') }}" class="img-fluid ved-2"
            alt="Thumbnail for German learning video 2" data-bs-toggle="modal" data-bs-target="#videoModal"
            data-video="{{ $ved2 }}" />
          <i class="fa-solid fa-play-circle video-icon"></i>
        </div>

        <div class="video-thumb position-relative">
          @php
            $ved3 = settingFile('video_landing_3') ? settingFile('video_landing_3') :
              asset('Learn-German-Kuwait/ved/ved.mp4');
          @endphp
          <img src="{{ settingImage('video_landing_3') }}" class="img-fluid ved-3"
            alt="Thumbnail for German learning video 3" data-bs-toggle="modal" data-bs-target="#videoModal"
            data-video="{{ $ved3 }}" />
          <i class="fa-solid fa-play-circle video-icon"></i>
        </div>

        <div class="video-thumb position-relative">
          @php
            $ved4 = settingFile('video_landing_4') ? settingFile('video_landing_4') :
              asset('Learn-German-Kuwait/ved/ved.mp4');
          @endphp
          <img src="{{ settingImage('video_landing_4') }}" class="img-fluid ved-4"
            alt="Thumbnail for German learning video 4" data-bs-toggle="modal" data-bs-target="#videoModal"
            data-video="{{ $ved4 }}" />
          <i class="fa-solid fa-play-circle video-icon"></i>
        </div>
      </div>


    </div>
  </header>

  <section class="mt-5">
    <div class="container-fluid">
      <h2 class="text-center mb-md-3 search-text">{{ trans('website.global.search-section-title') }}</h2>
      <form action="{{  route('search') }}" method="get" class="d-flex justify-content-center align-items-center gap-2">
        <div class="position-relative">
          <input type="text" class="form-control search-input py-md-3 py-2 pe-5 rounded-3"
            placeholder="{{ trans('website.global.search-section-field') }}" name="search">
          <i class="fa-solid fa-search search-icon"></i>
        </div>
        <button type="submit"
          class="primary-btn text-nowrap py-md-3 py-2 px-4 rounded-3 text-decoration-none">{{ trans('website.global.search-section-button') }}</button>
      </form>

      <div class="row mt-5 px-md-5">
        <div class="col-lg-5 mb-2">
          @php
            $sliderImages = settingMultiple('why-slider');
          @endphp
          <img src="{{ $sliderImages[0]->url }}" id="why-slider" class="img-fluid w-100 rounded-3 why-img" alt="why img">
        </div>


        {{-- <div class="col-lg-7">
          <div class="card p-4 rounded-3 primary-border why-img why-img-card our-message-card" id="message-card">
            <h3 class="why-text mb-3">{{ trans('website.header.why') }}</h3>
            <h2 class="why-main-text mb-4">{{ settingText('our_message', 'short_description') }}</h2>
            <div class="d-flex gap-2 mb-3">
              <div class="why-filter-btn our-message-btn rounded-3 p-2 hovers active" onclick="showTab('message', this)">
                <h6 class="m-0">{{ settingText('our_message', 'text') }}</h6>
              </div>
              <div class="why-filter-btn our-vission-btn rounded-3 p-2 hovers" onclick="showTab('vission', this)">
                <h6 class="m-0">{{ settingText('our_vision', 'text') }}</h6>
              </div>
              <div class="why-filter-btn our-goal-btn rounded-3 p-2 hovers" onclick="showTab('goal', this)">
                <h6 class="m-0">{{ settingText('our_goal', 'text') }}</h6>
              </div>
            </div>
            <div class="d-flex align-items-center gap-3 pe-3 mt-2">
              {!! settingText('our_message', 'long_description') !!}
            </div>
          </div>

          <div class="card p-4 rounded-3 primary-border why-img why-img-card our-vission-card d-none" id="vission-card">
            <h3 class="why-text mb-3">{{ trans('website.header.why') }}</h3>
            <h2 class="why-main-text mb-4">{{ settingText('our_vision', 'short_description') }}</h2>
            <div class="d-flex gap-2 mb-3">
              <div class="why-filter-btn our-message-btn rounded-3 p-2 hovers" onclick="showTab('message', this)">
                <h6 class="m-0">{{ settingText('our_message', 'text') }}</h6>
              </div>
              <div class="why-filter-btn our-vission-btn rounded-3 p-2 hovers active" onclick="showTab('vission', this)">
                <h6 class="m-0">{{ settingText('our_vision', 'text') }}</h6>
              </div>
              <div class="why-filter-btn our-goal-btn rounded-3 p-2 hovers" onclick="showTab('goal', this)">
                <h6 class="m-0">{{ settingText('our_goal', 'text') }}</h6>
              </div>
            </div>
            <div class="d-flex align-items-center gap-3 pe-3 mt-2">
              {!! settingText('our_vision', 'long_description') !!}
            </div>
          </div>

          <div class="card p-4 rounded-3 primary-border why-img why-img-card our-goals-card d-none" id="goal-card">
            <h3 class="why-text mb-3">{{ trans('website.header.why') }}</h3>
            <h2 class="why-main-text mb-4">{{ settingText('our_goal', 'short_description') }}</h2>
            <div class="d-flex gap-2 mb-3">
              <div class="why-filter-btn our-message-btn rounded-3 p-2 hovers" onclick="showTab('message', this)">
                <h6 class="m-0">{{ settingText('our_message', 'text') }}</h6>
              </div>
              <div class="why-filter-btn our-vission-btn rounded-3 p-2 hovers" onclick="showTab('vission', this)">
                <h6 class="m-0">{{ settingText('our_vision', 'text') }}</h6>
              </div>
              <div class="why-filter-btn our-goal-btn rounded-3 p-2 hovers active" onclick="showTab('goal', this)">
                <h6 class="m-0">{{ settingText('our_goal', 'text') }}</h6>
              </div>
            </div>
            <div class="d-flex align-items-center gap-3 pe-3 mt-2">
              {!! settingText('our_goal', 'long_description') !!}
            </div>
          </div>
        </div> --}}

        <div class="col-lg-7">

          <div class="card p-4 rounded-3 primary-border  why-img-card our-message-card min-height-400" id="message-card">
            <h3 class="why-text mb-3">{{ trans('website.header.why_lgk') }}</h3>
            <h2 class="why-main-text mb-4">{{ trans('website.header.message_main') }}</h2>
            <div class="d-flex gap-2 mb-3">
              <div class="why-filter-btn our-message-btn active rounded-3 p-2 hovers" onclick="showMessage()">
                <h6 class="m-0">{{ trans('website.header.our_message') }}</h6>
              </div>
              <div class="why-filter-btn our-vission-btn rounded-3 p-2 hovers" onclick="showVission()">
                <h6 class="m-0">{{ trans('website.header.our_vision') }}</h6>
              </div>
              <div class="why-filter-btn our-goal-btn rounded-3 p-2 hovers" onclick="showGoal()">
                <h6 class="m-0">{{ trans('website.header.our_goal') }}</h6>
              </div>
            </div>
            <div class="d-flex align-items-center gap-3 pe-3 mt-2">
              <i class="fa-solid fa-graduation-cap why-icon"></i>
              <p class="m-0 why-sub-title">{{ trans('website.header.message_point1') }}</p>
            </div>
            <div class="d-flex align-items-center gap-3 pe-4 mt-2">
              <i class="fa-solid fa-book why-icon"></i>
              <p class="m-0 why-sub-title">{{ trans('website.header.message_point2') }}</p>
            </div>
          </div>

          <div class="card p-4 rounded-3 primary-border why-img why-img-card our-vission-card d-none min-height-400"
            id="vission-card">
            <h3 class="why-text mb-3">{{ trans('website.header.why_lgk') }}</h3>
            <h2 class="why-main-text mb-4">{{ trans('website.header.vision_main') }}</h2>
            <div class="d-flex gap-2 mb-3">
              <div class="why-filter-btn our-message-btn rounded-3 p-2 hovers" onclick="showMessage()">
                <h6 class="m-0">{{ trans('website.header.our_message') }}</h6>
              </div>
              <div class="why-filter-btn our-vission-btn active rounded-3 p-2 hovers" onclick="showVission()">
                <h6 class="m-0">{{ trans('website.header.our_vision') }}</h6>
              </div>
              <div class="why-filter-btn our-goal-btn rounded-3 p-2 hovers" onclick="showGoal()">
                <h6 class="m-0">{{ trans('website.header.our_goal') }}</h6>
              </div>
            </div>
            <div class="d-flex align-items-center gap-3 pe-4 mt-2">
              <i class="fa-solid fa-award why-icon"></i>
              <p class="m-0 why-sub-title">{{ trans('website.header.vision_point1') }}</p>
            </div>
            <div class="d-flex align-items-center gap-3 pe-4 mt-2">
              <i class="fa-solid fa-book why-icon"></i>
              <p class="m-0 why-sub-title">{{ trans('website.header.vision_point2') }}</p>
            </div>
          </div>

          <div class="card p-4 rounded-3 primary-border why-img why-img-card our-goals-card d-none min-height-400"
            id="goal-card">
            <h3 class="why-text mb-3">{{ trans('website.header.why_lgk') }}</h3>
            <h2 class="why-main-text mb-4">{{ trans('website.header.goal_main') }}</h2>
            <div class="d-flex gap-2 mb-3">
              <div class="why-filter-btn our-message-btn rounded-3 p-2 hovers" onclick="showMessage()">
                <h6 class="m-0">{{ trans('website.header.our_message') }}</h6>
              </div>
              <div class="why-filter-btn our-vission-btn rounded-3 p-2 hovers" onclick="showVission()">
                <h6 class="m-0">{{ trans('website.header.our_vision') }}</h6>
              </div>
              <div class="why-filter-btn our-goal-btn active rounded-3 p-2 hovers" onclick="showGoal()">
                <h6 class="m-0">{{ trans('website.header.our_goal') }}</h6>
              </div>
            </div>
            <div class="d-flex align-items-center gap-4 pe-4 mt-2">
              <i class="fa-solid fa-fire-flame-curved why-icon"></i>
              <p class="m-0 why-sub-title">{{ trans('website.header.goal_point1') }}</p>
            </div>
            <div class="d-flex align-items-center gap-3 pe-4 mt-2">
              <i class="fa-solid fa-flag why-icon"></i>
              <p class="m-0 why-sub-title">{{ trans('website.header.goal_point2') }}</p>
            </div>
          </div>

        </div>

      </div>

    </div>
  </section>

  @if($reviews->count() > 0)
    <section class="my-5 px-md-5">
      <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
          <h3 class="why-main-text-2">{{ trans('website.home.review') }}</h3>
          <div class="d-flex align-items-center gap-2">
            <a href="{{ route('reviews-create') }}"
              class="primary-btn text-nowrap py-2 px-4 rounded-3 text-decoration-none">{{ trans('website.global.read-review') }}</a>
            <a href="{{ route('reviews') }}"
              class="primary-btn text-nowrap py-2 px-4 rounded-3 text-decoration-none">{{ trans('website.global.read') }}</a>
          </div>
        </div>
        <div class="swiper mySwiper mt-3">
          <div class="swiper-wrapper">

            @foreach ($reviews as $item)
              <div class="swiper-slide same-row">
                <div class="card p-3 bg-transparent rounded-4 comments-card h-100 w-100">
                  <img src="{{ asset('Learn-German-Kuwait/img/quote.png') }}" class="quote-img mb-md-5" alt="quote-img">
                  <div class="card-body">
                    <h5 class="card-title">{{ $item->review }}</h5>
                    <div class="d-flex gap-2 align-items-center mt-3">
                      <img src=" {{ $item->image->url ?? settingImage('logo') }}" class="student" alt="{{ $item->name }}">
                      <div>
                        <h4 class="student-name m-0">{{ $item->name }}</h4>
                        <h4 class="student-role m-0 mt-1">{{ trans('website.home.review_role') }}</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach

          </div>

          <!-- أزرار التنقل -->
          <!-- <div class="swiper-button-next"></div> -->
          <!-- <div class="swiper-button-prev"></div> -->

          <!-- نقاط (Pagination) -->
          <!-- <div class="swiper-pagination"></div> -->
        </div>

      </div>
    </section>
  @endif

  <section class="my-5 px-md-5">
    <div class="container-fluid">
      <div class="row analytics py-md-5">
        <div class="col-md-3 col-6 px-4 analytics-border-left">
          <div class="d-flex align-items-end justify-content-md-center gap-3 p-3 p-md-0">
            <div class="text-center mt-0">
              <div class="d-flex justify-content-end align-items-start">
                <h2 class="m-0 counter-number">
                  {{ settingText('number_of_students', 'number') }}
                </h2>
              </div>
              <h6 class="counter-label">{{ settingText('number_of_students', 'text') }}</h6>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6 px-4 analytics-border-left">
          <div class="d-flex justify-content-md-center gap-3 p-3 p-md-0">
            <div class="text-center mt-0">
              <div class="d-flex justify-content-end align-items-start">
                <h3 class="m-0 counter-number">%</h3>
                <h2 class="m-0  counter-number">
                  {{ settingText('success_rate', 'number') }}
                </h2>
              </div>
              <h6 class="counter-label">{{ settingText('success_rate', 'text') }}</h6>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6 px-4 analytics-border-left">
          <div class="d-flex justify-content-md-center gap-3 p-3 p-md-0">
            <div class="text-center mt-0">
              <div class="d-flex justify-content-end align-items-start">
                <h2 class="m-0  counter-number">
                  {{ settingText('teachers', 'number') }}
                </h2>
              </div>
              <h6 class="counter-label">{{ settingText('teachers', 'text') }}</h6>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6 px-4">
          <div class="d-flex justify-content-md-center gap-3 p-3 p-md-0">
            <div class="text-center mt-0">
              <div class="d-flex justify-content-end align-items-start">
                <h2 class="m-0  counter-number">
                  {{ settingText('years_of_experience', 'number') }}
                </h2>
                <h3 class="m-0 counter-number">+</h3>
              </div>
              <h6 class="counter-label">
                {{ settingText('years_of_experience', 'text') }}
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @if ($courses->count() > 0)

    <section class="my-5 px-md-5 courses-fit-hight">
      <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">
          <h3 class="why-main-text-2">{{ trans('website.home.upcoming_courses') }}</h3>
          <a href="{{ route('courses') }}"
            class="primary-btn text-nowrap py-2 px-4 rounded-3 text-decoration-none">{{ trans('website.home.more') }}</a>
        </div>

        <div class="swiper mySwiper mt-3">
          <div class="swiper-wrapper mb-4">

            @foreach ($courses as $course)


              <div class="swiper-slide">
                <div class="card p-3 rounded-4 course-card course-information h-100 w-100">
                  <img src="{{ asset($course->image->url ?? '') }}" class="course-img rounded-3 w-100"
                    alt="{{ $course->name }}" />
                  <div class="card-body px-0">
                    <h5 class="card-title why-text">
                      {{ $course->months }}
                      {{ $course->course_level->name }}
                    </h5>
                    <p class="card-text">
                      {{ $course->translations->first()->short_description }}
                    </p>
                    <div class="d-flex gap-3 align-items-center mt-3 pb-4" style="border-bottom: 5px solid #fdaf0433">
                      <div class="d-flex gap-2 align-items-center">
                        <i class="fa-solid fa-calendar-days primary-color"></i>
                        @php
                          $date = Carbon::parse($course->start_date);
                          Carbon::setLocale(app()->getLocale());
                          if (app()->getLocale() === 'ar') {
                            $monthName = $date->translatedFormat('F'); // Gets localized month name
                            $formattedDate = $date->format('d') . '-' . $monthName;
                          } else {
                            $formattedDate = $date->format('F-d');
                          }
                        @endphp
                        <h4 class="card-text m-0">{{ $formattedDate }}</h4>
                      </div>
                      <div class="d-flex gap-2 align-items-center">
                        <i class="fa-solid fa-clock primary-color"></i>
                        <h4 class="card-text m-0">{{ Carbon::createFromFormat('H:i:s', $course->from)->format('h:i A') }}</h4>
                      </div>
                      <div class="d-flex gap-2 align-items-center">
                        <i class="fa-solid fa-hourglass-half primary-color"></i>
                        <h4 class="card-text m-0">{{$course->duration}}</h4>
                      </div>
                    </div>
                    {{-- <div class="d-flex gap-2 align-items-center mt-3 mr-div">
                      <img src="img/hossam.png" class="student" alt="student" />
                      <div>
                        <h4 class="student-name m-0">حسام أمين</h4>
                      </div>
                    </div> --}}
                    <div class="mt-3 w-100 details-btn">
                      <div class="primary-btn hovers p-2 text-center" data-bs-toggle="modal"
                        data-bs-target="#detailsModal-{{ $course->id }}">
                        {{ trans('website.home.details') }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            @endforeach

          </div>

          <!-- أزرار التنقل -->
          <!-- <div class="swiper-button-next"></div> -->
          <!-- <div class="swiper-button-prev"></div> -->

          <!-- نقاط (Pagination) -->
          <!-- <div class="swiper-pagination"></div> -->
        </div>
        @foreach ($courses as $course)
          <div class="modal fade" id="detailsModal-{{$course->id}}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h3 class="m-0 pop-up-main-title">{{ trans('website.home.course_details') }}</h3>
                  <i class="fa-regular fa-circle-xmark fa-2x hovers" data-bs-dismiss="modal"></i>
                </div>

                <div class="modal-body p-0">
                  <div class="row">
                    <div class="col-md-8">
                      <img src=" {{ asset($course->image->url ?? '') }}" class="course-pop-up-img img-fluid w-100 mb-3"
                        alt="{{ $course->name }}">
                      <div class="d-flex gap-2 mb-3">
                        <div class="rounded-pill py-2 px-3 keyword-badge">{{ trans('website.home.months') }}</div>
                        <div class="rounded-pill py-2 px-3 keyword-badge">{{ trans('website.home.new') }}</div>
                      </div>
                      <h3 class="pop-up-sub-title mb-3">
                        {{ $course->months }}
                        {{ $course->course_level->name }}
                      </h3>
                      <div class="row">
                        {{-- <div class="col-md-6 mb-3">
                          <div class="d-flex gap-2 align-items-center mr-div">
                            <img src=" {{ asset('LGK/img/hossam.png') }}" class="pop-up-mr-img" alt="pop-up-mr">
                            <div>
                              <h4 class="pop-up-mr-name m-0">حسام أمين</h4>
                            </div>
                          </div>
                        </div> --}}
                        <div class="col-md-6 mb-3">
                          <div class="d-flex gap-2 align-items-center">
                            <i class="fa-solid fa-clock primary-color" style="font-size: 25px;"></i>
                            <h4 class="pop-up-mr-name m-0">{{ $course->duration }}</h4>
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <div class="d-flex gap-2 align-items-center">
                            <i class="fa-solid fa-calendar-day primary-color" style="font-size: 25px;"></i>
                            @php
                              if (app()->getLocale() === 'ar') {
                                $formattedDate = $date->translatedFormat('d F Y');
                              } else {
                                $formattedDate = $date->format('d F Y');
                              }

                            @endphp
                            <h4 class="pop-up-mr-name m-0">{{ $formattedDate }}</h4>
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <div class="d-flex gap-2 align-items-center">
                            <i class="fa-solid fa-tag primary-color" style="font-size: 25px;"></i>
                            <h4 class="pop-up-mr-name m-0">{{ $course->price }} {{ trans('website.home.dinar') }}</h4>
                          </div>
                        </div>
                      </div>

                      <div class="row mt-2 px-4">
                        <div class="col-md-4 px-0">
                          <div class="pop-up-filter-card hovers d-flex justify-content-center align-items-center gap-2 py-4"
                            data-target="pop-up-filter-view-{{ $course->id }}"
                            onclick="showModalTab(this, '{{ $course->id }}')">
                            <i class="fa-solid fa-star"></i>
                            <h5 class="pop-up-filter-text m-0">{{ trans('website.home.course_overview') }}</h5>
                          </div>
                        </div>
                        {{-- <div class="col-md-4 px-0">
                          <div class="pop-up-filter-card hovers d-flex justify-content-center align-items-center gap-2 py-4"
                            data-target="pop-up-filter-edu-{{ $course->id }}"
                            onclick="showModalTab(this, '{{ $course->id }}')">
                            <i class="fa-solid fa-book"></i>
                            <h5 class="pop-up-filter-text m-0">{{ trans('website.home.course_of_study') }}</h5>
                          </div>
                        </div>
                        <div class="col-md-4 px-0">
                          <div class="pop-up-filter-card hovers d-flex justify-content-center align-items-center gap-2 py-4"
                            data-target="pop-up-filter-teacher-{{ $course->id }}"
                            onclick="showModalTab(this, '{{ $course->id }}')">
                            <i class="fa-solid fa-user"></i>
                            <h5 class="pop-up-filter-text m-0">{{ trans('website.home.teacher') }}</h5>
                          </div>
                        </div> --}}
                      </div>


                      <!-- Course Overview Section -->
                      <div class="row my-3 px-4 pop-up-filter-view-{{ $course->id }}">
                        <div class="col-12">
                          <h3 class="mb-2 pop-up-filter-main-title">{{ trans('website.home.course_description') }}</h3>
                          <h4 class="mb-2 pop-up-filter-sub-title">
                            {!! $course->translations->first()->description !!}
                          </h4>
                        </div>
                      </div>

                      {{-- <!-- Curriculum Section -->
                      <div class="row my-3 pop-up-filter-edu-{{ $course->id }} d-none">
                        <div class="col-12">
                          <div class="accordion" id="faqAccordion-{{ $course->id }}">
                            <!-- Item 1 -->
                            <div class="accordion-item mb-2 rounded-4 border">
                              <h2 class="accordion-header">
                                <button
                                  class="accordion-button rounded-4 d-flex justify-content-between align-items-center collapsed"
                                  type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $course->id }}">
                                  <span class="me-auto">أساسيات التحدث باللغة الألمانية</span>
                                </button>
                              </h2>
                              <div id="collapseOne-{{ $course->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordion-{{ $course->id }}">
                                <div class="accordion-body">
                                  هنا تضع المحتوى الخاص بالبند الأول.
                                </div>
                              </div>
                            </div>
                            <!-- Item 2 -->
                            <div class="accordion-item mb-2 rounded-4 border">
                              <h2 class="accordion-header">
                                <button
                                  class="accordion-button rounded-4 d-flex justify-content-between align-items-center collapsed"
                                  type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo-{{ $course->id }}">
                                  <span class="me-auto">أساسيات التحدث باللغة الألمانية</span>
                                </button>
                              </h2>
                              <div id="collapseTwo-{{ $course->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordion-{{ $course->id }}">
                                <div class="accordion-body">
                                  هنا تضع المحتوى الخاص بالبند الثانى.
                                </div>
                              </div>
                            </div>
                            <!-- Item 3 -->
                            <div class="accordion-item mb-2 rounded-4 border">
                              <h2 class="accordion-header">
                                <button
                                  class="accordion-button rounded-4 d-flex justify-content-between align-items-center collapsed"
                                  type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree-{{ $course->id }}">
                                  <span class="me-auto">أساسيات التحدث باللغة الألمانية</span>
                                </button>
                              </h2>
                              <div id="collapseThree-{{ $course->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordion-{{ $course->id }}">
                                <div class="accordion-body">
                                  هنا تضع المحتوى الخاص بالبند الثالث.
                                </div>
                              </div>
                            </div>
                            <!-- Item 4 -->
                            <div class="accordion-item mb-2 rounded-4 border">
                              <h2 class="accordion-header">
                                <button
                                  class="accordion-button rounded-4 d-flex justify-content-between align-items-center collapsed"
                                  type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour-{{ $course->id }}">
                                  <span class="me-auto">أساسيات التحدث باللغة الألمانية</span>
                                </button>
                              </h2>
                              <div id="collapseFour-{{ $course->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordion-{{ $course->id }}">
                                <div class="accordion-body">
                                  هنا تضع المحتوى الخاص بالبند الرابع.
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
                              <img src="{{ asset('LGK/img/Teacher.png') }}" class="teacher-img rounded-3 w-100"
                                alt="teacher-img">
                            </div>
                            <div class="card-body text-center">
                              <h5 class="card-title why-text mb-4">حسام أمين</h5>
                              <p class="teacher-role mb-4">معلم</p>
                            </div>
                          </div>
                        </div>
                      </div> --}}

                    </div>


                    <div class="col-md-4">
                      <div class="course-information py-2 px-4 rounded-3"
                        dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                        <h3 class="pop-up-filter-main-title py-3 border-bottom m-0">
                          {{ trans('website.home.course_information') }}
                        </h3>
                        <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                          <i class="fa-solid fa-chart-simple primary-color"></i>
                          <h6 class="course-information-label m-0">{{ trans('website.home.level') }}</h6>
                          <h6 class="pop-up-filter-sub-title m-0">{{ $course->course_level->name }}</h6>
                        </div>
                        <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                          <i class="fa-solid fa-circle-play primary-color"></i>
                          <h6 class="course-information-label m-0">{{ trans('website.home.start_date') }}</h6>
                          @php
                            $startDate = Carbon::parse($course->start_date);
                            // Carbon::setLocale(app()->getLocale());
                            $formattedStartDate = app()->getLocale() === 'ar' ? $startDate->translatedFormat('d F Y') :
                              $startDate->format('d F Y');
                          @endphp
                          <h6 class="pop-up-filter-sub-title m-0">{{ $formattedStartDate }}</h6>
                        </div>
                        <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                          <i class="fa-solid fa-circle-pause primary-color"></i>
                          <h6 class="course-information-label m-0">{{ trans('website.home.end_date') }}</h6>
                          @php
                            $endDate = Carbon::parse($course->end_date);
                            $formattedEndDate = app()->getLocale() === 'ar' ? $endDate->translatedFormat('d F Y') :
                              $endDate->format('d F Y');
                          @endphp
                          <h6 class="pop-up-filter-sub-title m-0">{{ $formattedEndDate }}</h6>
                        </div>
                        <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                          <i class="fa-solid fa-location-dot primary-color"></i>
                          <h6 class="course-information-label m-0">{{ trans('website.home.type') }}</h6>
                          <h6 class="pop-up-filter-sub-title m-0">
                            {{ trans('website.home.course_types.' . $course->course_attend_type) }}
                          </h6>
                        </div>
                        <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                          <i class="fa-solid fa-hourglass-half primary-color"></i>
                          <h6 class="course-information-label m-0">{{ trans('website.home.duration') }}</h6>
                          <h6 class="pop-up-filter-sub-title m-0">{{ $course->duration }}
                          </h6>
                        </div>
                        <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                          <i class="fa-solid fa-book primary-color"></i>
                          <h6 class="course-information-label m-0">{{ trans('website.home.course_book') }}</h6>
                          <h6 class="pop-up-filter-sub-title m-0">
                            {{ $course->course_book ?? trans('website.home.not_specified') }}
                          </h6>
                        </div>
                        <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                          <i class="fa-solid fa-pencil primary-color"></i>
                          <h6 class="course-information-label m-0">{{ trans('website.home.participants') }}</h6>
                          <h6 class="pop-up-filter-sub-title m-0">{{ $course->participant }}</h6>
                        </div>
                        <div class="d-flex w-100">
                          <a href="{{ route('courses.enroll', $course->slug) }}"
                            class="primary-btn w-100 text-center my-3 py-3 px-4 rounded-3 text-decoration-none">
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
        @endforeach
      </div>
    </section>

  @endif

  <!--====== Article`s Start ======-->
  @if($articles->count() > 0)

    <section class="my-5 px-md-5 articles-fit-hight">
      <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="why-main-text-2">{{ trans('website.home.article') }}</h3>
          <a href="{{ route('articles') }}"
            class="primary-btn text-nowrap py-2 px-4 rounded-3 text-decoration-none">{{ trans('website.global.read') }}</a>
        </div>
        <div class="swiper mySwiper mt-3">
          <div class="swiper-wrapper mb-4">

            @forelse ($articles as $article)
              <div class="swiper-slide">
                <div class="card p-3 rounded-4 article-card course-information h-100 w-100">
                  <div class="position-relative">
                    <img src="{{ $article->image->url ?? ' ' }}" class="course-img rounded-3 w-100" alt="course-img" />
                    <div class="primary-bg p-3 article-date">{{ Carbon::make($article->created_at)->format('d M, Y') }}</div>
                  </div>
                  <div class="card-body px-0">
                    <h5 class="card-title why-text mb-4">{{ $article->title }}</h5>
                    <p class="card-text mb-4">
                      {{ Str::limit($article->description, 300, '...') }}
                    </p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                      <a href="{{ route('articles.show', $article->slug) }}"
                        class="read-more">{{ trans('website.global.read')}}</a>
                    </div>
                  </div>
                </div>
              </div>
            @empty

            @endforelse

          </div>

          <!-- أزرار التنقل -->
          <!-- <div class="swiper-button-next"></div> -->
          <!-- <div class="swiper-button-prev"></div> -->

          <!-- نقاط (Pagination) -->
          <!-- <div class="swiper-pagination"></div> -->
        </div>
      </div>
    </section>


  @endif
  <!--====== Article`s End ======-->

  <!--====== Teacher`s Start ======-->
  @if($teams->count() > 0)

    <section class="my-5 px-md-5">
      <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
          <h3 class="why-main-text-2">{{ trans('website.home.team') }}</h3>
          <a href="{{ route('teams') }}" class="primary-btn text-nowrap py-2 px-4 rounded-3 text-decoration-none">{{
        trans('website.home.more') }}</a>
        </div>
        <div class="row mt-2">

          @foreach ($teams as $team)
            <div class="col-lg-4 mb-3">
              <div class="card bg-white rounded-4 team-card h-100">
                <div class="position-relative">
                  <img src="{{  $team->image->url ?? ''  }}" class="teacher-img rounded-3 w-100"
                    alt="teacher-{{ $team->name }}" />
                </div>
                <div class="card-body text-center">
                  <a href="{{ route('teams.show', $team->slug) }}" class="why-text text-decoration-none">
                    <h5 class="card-title why-text mb-4">{{ $team->name }}</h5>
                  </a>
                  <p class="teacher-role mb-4">{{ trans('website.home.team_section.teacher') }}</p>
                  <div class="d-flex align-items-center justify-content-center gap-4">
                    <a href="{{ $team->facebook }}" class="card p-2 rounded-circle primary-color"><i
                        class="fa-brands hovers fa-facebook-f"></i></a>
                    <a href="tel:{{ $team->phone }}" class="card p-2 rounded-circle primary-color"><i
                        class="fa-solid hovers fa-phone"></i></a>
                    <a href="mailto:{{ $team->email }}" class="card p-2 rounded-circle primary-color"><i
                        class="fa-solid hovers fa-envelope"></i></a>
                    <a href="{{ $team->twitter }}" class="card p-2 rounded-circle primary-color"><i
                        class="fa-brands hovers fa-twitter"></i></a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </section>

  @endif
  <!--====== Teacher`s End ======-->

  @php
    $sliderImages = settingMultiple('why-slider');
  @endphp
  {{-- @foreach ($sliderImages as $image)
  @dd($image->url)
  @endforeach --}}

@endsection

@push('js')

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Dynamic images from backend
      const images = [
        @forelse(settingMultiple('hero images') as $item)
          "{{ $item->url }}",
        @empty
          // Fallback images if no settings found
          // "LGK/img/6234a6c217058_0-(10).jpeg",
          // "LGK/img/6234a99bb11c1_0-(22).jpeg",
          // "LGK/img/6234a59a6c08d_02.jpeg"
          settingImage('logo')
        @endforelse
                                                                                  ];

      // If no images found in settings, use fallback
      if (images.length === 0) {
        images = [
          "LGK/img/6234a6c217058_0-(10).jpeg",
          "LGK/img/6234a99bb11c1_0-(22).jpeg",
          "LGK/img/6234a59a6c08d_02.jpeg"
        ];
      }

      let index = 0;
      const slider = document.getElementById("why-slider");

      setInterval(() => {
        // Fade out animation
        slider.classList.add("fade-out");

        setTimeout(() => {
          index = (index + 1) % images.length;
          slider.src = images[index];

          // Fade in animation after changing image
          slider.classList.remove("fade-out");
        }, 300); // Same as transition time
      }, 10000); // Change every 10 seconds
    });
  </script>

  <script>
    function showTab(tabName, clickedButton) {
      // Hide all cards
      document.getElementById('message-card').classList.add('d-none');
      document.getElementById('vission-card').classList.add('d-none');
      document.getElementById('goal-card').classList.add('d-none');

      // Show selected card
      document.getElementById(tabName + '-card').classList.remove('d-none');

      // Remove active class from all buttons in ALL cards
      const allButtons = document.querySelectorAll('.why-filter-btn');
      allButtons.forEach(btn => {
        btn.classList.remove('active');
      });

      // Add active class to clicked button
      clickedButton.classList.add('active');

      // Also update the active state in the other cards' buttons
      const otherButtons = document.querySelectorAll(`.why-filter-btn[onclick*="${tabName}"]`);
      otherButtons.forEach(btn => {
        btn.classList.add('active');
      });
    }

    // Initialize first tab as active on page load
    // document.addEventListener('DOMContentLoaded', function () {
    //   document.getElementById('message-card').classList.remove('d-none');
    //   const firstButtons = document.querySelectorAll('.our-message-btn');
    //   firstButtons.forEach(btn => {
    //     btn.classList.add('active');
    //   });
    // });
  </script>

  <script>
    function showModalTab(element, courseId) {
      // Remove 'active' class from all tabs
      const tabs = document.querySelectorAll(`.pop-up-filter-card`);
      tabs.forEach(tab => tab.classList.remove('active'));

      // Add 'active' class to the clicked tab
      element.classList.add('active');

      // Hide all content sections
      const sections = [
        `pop-up-filter-view-${courseId}`,
        `pop-up-filter-edu-${courseId}`,
        `pop-up-filter-teacher-${courseId}`
      ];
      sections.forEach(section => {
        const sectionElement = document.querySelector(`.${section}`);
        if (sectionElement) {
          sectionElement.classList.add('d-none');
        }
      });

      // Show the target section
      const targetSection = document.querySelector(`.${element.getAttribute('data-target')}`);
      if (targetSection) {
        targetSection.classList.remove('d-none');
      }
    }

    // Set the default active tab when the modal opens
    document.addEventListener('show.bs.modal', function (event) {
      const modal = event.target;
      const courseId = modal.id.replace('detailsModal-', '');
      const defaultTab = document.querySelector(`.pop-up-filter-card[data-target="pop-up-filter-view-${courseId}"]`);
      if (defaultTab) {
        showModalTab(defaultTab, courseId);
      }
    });
  </script>

  // why slider
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const slider = document.getElementById("why-slider");
      if (slider) {

        // const images = [
        //   "Learn-German-Kuwait/img/6234a6c217058_0-(10).jpeg",
        //   "Learn-German-Kuwait/img/6234a99bb11c1_0-(22).jpeg",
        //   "Learn-German-Kuwait/img/6234a59a6c08d_02.jpeg"
        // ];
        const images = @json($sliderImages->pluck('url')->toArray());

        let index = 0;

        setInterval(() => {
          slider.classList.add("fade-out");
          setTimeout(() => {
            index = (index + 1) % images.length;
            slider.src = images[index];
            slider.classList.remove("fade-out");
          }, 300);
        }, 3000);
      }
    }); 
  </script>

  <script>
    // نحدد الكونتينر الأساسي
    const container = document.querySelector(".videos-container");

    function rotateVideos() {
      const first = container.firstElementChild; // أول فيديو
      container.appendChild(first); // نحطه في الآخر
    }

    // نتحقق من حجم الشاشة
    const mediaQuery = window.matchMedia("(min-width: 768px)");

    if (mediaQuery.matches) {
      // لو الشاشة أكبر من md يبدأ التبديل
      setInterval(rotateVideos, 3000);
    }
  </script>

@endpush

@push('css')

  <style>
    .courses-fit-hight .swiper-slide {
      display: flex !important;
      height: auto !important;
    }

    .articles-fit-hight .swiper-slide {
      display: flex !important;
      height: auto !important;
    }
  </style>

@endpush