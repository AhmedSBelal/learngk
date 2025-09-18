@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.feature.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.features.store") }}" enctype="multipart/form-data">
                @csrf

                @foreach(siteLanguages() as $locale)
                    <div class="form-group">
                        <label class="required" for="title-{{$locale}}">{{ trans('cruds.feature.fields.title') }}
                            [{{$locale}}]</label>
                        <input class="form-control {{ $errors->has($locale.'.title') ? 'is-invalid' : '' }}" type="text"
                               name="{{$locale}}[title]" id="title-{{$locale}}" value="{{ old($locale.'.title', '') }}"
                               required>
                        @if($errors->has($locale.'.title'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.title') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.feature.fields.title_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="required"
                               for="description-{{$locale}}">{{ trans('cruds.feature.fields.description') }}
                            [{{$locale}}]</label>
                        <textarea class="form-control {{ $errors->has($locale.'.description') ? 'is-invalid' : '' }}"
                                  name="{{$locale}}[description]" id="description-{{$locale}}"
                                  required>{{ old($locale.'.description') }}</textarea>
                        @if($errors->has($locale.'.description'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.feature.fields.description_helper') }}</span>
                    </div>
                @endforeach

                <div class="form-group">
                    <label for="image">{{ trans('cruds.feature.fields.image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}"
                         id="image-dropzone">
                    </div>
                    @if($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.feature.fields.image_helper') }}</span>
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
            url: '{{ route('admin.features.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpg,.jpeg,.png.svg',
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
                @if(isset($feature) && $feature->image)
                var file = {!! json_encode($feature->image) !!}
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
