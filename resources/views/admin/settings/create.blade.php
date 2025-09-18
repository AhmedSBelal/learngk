@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.setting.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.settings.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="key">{{ trans('cruds.setting.fields.key') }}</label>
                    <input class="form-control {{ $errors->has('key') ? 'is-invalid' : '' }}" type="text" name="key"
                           id="key" value="{{ old('key', '') }}" required>
                    @if($errors->has('key'))
                        <div class="invalid-feedback">
                            {{ $errors->first('key') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.key_helper') }}</span>
                </div>

                @foreach(siteLanguages() as $locale)
                    <div class="form-group">
                        <label for="{{$locale}}-text">{{ trans('cruds.setting.fields.text') }} [{{$locale}}]</label>
                        <input class="form-control {{ $errors->has($locale.'.text') ? 'is-invalid' : '' }}" type="text"
                               name="{{$locale}}[text]" id="{{$locale}}-text" value="{{ old($locale.'.text', '') }}">
                        @if($errors->has($locale.'.text'))
                            <span class="text-danger">{{ $errors->first($locale.'.text') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.text_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="{{$locale}}-short_description">{{ trans('cruds.setting.fields.short_description') }}
                            [{{ $locale }}]</label>
                        <textarea
                            class="form-control {{ $errors->has($locale.'.short_description') ? 'is-invalid' : '' }}"
                            name="{{$locale}}[short_description]"
                            id="{{$locale}}-short_description">{{ old($locale.'.short_description') }}</textarea>
                        @if($errors->has($locale.'.short_description'))
                            <span class="text-danger">{{ $errors->first($locale.'.short_description') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.short_description_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="{{$locale}}-long_description">{{ trans('cruds.setting.fields.long_description') }}
                            [{{$locale}}]</label>
                        <textarea
                            class="form-control ckeditor {{ $errors->has($locale.'.long_description') ? 'is-invalid' : '' }}"
                            name="{{$locale}}[long_description]"
                            id="{{$locale}}-long_description">{!! old($locale.'.long_description') !!}</textarea>
                        @if($errors->has($locale.'.long_description'))
                            <span class="text-danger">{{ $errors->first($locale.'.long_description') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.setting.fields.long_description_helper') }}</span>
                    </div>
                @endforeach

                <div class="form-group">
                    <label for="date">{{ trans('cruds.setting.fields.date') }}</label>
                    <input class="form-control datetime {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text"
                           name="date" id="date" value="{{ old('date') }}">
                    @if($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.date_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="number">{{ trans('cruds.setting.fields.number') }}</label>
                    <input class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" type="number"
                           name="number" id="number" value="{{ old('number', '') }}" step="1">
                    @if($errors->has('number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.number_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="image">{{ trans('cruds.setting.fields.image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}"
                         id="image-dropzone">
                    </div>
                    @if($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.image_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="file">{{ trans('cruds.setting.fields.file') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                    </div>
                    @if($errors->has('file'))
                        <div class="invalid-feedback">
                            {{ $errors->first('file') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.file_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="multi_image">{{ trans('cruds.setting.fields.multi_image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('multi_image') ? 'is-invalid' : '' }}"
                         id="multi_image-dropzone">
                    </div>
                    @if($errors->has('multi_image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('multi_image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.multi_image_helper') }}</span>
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
        $(document).ready(function () {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function (loader) {
                    return {
                        upload: function () {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function (resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '{{ route('admin.settings.storeCKEditorImages') }}', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText = `Couldn't upload file: ${file.name}.`;
                                        xhr.addEventListener('error', function () {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function () {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function () {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                                            }

                                            $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                                            resolve({default: response.url});
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function (e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $setting->id ?? 0 }}');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>

    <script>
        Dropzone.options.imageDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.svg',
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
                @if(isset($setting) && $setting->image)
                var file = {!! json_encode($setting->image) !!}
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
    <script>
        Dropzone.options.fileDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
            maxFilesize: 10, // MB
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 8
            },
            success: function (file, response) {
                $('form').find('input[name="file"]').remove()
                $('form').append('<input type="hidden" name="file" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="file"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @if(isset($setting) && $setting->file)
                var file = {!! json_encode($setting->file) !!}
                this.options.addedfile.call(this, file)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="file" value="' + file.file_name + '">')
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
    <script>
        var uploadedMultiImageMap = {}
        Dropzone.options.multiImageDropzone = {
            url: '{{ route('admin.settings.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.svg',
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
                $('form').append('<input type="hidden" name="multi_image[]" value="' + response.name + '">')
                uploadedMultiImageMap[file.name] = response.name
            },
            removedfile: function (file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedMultiImageMap[file.name]
                }
                $('form').find('input[name="multi_image[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($setting) && $setting->multi_image)
                var files = {!! json_encode($setting->multi_image) !!}
                for(var i in files)
                {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="multi_image[]" value="' + file.file_name + '">')
                }
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
