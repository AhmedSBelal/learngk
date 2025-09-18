@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.jobApplication.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.job-applications.update", [$jobApplication->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.jobApplication.fields.application_status') }}</label>
                <select class="form-control {{ $errors->has('application_status') ? 'is-invalid' : '' }}" name="application_status" id="application_status">
                    <option value disabled {{ old('application_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\JobApplication::APPLICATION_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('application_status', $jobApplication->application_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('application_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('application_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.jobApplication.fields.application_status_helper') }}</span>
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