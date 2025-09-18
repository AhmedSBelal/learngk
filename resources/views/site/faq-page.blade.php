@extends('layouts.site1')
@section('title', 'Learn German Kuwait - FAQS')
@section('og_title', 'Learn German Kuwait - FAQS')
@section('seo_description', settingText('faq_seo_description', 'short_description'))
@section('og_description', settingText('faq_seo_description', 'short_description'))
@section('seo_keywords', settingText('faq_seo_keywords', 'short_description'))
@section('content')

    <header class="second-header py-5">
        <h1 class="second-header-title text-white text-center m-0">{{ trans('website.global.faq-desc') }} </h1>
    </header>

    {{-- <section>
        <div class="container-fluid px-md-5">

            <div class="d-flex justify-content-center flex-wrap py-5 gap-3">
            </div>

            <div class="courses-questations" id="courses-questations">

                @forelse($faqs as $index => $item)
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        href="#part{{ $index }}" role="button" aria-expanded="false" aria-controls="part1">
                        <h5 class="m-0 faq-main-title">{{$item->question}}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part{{ $index }}">
                        <p class="m-0 mt-3 faq-sub-title">
                            {!! $item->answer !!}
                        </p>
                    </div>
                </div>
                @empty
                @endforelse

            </div>


        </div>
    </section> --}}

    <section>
        <div class="container-fluid px-md-5">

            <div class="d-flex justify-content-center flex-wrap py-5 gap-3">
                <div class="faq-box rounded-3 active">
                    <div class="d-flex flex-column h-100 gap-3 justify-content-center h-100 align-items-center">
                        <i class="fa-solid fa-book faq-box-icon"></i>
                        <p class="m-0 faq-box-text">{{ trans('website.faq.courses_and_levels') }}</p>
                    </div>
                </div>
                <div class="faq-box rounded-3">
                    <div class="d-flex flex-column h-100 gap-3 justify-content-center h-100 align-items-center">
                        <i class="fa-solid fa-calendar-days faq-box-icon"></i>
                        <p class="m-0 faq-box-text">{{ trans('website.faq.schedule_and_registration') }}</p>
                    </div>
                </div>
                <div class="faq-box rounded-3">
                    <div class="d-flex flex-column h-100 gap-3 justify-content-center h-100 align-items-center">
                        <i class="fa-solid fa-dollar faq-box-icon"></i>
                        <p class="m-0 faq-box-text">{{ trans('website.faq.payment_and_services') }}</p>
                    </div>
                </div>
                <div class="faq-box rounded-3">
                    <div class="d-flex flex-column h-100 gap-3 justify-content-center h-100 align-items-center">
                        <i class="fa-solid fa-users faq-box-icon"></i>
                        <p class="m-0 faq-box-text">{{ trans('website.faq.teaching_method') }}</p>
                    </div>
                </div>
            </div>

            <div class="courses-questations" id="courses-questations">
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part1"
                        role="button" aria-expanded="false" aria-controls="part1">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.lgk_team_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part1">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.lgk_team_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part2"
                        role="button" aria-expanded="false" aria-controls="part2">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.german_levels_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part2">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.german_levels_intro') }}</p>
                        <p class="mt-3 mb-0 faq-small-title">{{ trans('website.faq.level_a1_title') }}</p>
                        <p class="mt-3 mb-0 faq-description">{{ trans('website.faq.level_a1_description') }}</p>
                        <p class="mt-3 mb-0 faq-small-title">{{ trans('website.faq.level_a2_title') }}</p>
                        <p class="mt-3 mb-0 faq-description">{{ trans('website.faq.level_a2_description') }}</p>
                        <p class="mt-3 mb-0 faq-small-title">{{ trans('website.faq.level_b1_title') }}</p>
                        <p class="mt-3 mb-0 faq-description">{{ trans('website.faq.level_b1_description') }}</p>
                        <p class="mt-3 mb-0 faq-small-title">{{ trans('website.faq.level_b2_title') }}</p>
                        <p class="mt-3 mb-0 faq-description">{{ trans('website.faq.level_b2_description') }}</p>
                        <p class="mt-3 mb-0 faq-small-title">{{ trans('website.faq.level_c1_title') }}</p>
                        <p class="mt-3 mb-0 faq-description">{{ trans('website.faq.level_c1_description') }}</p>
                        <p class="mt-3 mb-0 faq-small-title">{{ trans('website.faq.level_c2_title') }}</p>
                        <p class="mt-3 mb-0 faq-description">{{ trans('website.faq.level_c2_description') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part3"
                        role="button" aria-expanded="false" aria-controls="part3">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.learning_duration_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part3">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.learning_duration_answer') }}</p>
                        <table class="pop-up-table border-table-2 w-100 text-center mt-4">
                            <thead>
                                <tr>
                                    <th>{{ trans('website.faq.table_level') }}</th>
                                    <th>{{ trans('website.faq.table_duration') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>A1</td>
                                    <td>{{ trans('website.faq.duration_a1') }}</td>
                                </tr>
                                <tr>
                                    <td>A2</td>
                                    <td>{{ trans('website.faq.duration_a2') }}</td>
                                </tr>
                                <tr>
                                    <td>B1</td>
                                    <td>{{ trans('website.faq.duration_b1') }}</td>
                                </tr>
                                <tr>
                                    <td>B2</td>
                                    <td>{{ trans('website.faq.duration_b2') }}</td>
                                </tr>
                                <tr>
                                    <td>C1</td>
                                    <td>{{ trans('website.faq.duration_c1') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part4"
                        role="button" aria-expanded="false" aria-controls="part4">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.course_schedule_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part4">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.course_schedule_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part5"
                        role="button" aria-expanded="false" aria-controls="part5">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.lecture_timing_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part5">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.lecture_timing_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part6"
                        role="button" aria-expanded="false" aria-controls="part6">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.morning_courses_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part6">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.morning_courses_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part7"
                        role="button" aria-expanded="false" aria-controls="part7">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.kids_courses_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part7">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.kids_courses_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part8"
                        role="button" aria-expanded="false" aria-controls="part8">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.course_location_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part8">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.course_location_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part9"
                        role="button" aria-expanded="false" aria-controls="part9">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.level_assessment_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part9">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.level_assessment_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part10"
                        role="button" aria-expanded="false" aria-controls="part10">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.online_vs_offline_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part10">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.online_vs_offline_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part11"
                        role="button" aria-expanded="false" aria-controls="part11">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.other_branches_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part11">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.other_branches_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part12"
                        role="button" aria-expanded="false" aria-controls="part12">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.online_courses_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part12">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.online_courses_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part13"
                        role="button" aria-expanded="false" aria-controls="part13">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.appropriate_age_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part13">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.appropriate_age_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part14"
                        role="button" aria-expanded="false" aria-controls="part14">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.study_germany_timing_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part14">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.study_germany_timing_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part15"
                        role="button" aria-expanded="false" aria-controls="part15">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.class_size_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part15">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.class_size_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part16"
                        role="button" aria-expanded="false" aria-controls="part16">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.schedule_conflict_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part16">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.schedule_conflict_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part17"
                        role="button" aria-expanded="false" aria-controls="part17">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.corporate_training_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part17">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.corporate_training_answer') }}</p>
                    </div>
                </div>
            </div>

            <div class="dates-questations d-none" id="dates-questations">
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part18"
                        role="button" aria-expanded="false" aria-controls="part18">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.working_hours_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part18">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.working_hours_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part19"
                        role="button" aria-expanded="false" aria-controls="part19">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.required_documents_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part19">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.required_documents_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part20"
                        role="button" aria-expanded="false" aria-controls="part20">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.course_booking_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part20">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.course_booking_answer_1') }}</p>
                        <p class="m-0 mt-2 faq-sub-title">{{ trans('website.faq.course_booking_answer_2') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part21"
                        role="button" aria-expanded="false" aria-controls="part21">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.registration_duration_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part21">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.registration_duration_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part22"
                        role="button" aria-expanded="false" aria-controls="part22">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.registration_deadline_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part22">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.registration_deadline_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part23"
                        role="button" aria-expanded="false" aria-controls="part23">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.advanced_level_registration_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part23">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.advanced_level_registration_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part24"
                        role="button" aria-expanded="false" aria-controls="part24">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.trial_class_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part24">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.trial_class_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part25"
                        role="button" aria-expanded="false" aria-controls="part25">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.next_level_progression_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part25">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.next_level_progression_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part26"
                        role="button" aria-expanded="false" aria-controls="part26">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.refund_policy_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part26">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.refund_policy_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part27"
                        role="button" aria-expanded="false" aria-controls="part27">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.consultation_appointment_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part27">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.consultation_appointment_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part28"
                        role="button" aria-expanded="false" aria-controls="part28">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.absence_limit_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part28">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.absence_limit_answer') }}</p>
                    </div>
                </div>
            </div>

            <div class="pay-questations d-none" id="pay-questations">
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part29"
                        role="button" aria-expanded="false" aria-controls="part29">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.payment_method_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part29">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.payment_method_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part30"
                        role="button" aria-expanded="false" aria-controls="part30">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.services_included_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part30">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.services_included_intro') }}</p>
                        <ul>
                            <li>
                                <p class="m-0 mt-3 faq-small-title">{{ trans('website.faq.level_test_service') }}</p>
                            </li>
                            <li>
                                <p class="m-0 mt-1 faq-small-title">{{ trans('website.faq.materials_service') }}</p>
                            </li>
                            <li>
                                <p class="m-0 mt-1 faq-small-title">{{ trans('website.faq.certificate_service') }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part31"
                        role="button" aria-expanded="false" aria-controls="part31">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.installment_payment_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part31">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.installment_payment_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part32"
                        role="button" aria-expanded="false" aria-controls="part32">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.additional_fees_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part32">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.additional_fees_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part33"
                        role="button" aria-expanded="false" aria-controls="part33">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.refund_policy_course_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part33">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.refund_policy_course_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part34"
                        role="button" aria-expanded="false" aria-controls="part34">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.discounts_offers_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part34">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.discounts_offers_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part35"
                        role="button" aria-expanded="false" aria-controls="part35">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.certificate_completion_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part35">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.certificate_completion_answer') }}</p>
                    </div>
                </div>
            </div>

            <div class="teaching-questations d-none" id="teaching-questations">
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part36"
                        role="button" aria-expanded="false" aria-controls="part36">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.teaching_methodology_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part36">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.teaching_methodology_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part37"
                        role="button" aria-expanded="false" aria-controls="part37">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.focus_skills_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part37">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.focus_skills_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part38"
                        role="button" aria-expanded="false" aria-controls="part38">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.specialized_teachers_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part38">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.specialized_teachers_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part39"
                        role="button" aria-expanded="false" aria-controls="part39">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.additional_materials_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part39">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.additional_materials_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part40"
                        role="button" aria-expanded="false" aria-controls="part40">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.interactive_activities_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part40">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.interactive_activities_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part41"
                        role="button" aria-expanded="false" aria-controls="part41">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.struggling_students_support_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part41">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.struggling_students_support_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part42"
                        role="button" aria-expanded="false" aria-controls="part42">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.textbooks_used_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part42">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.textbooks_used_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part43"
                        role="button" aria-expanded="false" aria-controls="part43">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.native_language_teachers_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part43">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.native_language_teachers_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part44"
                        role="button" aria-expanded="false" aria-controls="part44">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.course_language_used_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part44">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.course_language_used_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part45"
                        role="button" aria-expanded="false" aria-controls="part45">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.teacher_contact_outside_class_question') }}
                        </h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part45">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.teacher_contact_outside_class_answer') }}
                        </p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part46"
                        role="button" aria-expanded="false" aria-controls="part46">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.placement_test_availability_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part46">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.placement_test_availability_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part47"
                        role="button" aria-expanded="false" aria-controls="part47">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.interview_preparation_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part47">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.interview_preparation_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part48"
                        role="button" aria-expanded="false" aria-controls="part48">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.embassy_certificate_acceptance_question') }}
                        </h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part48">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.embassy_certificate_acceptance_answer') }}
                        </p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part49"
                        role="button" aria-expanded="false" aria-controls="part49">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.goethe_exam_registration_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part49">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.goethe_exam_registration_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part50"
                        role="button" aria-expanded="false" aria-controls="part50">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.level_exam_requirement_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part50">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.level_exam_requirement_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part51"
                        role="button" aria-expanded="false" aria-controls="part51">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.exam_preparation_training_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part51">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.exam_preparation_training_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part52"
                        role="button" aria-expanded="false" aria-controls="part52">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.goethe_exam_eligibility_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part52">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.goethe_exam_eligibility_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part53"
                        role="button" aria-expanded="false" aria-controls="part53">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.special_needs_exam_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part53">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.special_needs_exam_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part54"
                        role="button" aria-expanded="false" aria-controls="part54">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.exam_fees_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part54">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.exam_fees_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part55"
                        role="button" aria-expanded="false" aria-controls="part55">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.university_admission_exams_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part55">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.university_admission_exams_answer_part1') }}
                        </p>
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.university_admission_exams_answer_part2') }}
                            <br> <a href="www.sprachnachweis.de">www.sprachnachweis.de</a></p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part56"
                        role="button" aria-expanded="false" aria-controls="part56">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.exam_retake_limit_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part56">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.exam_retake_limit_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part57"
                        role="button" aria-expanded="false" aria-controls="part57">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.certificate_validity_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part57">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.certificate_validity_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part58"
                        role="button" aria-expanded="false" aria-controls="part58">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.lost_certificate_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part58">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.lost_certificate_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part59"
                        role="button" aria-expanded="false" aria-controls="part59">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.name_change_certificate_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part59">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.name_change_certificate_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part60"
                        role="button" aria-expanded="false" aria-controls="part60">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.exam_without_course_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part60">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.exam_without_course_answer') }}</p>
                    </div>
                </div>
                <div class="mb-4 course-information py-4 px-3">
                    <div class="d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#part61"
                        role="button" aria-expanded="false" aria-controls="part61">
                        <h5 class="m-0 faq-main-title">{{ trans('website.faq.cultural_events_question') }}</h5>
                        <p class="m-0"><i class="fa-solid fa-chevron-down faq-main-icon"></i></p>
                    </div>
                    <div class="collapse multi-collapse faq-collapse" id="part61">
                        <p class="m-0 mt-3 faq-sub-title">{{ trans('website.faq.cultural_events_answer') }}</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection