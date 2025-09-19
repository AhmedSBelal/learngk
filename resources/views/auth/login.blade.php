@extends('layouts.auth')
@section('title', trans('website.login.page_title'))
@section('og_title', trans('website.login.page_title'))
@section('seo_description', settingText('login_seo_description', 'short_description'))
@section('og_description', settingText('login_seo_description', 'short_description'))
@section('seo_keywords', settingText('login_seo_keywords', 'short_description'))
@section('content')

    <section>
      <div class="container-fluid">
        <div class="row py-3 align-items-center min-vh-100">
          <div class="col-md-6 px-md-5">
            <div class="rounded-5" style="background-color:#F9F9F9 ;">
              <form action="{{ route('login') }}" method="post" class="d-flex flex-column align-items-center">
                @csrf
                <img src="{{ settingImage('logo') }}" style="height: 90px; width: 100px" alt="{{ trans('website.login.logo_alt') }}"/>
                <h3 class="login-main-title my-3">{{ trans('website.login.welcome_back') }}</h3>
                <p class="login-sub-title mb-4">{{ trans('website.login.subtitle') }}</p>
                <div class="d-flex flex-column w-80-100 gap-1 mb-3">
                  <p class="form-label m-0">{{ trans('website.login.email_label') }}</p>
                  <input name="email" type="email" class="form-control py-2" placeholder="{{ trans('website.login.email_placeholder') }}">
                  @error('email')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="d-flex flex-column w-80-100 gap-1 mb-4 position-relative">
                  <p class="form-label m-0">{{ trans('website.login.password_label') }}</p>
                  <input 
                    name="password"
                    type="password" 
                    id="password-input"
                    class="form-control py-2" 
                    placeholder="{{ trans('website.login.password_placeholder') }}">
                  @error('password')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <!-- Eye icon -->
                  <span class="material-icons position-absolute top-50 toggle-password hovers" 
                        id="togglePassword" >
                    visibility
                  </span>
                </div>
                <button
                  type="submit"
                  class="primary-btn text-center w-80-100 py-2 rounded-3 text-decoration-none">
                  {{ trans('website.login.submit_button') }}
                </button>
              </form>
              <div class="separator w-50 mx-auto my-5">
                <span>{{ trans('website.login.or_via') }}</span>
              </div>
              <div class="d-flex gap-2 justify-content-center">
                <a href="{{ route('social-login', 'google') }}">
                  <img src="{{ asset('Learn-German-Kuwait/img/google-svgrepo-com.png') }}" alt="{{ trans('website.login.google_alt') }}">
                </a>
                <a href="{{ route('social-login', 'facebook') }}">
                  <img src="{{ asset('Learn-German-Kuwait/img/facebook-svgrepo-com.png') }}" alt="{{ trans('website.login.facebook_alt') }}">
                </a>
              </div>
              <div class="d-flex gap-1 mt-4 justify-content-center">
                <h6 class="have-account m-0">{{ trans('website.login.no_account') }}</h6>
                <h6 class="have-account m-0">
                  <a href="{{ route('register') }}" class="primary-color">{{ trans('website.login.create_account') }}</a>
                </h6>
              </div>
            </div>
          </div>
          <div class="col-md-6 h-100">
            <?php
                $loginImages = [];
                for ($i = 1; $i <= 10; $i++) {
                    $image = settingImage('login_image_' . $i);
                    if (!$image) {
                        break;
                    }
                    $loginImages[] = $image;
                }
            ?>
            <img src="{{ $loginImages[0] }}" id="why-slider" class="img-fluid w-100 rounded-3 login-img" alt="{{ trans('website.login.slider_image_alt') }}">
          </div>
        </div>
      </div>
    </section>

@endsection

@push('js')
<script>
document.addEventListener("DOMContentLoaded", function () {
  const slider = document.getElementById("why-slider");
  if (slider) {
    const images = @json($loginImages);
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

  const togglePassword = document.getElementById("togglePassword");
  const passwordInput = document.getElementById("password-input");
  if (togglePassword && passwordInput) {
    // Adjust eye icon position based on document direction
    const isRtl = document.documentElement.getAttribute('dir') === 'rtl';
    togglePassword.classList.add(isRtl ? 'start-0' : 'end-0');
    togglePassword.classList.add(isRtl ? 'ms-3' : 'me-3');

    // togglePassword.addEventListener("click", function () {
    // //getAttribute
    //   const type = passwordInput.type === "password" ? "text" : "password";
    //   passwordInput.type = type;
    //   this.textContent = type === "password" ? "visibility" : "visibility_off";
    // });
    togglePassword.addEventListener("click", () => {
      const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute(type, "type");
      togglePassword.textContent = type === "password" ? "visibility" : "visibility_off";
  });
  }
});
</script>
@endpush