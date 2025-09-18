@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.faq.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.faqs.store") }}" enctype="multipart/form-data">
                @csrf

                @foreach(siteLanguages() as $locale)

                    <div class="form-group">
                        <label class="required"
                               for="question-{{$locale}}">{{ trans('cruds.faq.fields.question') }} [{{$locale}}]</label>
                        <input class="form-control {{ $errors->has($locale.'.question') ? 'is-invalid' : '' }}"
                               type="text"
                               name="{{$locale}}[question]" id="question-{{$locale}}"
                               value="{{ old($locale.'.question', '') }}"
                               required>
                        @if($errors->has($locale.'.question'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.question') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.faq.fields.question_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="answer-{{$locale}}" class="required">{{ trans('cruds.faq.fields.answer') }}
                            [{{$locale}}]</label>
                        <textarea
                            class="form-control ckeditor {{ $errors->has($locale.'.answer') ? 'is-invalid' : '' }}"
                            name="{{$locale}}[answer]" id="answer-{{$locale}}">{!! old($locale.'.answer') !!}</textarea>
                        @if($errors->has($locale.'.answer'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.answer') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.faq.fields.answer_helper') }}</span>
                    </div>

                @endforeach

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
                                        xhr.open('POST', '{{ route('admin.faqs.storeCKEditorImages') }}', true);
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
                                        data.append('crud_id', '{{ $faq->id ?? 0 }}');
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
