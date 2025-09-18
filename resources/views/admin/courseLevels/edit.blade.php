@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.courseLevel.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.course-levels.update", [$courseLevel->id]) }}"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.courseLevel.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                           id="name" value="{{ old('name', $courseLevel->name) }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.courseLevel.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                           for="course_type_id">{{ trans('cruds.courseLevel.fields.course_type') }}</label>
                    <select class="form-control select2 {{ $errors->has('course_type') ? 'is-invalid' : '' }}"
                            name="course_type_id" id="course_type_id" required>
                        @foreach($course_types as $entry)
                            <option
                                value="{{ $entry->id }}" {{ (old('course_type_id') ? old('course_type_id') : $courseLevel->course_type->id ?? '') == $entry->id ? 'selected' : '' }}>{{ $entry->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('course_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.courseLevel.fields.course_type_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
