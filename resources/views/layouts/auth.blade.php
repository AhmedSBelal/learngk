<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  {{-- back meta --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="@yield('seo_description', '')">
  <meta name="keywords" content="@yield('seo_keywords', '')">
  <title>@yield('title', 'Learn German Kuwait - Homepage')</title>
  <!-- Google Site Verification  -->
  <meta name="google-site-verification" content="yXvr3b5R-3C_XSrG5avfxMW6ue4m2wW-lWts9kipplI" />

  <!-- Open Graph (OG) meta tags are snippets of code that control how URLs are displayed when shared on social media  -->
  <meta property="og:locale" content="{{ LaravelLocalization::getCurrentLocaleRegional() }}" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="@yield('og_title', 'Learn German Kuwait - Homepage')" />
  <meta property="og:url" content="{{ env("APP_URL") }}" />
  <meta property="og:site_name" content="@yield('og_siteName', 'Learn German Kuwait')" />
  <!-- For the og:image content, replace the # with a link of an image -->
  <meta property="og:image" content="{{ settingImage('site_image') }}" />
  <meta property="og:description" content="@yield('og_description', '')" />
  <!-- Add site Favicon -->
  <link rel="icon" href="{{ settingImage('logo') }}" sizes="32x32" />
  <link rel="icon" href="{{ settingImage('logo') }}" sizes="192x192" />
  <link rel="apple-touch-icon" href="{{ settingImage('logo') }}" />
  <meta name="msapplication-TileImage" content="{{ settingImage('logo') }}" />
  <link rel="stylesheet" href="{{ asset('Learn-German-Kuwait/css/style.css') }}" />
  <!--woow AnimateFiles Css-->
  <link rel="stylesheet" href="{{ asset('Learn-German-Kuwait/css/all.min.css') }}" />
  <!--bootstrap-file-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  @stack('css')
  <title>test</title>
</head>

<body>


  {{-- @include('includes.header1') --}}

  @yield('content')

  {{-- @include('includes.footer1') --}}



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="{{ asset('Learn-German-Kuwait/js/all.min.js') }}"></script>
  <script src="{{ asset('Learn-German-Kuwait/js/main.js') }}"></script>

  @stack('js')

</body>

</html>