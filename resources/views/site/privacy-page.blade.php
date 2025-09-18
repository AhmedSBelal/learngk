@extends('layouts.site1')
@section('title', 'Learn German Kuwait - Privacy - policy')
@section('og_title', 'Learn German Kuwait - Privacy - policy')
@section('seo_description', settingText('privacy_seo_description', 'short_description'))
@section('og_description', settingText('privacy_seo_description', 'short_description'))
@section('seo_keywords', settingText('privacy_seo_keywords', 'short_description'))
@section('content')


    {{-- <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.footer.privacy') }}</h1>
    </header>

    <section>
        <div class="container-fluid py-5 px-md-5">
            {!! settingText('privacy-page', 'long_description') !!}
        </div>
    </section> --}}


    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.privacy.header_title') }}</h1>
    </header>

    <section>
        <div class="container-fluid py-5 px-md-5">
            <h5 class="m-0 faq-main-title">{{ trans('website.privacy.main_title') }}</h5>
            <p class="m-0 mt-3 faq-sub-title">{{ trans('website.privacy.main_description') }}</p>
            <h5 class="mt-5 faq-main-title">{{ trans('website.privacy.browsing_title') }}</h5>
            <p class="m-0 mt-3 faq-sub-title">{{ trans('website.privacy.browsing_description') }}</p>
            <h5 class="mt-5 faq-main-title">{{ trans('website.privacy.ip_address_title') }}</h5>
            <p class="m-0 mt-3 faq-sub-title">{{ trans('website.privacy.ip_address_description') }}</p>
            <h5 class="mt-5 faq-main-title">{{ trans('website.privacy.network_scanning_title') }}</h5>
            <p class="m-0 mt-3 faq-sub-title">{{ trans('website.privacy.network_scanning_description') }}</p>
            <h5 class="mt-5 faq-main-title">{{ trans('website.privacy.external_links_title') }}</h5>
            <p class="m-0 mt-3 faq-sub-title">{{ trans('website.privacy.external_links_description') }}</p>
            <p class="m-0 mt-3 faq-sub-title">{{ trans('website.privacy.advertising_description') }}</p>
            <h5 class="mt-5 faq-main-title">{{ trans('website.privacy.disclosure_title') }}</h5>
            <p class="m-0 mt-3 faq-sub-title">{{ trans('website.privacy.disclosure_description') }}</p>
        </div>
    </section>



@endsection