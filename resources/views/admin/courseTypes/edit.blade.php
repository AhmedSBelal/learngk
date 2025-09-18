@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.courseType.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.course-types.update", [$courseType->id]) }}"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @foreach(siteLanguages() as $locale)
                    <div class="form-group">
                        <label class="required" for="name-{{$locale}}">{{ trans('cruds.courseType.fields.name') }}
                            [{{$locale}}]</label>
                        <input class="form-control {{ $errors->has($locale.'.name') ? 'is-invalid' : '' }}" type="text"
                               name="{{$locale}}[name]" id="name-{{$locale}}"
                               value="{{ old($locale.'.name', $courseType->translate($locale, true)->name) }}"
                               required>
                        @if($errors->has($locale.'.name'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.courseType.fields.name_helper') }}</span>
                    </div>
                @endforeach

                <div class="form-group">
                    <label class="required" for="slug">{{ trans('cruds.courseType.fields.slug') }}</label>
                    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug"
                           id="slug" value="{{ old('slug', $courseType->slug) }}" required>
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.courseType.fields.slug_helper') }}</span>
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
