@php
  use App\Models\Course;
  use App\Models\CourseType;
  use App\Models\StudyWork;

  $courseTypes = CourseType::query()->withTranslation()->translatedIn(app()->getLocale())->get();
  $study = StudyWork::query()->where('type', 'study')->withTranslation()->translatedIn(app()->getLocale())->get();
  $works = StudyWork::query()->where('type', 'work')->withTranslation()->translatedIn(app()->getLocale())->get();
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow py-md-0 py-3 sticky-top">
  <div class="fixed-share-sm sticky-top d-block d-lg-none justify-content-center w-100 py-1">
    <div class="d-flex align-items-center justify-content-center gap-4">
      <a href="https://www.facebook.com/share/17F5s67mxu/" target="_blank"><i
          class="fa-brands share-icon hovers fa-facebook-f"></i></a>
      <a href="https://x.com/GermaninKuwait?t=ajeSW6AnQZvmg4n6xMOn4A&s=09" target="_blank"><i
          class="fa-brands share-icon hovers fa-twitter"></i></a>
      <a href="https://www.linkedin.com/in/hoamin?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
        target="_blank"><i class="fa-brands share-icon hovers fa-linkedin-in"></i></a>
      <a href="https://www.instagram.com/learn_german_in_kuwait_lgk?igsh=MWlmZzF0a3NxNHFmbw==" target="_blank"><i
          class="fa-brands share-icon hovers fa-instagram"></i></a>
      <a href="https://wa.me/96551434380" target="_blank"><i class="fa-brands share-icon hovers fa-whatsapp"></i></a>
      <a href="https://youtube.com/@germanwithhossam9695?si=YBndVu6sokcdgDez" target="_blank"><i
          class="fa-brands share-icon hovers fa-youtube"></i></a>
    </div>
  </div>
  <div class="container-fluid">

    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ settingImage('logo') }}"
        style="height: 90px; width: 100px" alt="Logo" /></a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <i class="fa-solid fa-bars primary-color"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <li class="nav-item">

          <a @class([
            'nav-link' => true,
            'active' => request()->routeIs('home')
          ]) aria-current="page"
            href="{{ route('home') }}">
            {{ trans('website.header.home') }}
          </a>

        </li>

        <li class="nav-item">

          <a @class([
            'nav-link' => true,
            'active' => request()->routeIs('about')
          ]) href="{{ route('about') }}">
            {{ trans('website.header.why') }}
          </a>

        </li>

        @if($courseTypes->count() > 0)
          <li class="nav-item dropdown">
            <a @class([
              'nav-link dropdown-toggle' => true,
              'active' => request()->routeIs('courses')
            ]) href="#"
              id="coursesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ trans('website.header.courses') }}
              <i class="fa-solid fa-chevron-down me-1"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="coursesDropdown">
              @foreach($courseTypes as $type)
                <li>
                  <a class="dropdown-item" href="{{ route('courses', ['type' => $type->slug]) }}">
                    {{ $type->name }}
                  </a>
                </li>
              @endforeach
            </ul>
          </li>
        @endif

        @if($study->count() > 0 || $works->count() > 0)
          <li class="nav-item dropdown">
            <a @class([
              'nav-link dropdown-toggle' => true,
              'active' => request()->routeIs('study-work')
            ]) href="#"
              id="studyWorkDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ trans('website.header.study') }}
              <i class="fa-solid fa-chevron-down me-1"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="studyWorkDropdown">
              @if($study->count() > 0)
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="{{ route('study-work', 'study') }}">
                    {{ trans('website.header.study') }}
                    <i class="fa-solid fa-chevron-left me-4"></i>
                  </a>
                  <ul class="dropdown-menu">
                    @foreach($study as $item)
                      <li>
                        <a class="dropdown-item" href="{{ route('study-work.detail', $item->slug) }}">
                          {{ $item->name }}
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </li>
              @endif

              @if($works->count() > 0)
                <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="{{ route('study-work', 'work') }}">
                    {{ trans('website.header.work') }}
                    <i class="fa-solid fa-chevron-left me-4"></i>
                  </a>
                  <ul class="dropdown-menu">
                    @foreach($works as $item)
                      <li>
                        <a class="dropdown-item" href="{{ route('study-work.detail', $item->slug) }}">
                          {{ $item->name }}
                        </a>
                      </li>
                    @endforeach
                  </ul>
                </li>
              @endif
            </ul>
          </li>
        @endif

        <li class="nav-item">
          <a @class([
            'nav-link' => true,
            'active' => request()->routeIs('faq')
          ])
            href="{{ route('faq') }}">{{ trans('website.header.faq') }}</a>
        </li>

        <li class="nav-item dropdown">
          <a @class([
            'nav-link dropdown-toggle' => true,
            'active' => request()->routeIs('gallery')
          ]) href="#"
            id="galleryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ trans('website.header.gallery') }}
            <i class="fa-solid fa-chevron-down me-1"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
            <li>
              <a class="dropdown-item" href="{{ route('gallery', 'image') }}">
                {{ trans('website.header.image') }}
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('gallery', 'video') }}">
                {{ trans('website.header.video') }}
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a @class([
            'nav-link' => true,
            'active' => request()->routeIs('contact')
          ])
            href="{{ route('contact') }}">{{ trans('website.header.contact') }}</a>
        </li>

      </ul>

      <div class="d-flex align-items-center justify-content-center ms-lg-4 gap-2">
        @guest
          <a href="{{ route('login') }}" class="primary-btn text-nowrap py-2 px-4 rounded-3 text-decoration-none">
            {{ trans('website.header.login') }}
          </a>
        @endguest
        @auth
          <a href="{{ route('user-profile') }}" class="primary-btn text-nowrap py-2 px-4 rounded-3 text-decoration-none d-flex align-items-center gap-2" title="profile">
            <i class="fa-solid fa-user"></i> {{ trans('website.header.profile') }}
          </a>
        @endauth
        @php
          $currentLocale = LaravelLocalization::getCurrentLocale();
          $targetLocale = ($currentLocale === 'ar') ? 'en' : 'ar';
          $targetLocaleNative = ($currentLocale === 'ar') ? 'En' : 'Ar';
        @endphp

        <a href="{{ LaravelLocalization::getLocalizedURL($targetLocale, null, [], true) }}"
          class="text-decoration-none lang-text">
          <h5 class="primary-color mb-0">
            {{ $targetLocaleNative }}
          </h5>
        </a>

      </div>

    </div>

  </div>
</nav>