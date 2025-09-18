@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.team.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.teams.store") }}" enctype="multipart/form-data">
                @csrf

                @foreach(siteLanguages() as $locale)

                    <div class="form-group">
                        <label class="required" for="name-{{$locale}}">{{ trans('cruds.team.fields.name') }}
                            [{{$locale}}]</label>
                        <input class="form-control {{ $errors->has($locale.'.name') ? 'is-invalid' : '' }}" type="text"
                               name="{{$locale}}[name]"
                               id="name-{{$locale}}" value="{{ old($locale.'.name', '') }}" required>
                        @if($errors->has($locale.'.name'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.team.fields.name_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="required"
                               for="description-{{$locale}}">{{ trans('cruds.team.fields.description') }} [{{$locale}}
                            ]</label>
                        <textarea class="form-control {{ $errors->has($locale.'.description') ? 'is-invalid' : '' }}"
                                  name="{{$locale}}[description]" id="description-{{$locale}}"
                                  required>{{ old($locale.'.description') }}</textarea>
                        @if($errors->has($locale.'.description'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.team.fields.description_helper') }}</span>
                    </div>

                @endforeach

                <div class="form-group">
                    <label class="required" for="slug">{{ trans('cruds.team.fields.slug') }}</label>
                    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug"
                           id="slug" value="{{ old('slug', '') }}" required>
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.team.fields.slug_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="email">{{ trans('cruds.team.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                           name="email" id="email" value="{{ old('email') }}" required>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.team.fields.email_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="phone">{{ trans('cruds.team.fields.phone') }}</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone"
                           id="phone" value="{{ old('phone', '') }}" required>
                    @if($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.team.fields.phone_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="facebook">{{ trans('cruds.team.fields.facebook') }}</label>
                    <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text"
                           name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                    @if($errors->has('facebook'))
                        <div class="invalid-feedback">
                            {{ $errors->first('facebook') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.team.fields.facebook_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="instagram">{{ trans('cruds.team.fields.instagram') }}</label>
                    <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text"
                           name="instagram" id="instagram" value="{{ old('instagram', '') }}">
                    @if($errors->has('instagram'))
                        <div class="invalid-feedback">
                            {{ $errors->first('instagram') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.team.fields.instagram_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="twitter">{{ trans('cruds.team.fields.twitter') }}</label>
                    <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text"
                           name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                    @if($errors->has('twitter'))
                        <div class="invalid-feedback">
                            {{ $errors->first('twitter') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.team.fields.twitter_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="linkedin">{{ trans('cruds.team.fields.linkedin') }}</label>
                    <input class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" type="text"
                           name="linkedin" id="linkedin" value="{{ old('linkedin', '') }}">
                    @if($errors->has('linkedin'))
                        <div class="invalid-feedback">
                            {{ $errors->first('linkedin') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.team.fields.linkedin_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="image">{{ trans('cruds.team.fields.image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}"
                         id="image-dropzone">
                    </div>
                    @if($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.team.fields.image_helper') }}</span>
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

@section('scripts')
    <script>
        Dropzone.options.imageDropzone = {
            url: '{{ route('admin.teams.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').find('input[name="image"]').remove()
                $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($team) && $team->image)
                var file = {!! json_encode($team->image) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.preview)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
