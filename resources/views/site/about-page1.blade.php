@extends('layouts.site1')
@section('title', 'Learn German Kuwait - Why LGK')
@section('og_title', 'Learn German Kuwait - Why LGK')
@section('seo_description', settingText('about_seo_description', 'short_description'))
@section('og_description', settingText('about_seo_description', 'short_description'))
@section('seo_keywords', settingText('about_seo_keywords', 'short_description'))
@section('content')



    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">لماذا LGK</h1>
    </header>

    <section>
        <div class="container-fluid mt-4 px-md-5">
            <h2 class="why-main-text-2 mb-4">@lang('website.about.Our-educational-approach')</h2>

            <!--====== About Start ======-->
            @foreach(['one', 'two', 'three', 'four', 'five', 'six', 'seven'] as $section)
                @if(settingText("about-section-{$section}", 'long_description'))
                    <div class="card p-3 mb-4 rounded-4 why-card">
                        <div
                            class="d-flex justify-content-md-between align-items-center flex-md-nowrap flex-wrap justify-content-center gap-4 flex-row-reverse flex-column-reverse flex-md-row">
                            <div>
                                <h3 class="student-name fw-bold">{{ settingText("about-section-{$section}", 'text') }}</h3>
                                <h4 class="m-0 student-name">
                                    {!! settingText("about-section-{$section}", 'long_description') !!}
                                </h4>
                            </div>
                            @php
                                // Retrieve media collection and extract URLs
                                $mediaItems = settingMultiple("about-section-{$section}");
                                $imageUrls = $mediaItems->map(function ($media) {
                                    return $media->getUrl(); // or $media->url if you prefer
                                })->toArray();
                                $imagesJson = json_encode($imageUrls);
                            @endphp
                            <img src="{{ settingImage("about-section-{$section}") }}" class="why-lgk-img slider-img"
                                data-images='{{ $imagesJson }}' alt="{{ settingText("about-section-{$section}", 'text') }}">
                        </div>
                    </div>
                @endif
            @endforeach
            <!--====== About Ends ======-->

        </div>
    </section>

    <section>
        <div class="container-fluid my-5 px-md-5">
            <h2 class="why-main-text-2 mb-4">@lang('website.about.success-stories')</h2>
            <div class="row mt-2">
                @foreach(['one', 'two', 'three'] as $story)
                    @if(settingText("success-story-{$story}", 'long_description'))
                        <div class="col-lg-4 mb-3">
                            <div class="card p-3 rounded-4 article-card course-information h-100">
                                <div class="position-relative">
                                    <img src="{{ settingImage("success-story-{$story}") }}" class="child-img rounded-3 w-100"
                                        alt="course-img">
                                </div>
                                <div class="card-body px-0">
                                    <h5 class="student-name mb-2">{{ settingText("success-story-{$story}", 'text') }}</h5>
                                    <p class="why-sub-title mb-0">
                                        {!! settingText("success-story-{$story}", 'long_description') !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>



@endsection

@push('js')
<script>
       /* images slider  */
      
        document.addEventListener("DOMContentLoaded", function () {
            const sliders = document.querySelectorAll(".slider-img");

            sliders.forEach(slider => {
                const images = JSON.parse(slider.getAttribute("data-images")); // الصور الخاصة بكل slider
                let index = 0;

                setInterval(() => {
                    slider.classList.add("fade-out");
                    setTimeout(() => {
                        index = (index + 1) % images.length;
                        slider.src = images[index];
                        slider.classList.remove("fade-out");
                    }, 300);
                }, 3000);
            });
        });
    </script>
@endpush