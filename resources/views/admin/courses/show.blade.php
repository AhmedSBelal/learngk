@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.course.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.courses.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.id') }}
                        </th>
                        <td>
                            {{ $course->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.name') }}
                        </th>
                        <td>
                            {{ $course->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.slug') }}
                        </th>
                        <td>
                            {{ $course->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.short_description') }}
                        </th>
                        <td>
                            {{ $course->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.description') }}
                        </th>
                        <td>
                            {!! $course->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.exam_link') }}
                        </th>
                        <td>
                            {{ $course->exam_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.type') }}
                        </th>
                        <td>
                            {{ \App\Models\Course::TYPE[$course->type] }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.course_type') }}
                        </th>
                        <td>
                            {{ $course->course_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.course_level') }}
                        </th>
                        <td>
                            {{ $course->course_level->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.image') }}
                        </th>
                        <td>
                            @if($course->image)
                                <a href="{{ $course->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $course->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.course_attend_type') }}
                        </th>
                        <td>
                            @if($course->course_attend_type)
                                {{ \App\Models\Course::COURSE_ATTEND_TYPE[$course->course_attend_type] }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.course_book') }}
                        </th>
                        <td>
                            {{ $course->course_book }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.participant') }}
                        </th>
                        <td>
                            {{ $course->participant }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.price') }}
                        </th>
                        <td>
                            {{ $course->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.duration') }}
                        </th>
                        <td>
                            {{ $course->duration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.months') }}
                        </th>
                        <td>
                            {{ $course->months }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.days') }}
                        </th>
                        <td>
                            {{ $course->days }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.start_date') }}
                        </th>
                        <td>
                            {{ $course->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.end_date') }}
                        </th>
                        <td>
                            {{ $course->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.from') }}
                        </th>
                        <td>
                            {{ $course->from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.to') }}
                        </th>
                        <td>
                            {{ $course->to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $course->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.seo_description') }}
                        </th>
                        <td>
                            {{ $course->seo_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.course.fields.seo_keywords') }}
                        </th>
                        <td>
                            {{ $course->seo_keywords }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.courses.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
