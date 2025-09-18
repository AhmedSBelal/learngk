@extends('layouts.site1')
@section('title', 'Learn German Kuwait - Terms of service')
@section('og_title', 'Learn German Kuwait - Terms of service')
@section('seo_description', settingText('privacy_seo_description', 'short_description'))
@section('og_description', settingText('privacy_seo_description', 'short_description'))
@section('seo_keywords', settingText('privacy_seo_keywords', 'short_description'))
@section('content')

    {{-- <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.footer.terms') }}</h1>
    </header>

    <section>
        <div class="container-fluid py-5 px-md-5">
            {!! settingText('terms-page', 'long_description') !!}
        </div>
    </section> --}}


    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.terms.header_title') }}</h1>
    </header>

    <section>
        <div class="container-fluid py-5 px-md-5">
            <h5 class="m-0 faq-main-title">{{ trans('website.terms.main_title') }}</h5>
            <p class="m-0 mt-3 faq-sub-title">{{ trans('website.terms.main_description') }}</p>
            <p class="m-0 mt-3 faq-sub-title">{{ trans('website.terms.usage_conditions') }}</p>
            <h5 class="mt-5 faq-main-title">{{ trans('website.terms.additional_terms_title') }}</h5>
            <p class="m-0 mt-3 faq-sub-title">{{ trans('website.terms.course_approval_description') }}</p>
            <p class="m-0 mt-3 faq-sub-title">{{ trans('website.terms.content_usage_description') }}</p>
            <p class="m-0 mt-3 faq-sub-title">{{ trans('website.terms.age_requirement_description') }}</p>
            <p class="m-0 mt-3 faq-sub-title">{{ trans('website.terms.registration_requirements_description') }}</p>
            <h5 class="mt-5 faq-main-title">{{ trans('website.terms.responsibility_title') }}</h5>
            <p class="m-0 mt-3 faq-sub-title">{{ trans('website.terms.responsibility_description') }}</p>
        </div>
    </section>



@endsection