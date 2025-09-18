@extends('layouts.site1')
@section('title', 'LGK - Offered Jobs')
@section('og_title', 'LGK - Offered Jobs')
@section('seo_description', settingText('job_seo_description', 'short_description'))
@section('og_description', settingText('job_seo_description', 'short_description'))
@section('seo_keywords', settingText('job_seo_keywords', 'short_description'))
@section('content')

    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.footer.job') }}</h1>
    </header>

    <section>
        <div class="container-fluid px-md-5 my-5">
            <div class="row justify-content-center">


                @forelse($jobs as $job)
                    <div class="col-md-4 mb-3">
                        <div class="p-4 border-0 rounded-4 course-information">
                            <div class="card-body d-flex flex-column gap-3">
                                <!-- أيقونة الوظيفة -->
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fa-solid fa-briefcase fa-2x primary-color"></i>
                                    <h4 class="card-title m-0">{{ $job->name }}</h4>
                                </div>
                                <!-- وصف مختصر -->
                                <p class="card-text text-muted">
                                    @php
                                    $description = strip_tags($job->description);
                                    @endphp
                                    {{ Str::limit($description, 100, '...') }}
                                </p>
                                <h6 class="why-icon mb-0">{{ \Carbon\Carbon::make($job->updated_at)->format('d M, Y') }}</h6>
                                <!-- زر التقديم -->
                                <div class="d-flex mt-3">
                                    <a href="{{ route('jobs.show', $job->slug) }}"
                                        class="primary-btn py-2 px-3 rounded-3 d-flex align-items-center gap-1">
                                        {{ trans('website.jobs.apply_now') }} <i class="fa-solid fa-arrow-left ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </section>

@endsection