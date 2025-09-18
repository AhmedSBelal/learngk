@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.job.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.jobs.store") }}" enctype="multipart/form-data">
                @csrf
                @foreach(siteLanguages() as $locale)
                    <div class="form-group">
                        <label class="required" for="name-{{$locale}}">{{ trans('cruds.job.fields.name') }} [{{$locale}}
                            ]</label>
                        <input class="form-control {{ $errors->has($locale.'.name') ? 'is-invalid' : '' }}" type="text"
                               name="{{$locale}}[name]" id="name-{{$locale}}" value="{{ old($locale.'.name', '') }}"
                               required>
                        @if($errors->has($locale.'.name'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.job.fields.name_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="description-{{$locale}}"
                               class="required">{{ trans('cruds.job.fields.description') }} [{{$locale}}]</label>
                        <textarea
                            class="form-control ckeditor {{ $errors->has($locale.'.description') ? 'is-invalid' : '' }}"
                            name="{{$locale}}[description]"
                            id="description-{{$locale}}">{!! old($locale.'.description') !!}</textarea>
                        @if($errors->has($locale.'.description'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.job.fields.description_helper') }}</span>
                    </div>
                @endforeach

                <div class="form-group">
                    <label class="required" for="slug">{{ trans('cruds.job.fields.slug') }}</label>
                    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug"
                           id="slug" value="{{ old('slug', '') }}" required>
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.job.fields.slug_helper') }}</span>
                </div>

                <div class="form-group">
                    <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="active" value="0">
                        <input class="form-check-input" type="checkbox" name="active" id="active"
                               value="1" {{ old('active', 0) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="active">{{ trans('cruds.job.fields.active') }}</label>
                    </div>
                    @if($errors->has('active'))
                        <div class="invalid-feedback">
                            {{ $errors->first('active') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.job.fields.active_helper') }}</span>
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
                                        xhr.open('POST', '{{ route('admin.jobs.storeCKEditorImages') }}', true);
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
                                        data.append('crud_id', '{{ $job->id ?? 0 }}');
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

@endsection
