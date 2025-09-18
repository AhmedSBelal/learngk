@php
    use Carbon\Carbon;
@endphp
@extends('layouts.site1')
@section('title', 'LGK - ' . $course->name . ' - Enroll')
@section('og_title', 'LGK - ' . $course->name . ' - Enroll')
@section('seo_description', $course->seo_description)
@section('og_description', $course->seo_description)
@section('seo_keywords', $course->seo_keywords)
@section('content')

<div class="fixed-share d-none d-lg-block">
    <div class="d-flex flex-column align-items-center gap-2">
      <h6 class="m-0">{{ trans('website.global.share') }}</h6>
      <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank">
        <i class="fa-brands share-icon hovers fa-facebook-f"></i>
      </a>
      <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" target="_blank">
        <i class="fa-brands share-icon hovers fa-twitter"></i>
      </a>
      <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank">
        <i class="fa-brands share-icon hovers fa-linkedin-in"></i>
      </a>
      <a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank">
        <i class="fa-brands share-icon hovers fa-whatsapp"></i>
      </a>
      <h6 class="m-0">{{ trans('website.global.follow_us') }}</h6>
      <a href="{{ settingText('facebook', 'text') }}"><i class="fa-brands share-icon hovers fa-facebook-f"></i></a>
      <a href="{{ settingText('twitter', 'text') }}"><i class="fa-brands share-icon hovers fa-twitter"></i></a>
      <a href="{{ settingText('linkedin', 'text') }}"><i class="fa-brands share-icon hovers fa-linkedin-in"></i></a>
      <a href="{{ settingText('instagram', 'text') }}"><i class="fa-brands share-icon hovers fa-instagram"></i></a>
      <a href="{{ settingText('whatsapp', 'text') }}"><i class="fa-brands share-icon hovers fa-whatsapp"></i></a>
    </div>
  </div>

    <section>
        <div class="container-fluid mt-4 px-md-5">

            <div class="row">
                <div class="col-12">
                    <div class="p-3 course-information rounded-4 h-100">
                        <div class="cards-long row">
                            <div class="col-md-5 mb-3">
                                <img src="{{ $course->image->url }}" class="img-fluid rounded-3 w-100"
                                    style="max-height: 350px;" alt="course-img">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body px-0">
                                    <h5 class="card-title why-text">
                                        {{ $course->months }}
                                        {{ $course->course_level->name }}
                                    </h5>
                                    <p class="apply-text">
                                        {{ $course->translations->first()->short_description }}
                                    </p>

                                    <div class="d-flex gap-3 align-items-center mt-3 pb-4"
                                        style="border-bottom:5px solid #FDAF0433 ;">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-solid fa-calendar-days primary-color"></i>
                                            @php
                                                $date = Carbon::parse($course->start_date);
                                                Carbon::setLocale(app()->getLocale());
                                                if (app()->getLocale() === 'ar') {
                                                    $monthName = $date->translatedFormat('F');
                                                    $formattedDate = $date->format('d') . '-' . $monthName;
                                                } else {
                                                    $formattedDate = $date->format('F-d');
                                                }
                                            @endphp
                                            <h4 class="card-text m-0">{{ $formattedDate }}</h4>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-solid fa-clock primary-color"></i>
                                            <h4 class="card-text m-0">
                                                {{ Carbon::createFromFormat('H:i:s', $course->from)->format('h:i A') }}
                                            </h4>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="fa-solid fa-hourglass-half primary-color"></i>
                                            <h4 class="card-text m-0">{{ $course->duration }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end enroll mb-4">{{ trans('website.course_enroll.enroll_now') }}</div>

            <div class="row">

                <div class="col-md-8">

                    <form action="{{ route('courses.enroll.store', $course->slug) }}" method="post" class="row">
                        @csrf
                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.course_enroll.first_name_label') }}</p>
                                <input type="text" class="form-control py-2" name="name"
                                    placeholder="{{ trans('website.global.name') }}" value="{{ old('name', '') }}" required>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.course_enroll.last_name_label') }}</p>
                                <input type="text" class="form-control py-2" name="family_name"
                                    placeholder="{{ trans('website.global.family_name') }}"
                                    value="{{ old('family_name', '') }}" required>
                                @error('family_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.course_enroll.email_label') }}</p>
                                <input type="email" class="form-control py-2" name="email"
                                    placeholder="{{ trans('website.global.email') }}" value="{{ old('email', '') }}"
                                    required>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.course_enroll.address_label') }}</p>
                                <input type="text" name="address" class="form-control py-2"
                                    placeholder="{{ trans('website.global.address') }}" value="{{ old('address', '') }}"
                                    required>
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3 position-relative">
                                <p class="form-label m-0">{{ trans('website.course_enroll.birthdate_label') }}</p>
                                <input type="date" class="form-control py-2" name="birthdate"
                                    placeholder="{{ trans('website.global.birthdate') }}" value="{{ old('birthdate', '') }}"
                                    onfocus="(this.type='date')" required>
                                @error('birthdate')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.course_enroll.age_label') }}</p>
                                <input type="number" class="form-control py-2" name="age"
                                    placeholder="{{ trans('website.global.age') }}" value="{{ old('age', '') }}" required>
                                @error('age')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.course_enroll.gender_label') }}</p>
                                <select class="form-select py-2" name="gender" required>
                                    <option value="" disabled {{ old('gender') == '' ? 'selected' : '' }}>
                                        {{ trans('website.global.gender') }}
                                    </option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                        {{ trans('website.global.male') }}
                                    </option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                        {{ trans('website.global.female') }}
                                    </option>
                                </select>
                                @error('gender')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.course_enroll.id_card_label') }}</p>
                                <input type="text" class="form-control py-2" name="id_card"
                                    placeholder="{{ trans('website.global.id_card') }}" value="{{ old('id_card', '') }}"
                                    required>
                                @error('id_card')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.course_enroll.nationality_label') }}</p>
                                <select class="form-select py-2" name="nationality" required>
                                    <option value="" disabled {{ old('nationality') == '' ? 'selected' : '' }}>
                                        {{ trans('website.global.nationality') }}
                                    </option>
                                    <option value="مصر" {{ old('nationality') == 'مصر' ? 'selected' : '' }}>
                                        {{ trans('website.course_enroll.egypt') }}
                                    </option>
                                    <option value="الكويت" {{ old('nationality') == 'الكويت' ? 'selected' : '' }}>
                                        {{ trans('website.course_enroll.kuwait') }}
                                    </option>
                                </select>
                                @error('nationality')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.course_enroll.phone_label') }}</p>
                                <input type="text" class="form-control py-2" name="phone"
                                    placeholder="{{ trans('website.global.phone') }}" value="{{ old('phone', '') }}"
                                    required>
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.course_enroll.degree_label') }}</p>
                                <input type="text" class="form-control py-2" name="degree"
                                    placeholder="{{ trans('website.global.degree') }}" value="{{ old('degree', '') }}"
                                    required>
                                @error('degree')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.course_enroll.parent_phone_label') }}</p>
                                <input type="text" class="form-control py-2" name="parent_phone"
                                    placeholder="{{ trans('website.global.parent_phone') }}"
                                    value="{{ old('parent_phone', '') }}" required>
                                @error('parent_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.course_enroll.job_label') }}</p>
                                <select class="form-select py-2" name="job" required>
                                    <option value="" disabled {{ old('job') == '' ? 'selected' : '' }}>
                                        {{ trans('website.global.job') }}
                                    </option>
                                    <option value="طالب" {{ old('job') == 'طالب' ? 'selected' : '' }}>
                                        {{ trans('website.course_enroll.student') }}
                                    </option>
                                    <option value="معلم" {{ old('job') == 'معلم' ? 'selected' : '' }}>
                                        {{ trans('website.course_enroll.teacher') }}
                                    </option>
                                </select>
                                @error('job')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3 position-relative">
                                <p class="form-label m-0">{{ trans('website.course_enroll.course_start_label') }}</p>
                                <input type="date" class="form-control py-2" name="course_start"
                                    placeholder="{{ trans('website.global.course_start') }}"
                                    value="{{ old('course_start', '') }}" onfocus="(this.type='date')" required>
                                @error('course_start')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-column gap-1 mb-3 position-relative">
                                <p class="form-label m-0">{{ trans('website.course_enroll.course_end_label') }}</p>
                                <input type="date" class="form-control py-2" name="course_end"
                                    placeholder="{{ trans('website.global.course_end') }}"
                                    value="{{ old('course_end', '') }}" onfocus="(this.type='date')" required>
                                @error('course_end')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex flex-column gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.course_enroll.knowledge_label') }}</p>
                                <select class="form-select py-2" name="knowledge" required>
                                    <option value="" disabled {{ old('knowledge') == '' ? 'selected' : '' }}>
                                        {{ trans('website.global.knowledge') }}
                                    </option>
                                    <option value="لا" {{ old('knowledge') == 'لا' ? 'selected' : '' }}>
                                        {{ trans('website.course_enroll.no') }}
                                    </option>
                                    <option value="نعم" {{ old('knowledge') == 'نعم' ? 'selected' : '' }}>
                                        {{ trans('website.course_enroll.yes') }}
                                    </option>
                                </select>
                                @error('knowledge')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="d-flex flex-column gap-1 mb-3">
                                <p class="form-label m-0">{{ trans('website.course_enroll.reach_us_label') }}</p>
                                <select class="form-select py-2" name="reach_us" required>
                                    <option value="" disabled {{ old('reach_us') == '' ? 'selected' : '' }}>
                                        {{ trans('website.global.reach_us') }}
                                    </option>
                                    <option value="facebook" {{ old('reach_us') == 'facebook' ? 'selected' : '' }}>
                                        {{ trans('website.global.facebook') }}
                                    </option>
                                    <option value="instagram" {{ old('reach_us') == 'instagram' ? 'selected' : '' }}>
                                        {{ trans('website.global.instagram') }}
                                    </option>
                                    <option value="website" {{ old('reach_us') == 'website' ? 'selected' : '' }}>
                                        {{ trans('website.global.website') }}
                                    </option>
                                    <option value="other" {{ old('reach_us') == 'other' ? 'selected' : '' }}>
                                        {{ trans('website.global.other') }}
                                    </option>
                                    <option value="friend" {{ old('reach_us') == 'friend' ? 'selected' : '' }}>
                                        {{ trans('website.global.friends') }}
                                    </option>
                                </select>
                                @error('reach_us')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 my-3">
                            <div class="form-check d-flex gap-4 mb-2">
                                <input class="form-check-input" name="terms_agreement" type="checkbox" id="terms_agreement"
                                    value="1" {{ old('terms_agreement', 0) == true ? 'checked' : '' }}>
                                <label class="form-check-label apply-text me-2" for="terms_agreement">
                                    {{ trans('website.course_enroll.terms_agreement_label') }}
                                </label>
                                @error('terms_agreement')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <input type="hidden" name="affiliation_term" id="hidden_affiliation_term" value="0">
                                <input type="hidden" name="withdrawal_term" id="hidden_withdrawal_term" value="0">
                                <input type="hidden" name="contract" id="hidden_contract" value="0">
                            </div>

                            <div class="primary-color text-decoration-underline apply-text hovers mb-2"
                                data-bs-toggle="modal" data-bs-target="#detailsModal">
                                {{ trans('website.course_enroll.policy_link') }}
                            </div>
                        </div>

                        <div class="modal fade" id="detailsModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content p-md-5 p-3">
                                    <div class="d-flex justify-content-between align-items-center pb-4 mb-4"
                                        style="border-bottom:2px solid #FDAF0466 !important;">
                                        <h3 class="m-0 pop-up-main-title">
                                            {{ trans('website.course_enroll.terms_and_conditions_title') }}
                                        </h3>
                                        <i class="fa-regular fa-circle-xmark fa-2x hovers" data-bs-dismiss="modal"></i>
                                    </div>
                                    <div class="modal-body p-0">
                                        <div class="mb-4" style="border-bottom:2px solid #FDAF0466 !important;">
                                            <h4 class="mb-3 pop-up-main-title">
                                                {{ trans('website.course_enroll.affiliation_terms_title') }}
                                            </h4>
                                            <div class="mb-4">
                                                {!! settingText('enroll-affiliation-term', 'long_description') !!}
                                            </div>
                                        </div>

                                        <div class="mb-4" style="border-bottom:2px solid #FDAF0466 !important;">
                                            <h4 class="mb-3 pop-up-main-title">
                                                {{ trans('website.course_enroll.withdrawal_terms_title') }}
                                            </h4>
                                            <div class="mb-4">
                                                {!! settingText('enroll-withdrawal-term', 'long_description') !!}
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <h4 class="mb-3 pop-up-main-title">
                                                {{ trans('website.course_enroll.contract_title') }}
                                            </h4>
                                            <div class="mb-4">
                                                {!! settingText('enroll-contract', 'long_description') !!}
                                            </div>
                                        </div>

                                        <div class="primary-btn w-100 text-center my-3 py-3 px-4 rounded-3 text-decoration-none hovers"
                                            data-bs-dismiss="modal">
                                            {{ trans('website.course_enroll.agree_all_terms') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                            class="primary-btn w-100 text-center my-3 py-3 px-4 rounded-3 text-decoration-none">
                            {{ trans('website.course_enroll.submit_button') }}
                        </button>
                    </form>

                </div>

                <div class="col-md-4 mb-3">
                    <div class="course-information py-2 px-4 rounded-3">
                        <h3 class="pop-up-filter-main-title py-3 border-bottom m-0">
                            {{ trans('website.home.course_details') }}
                        </h3>
                        <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                            <i class="fa-solid fa-chart-simple primary-color"></i>
                            <h6 class="course-information-label m-0">{{ trans('website.course_enroll.level_label') }}</h6>
                            <h6 class="pop-up-filter-sub-title m-0">{{ $course->course_level->name }}</h6>
                        </div>
                        <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                            <i class="fa-solid fa-circle-play primary-color"></i>
                            <h6 class="course-information-label m-0">
                                {{ trans('website.course_enroll.course_details_start_label') }}</h6>
                            @php
                                $startDate = Carbon::parse($course->start_date);
                                $formattedStartDate = app()->getLocale() === 'ar' ? $startDate->translatedFormat('d F Y') :
                                    $startDate->format('d F Y');
                            @endphp
                            <h6 class="pop-up-filter-sub-title m-0">{{ $formattedStartDate }}</h6>
                        </div>
                        <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                            <i class="fa-solid fa-circle-pause primary-color"></i>
                            <h6 class="course-information-label m-0">
                                {{ trans('website.course_enroll.course_details_end_label') }}</h6>
                            @php
                                $endDate = Carbon::parse($course->end_date);
                                $formattedEndDate = app()->getLocale() === 'ar' ? $endDate->translatedFormat('d F Y') :
                                    $endDate->format('d F Y');
                            @endphp
                            <h6 class="pop-up-filter-sub-title m-0">{{ $formattedEndDate }}</h6>
                        </div>
                        <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                            <i class="fa-solid fa-location-dot primary-color"></i>
                            <h6 class="course-information-label m-0">{{ trans('website.course_enroll.type_label') }}</h6>
                            <h6 class="pop-up-filter-sub-title m-0">
                                {{ trans('website.home.course_types.' . $course->course_attend_type) }}
                            </h6>
                        </div>
                        <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                            <i class="fa-solid fa-hourglass-half primary-color"></i>
                            <h6 class="course-information-label m-0">{{ trans('website.course_enroll.days_label') }}</h6>
                            <h6 class="pop-up-filter-sub-title m-0">{{ $course->duration }}</h6>
                        </div>
                        <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                            <i class="fa-solid fa-book primary-color"></i>
                            <h6 class="course-information-label m-0">{{ trans('website.course_enroll.course_book_label') }}
                            </h6>
                            <h6 class="pop-up-filter-sub-title m-0">
                                {{ $course->course_book ?? trans('website.home.not_specified') }}
                            </h6>
                        </div>
                        <div class="d-flex align-items-center gap-2 py-3 border-bottom">
                            <i class="fa-solid fa-pencil primary-color"></i>
                            <h6 class="course-information-label m-0">{{ trans('website.course_enroll.participants_label') }}
                            </h6>
                            <h6 class="pop-up-filter-sub-title m-0">{{ $course->participant }}</h6>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mainCheckbox = document.getElementById('terms_agreement');
            const hiddenAffiliation = document.getElementById('hidden_affiliation_term');
            const hiddenWithdrawal = document.getElementById('hidden_withdrawal_term');
            const hiddenContract = document.getElementById('hidden_contract');

            mainCheckbox.addEventListener('change', function () {
                if (this.checked) {
                    hiddenAffiliation.value = '1';
                    hiddenWithdrawal.value = '1';
                    hiddenContract.value = '1';
                } else {
                    hiddenAffiliation.value = '0';
                    hiddenWithdrawal.value = '0';
                    hiddenContract.value = '0';
                }
            });

            if ({{ old('affiliation_term', 0) == 1 && old('withdrawal_term', 0) == 1 && old('contract', 0) == 1 ? 'true' : 'false' }}) {
                mainCheckbox.checked = true;
                hiddenAffiliation.value = '1';
                hiddenWithdrawal.value = '1';
                hiddenContract.value = '1';
            }
        });
    </script>
@endpush