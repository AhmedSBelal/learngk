@extends('layouts.site1')
@section('title', 'Learn German Kuwait - Reviews')
@section('og_title', 'Learn German Kuwait - Reviews')
@section('seo_description', settingText('review_seo_description', 'short_description'))
@section('og_description', settingText('review_seo_description', 'short_description'))
@section('seo_keywords', settingText('review_seo_keywords', 'short_description'))
@section('content')



    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.home.review') }}</h1>
    </header>

    @if($reviews->count() > 0)
        <section>
            <div class="container-fluid px-md-5 my-5">
                <div class="row">

                    @forelse($reviews as $review)

                        <div class="col-lg-4 mb-3">
                            <div class="card p-3 rounded-4 comments-card course-information h-100">
                                <img src="{{ asset('Learn-German-Kuwait/img/quote.png') }}" class="quote-img mb-md-5" alt="quote-img" />
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ $review->review }}
                                    </h5>
                                    <div class="d-flex gap-2 align-items-center mt-3">
                                        <img src="{{ $review->image->url ?? settingImage('logo') }}" class="student" alt="{{ $review->name }}" />
                                        <div>
                                            <h4 class="student-name m-0">{{ $review->name }}</h4>
                                            <h4 class="student-role m-0 mt-1">{{ trans('website.home.review_role') }}</h4>
                                        </div>
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