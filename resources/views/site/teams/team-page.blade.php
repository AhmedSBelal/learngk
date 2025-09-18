@extends('layouts.site1')
@section('title', 'LGK - Our Team')
@section('og_title', 'LGK - Our Team')
@section('seo_description', settingText('team_seo_description', 'short_description'))
@section('og_description', settingText('team_seo_description', 'short_description'))
@section('seo_keywords', settingText('team_seo_keywords', 'short_description'))
@section('content')

    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.home.team') }}</h1>
    </header>

    <section class="my-5 px-md-5">
        <div class="container-fluid">
            <div class="row mt-2">


                @forelse($teams as $team)


                    <div class="col-lg-4 mb-3">
                        <div class="card bg-white rounded-4 team-card h-100">
                            <div class="position-relative">
                                <img src="{{ $team->image->url }}" class="teacher-img rounded-3 w-100" alt="{{ $team->name }}" />
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


                @empty
                @endforelse

            </div>
        </div>
    </section>

@endsection