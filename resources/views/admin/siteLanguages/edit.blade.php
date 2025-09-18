@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.siteLanguage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.site-languages.update", [$siteLanguage->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.siteLanguage.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $siteLanguage->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteLanguage.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="locale">{{ trans('cruds.siteLanguage.fields.locale') }}</label>
                <input class="form-control {{ $errors->has('locale') ? 'is-invalid' : '' }}" type="text" name="locale" id="locale" value="{{ old('locale', $siteLanguage->locale) }}" required>
                @if($errors->has('locale'))
                    <div class="invalid-feedback">
                        {{ $errors->first('locale') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.siteLanguage.fields.locale_helper') }}</span>
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