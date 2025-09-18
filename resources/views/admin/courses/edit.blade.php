@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.course.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.courses.update", [$course->id]) }}"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf

                @foreach(siteLanguages() as $locale)

                    <div class="form-group">
                        <label class="required" for="name-{{ $locale }}">{{ trans('cruds.course.fields.name') }}
                            [{{$locale}}]</label>
                        <input class="form-control {{ $errors->has($locale.'.name') ? 'is-invalid' : '' }}" type="text"
                               name="{{$locale}}[name]"
                               id="name-{{ $locale }}"
                               value="{{ old($locale.'.name', $course->translate($locale, true)->name) }}" required>
                        @if($errors->has($locale.'.name'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.course.fields.name_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="required"
                               for="short_description-{{$locale}}">{{ trans('cruds.course.fields.short_description') }}
                            [{{$locale}}]</label>
                        <textarea
                            class="form-control {{ $errors->has($locale.'.short_description') ? 'is-invalid' : '' }}"
                            name="{{$locale}}[short_description]" id="short_description-{{$locale}}"
                            required>{{ old($locale.'.short_description', $course->translate($locale, true)->short_description) }}</textarea>
                        @if($errors->has($locale.'.short_description'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.short_description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.course.fields.short_description_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="description-{{$locale}}">{{ trans('cruds.course.fields.description') }} [{{$locale}}
                            ]</label>
                        <textarea
                            class="form-control ckeditor {{ $errors->has($locale.'.description') ? 'is-invalid' : '' }}"
                            name="{{$locale}}[description]"
                            id="description-{{$locale}}">{!! old($locale.'.description', $course->translate($locale, true)->description) !!}</textarea>
                        @if($errors->has($locale.'.description'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.course.fields.description_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="{{$locale}}-duration">{{ trans('cruds.course.fields.duration') }} [{{ $locale }}
                            ]</label>
                        <input class="form-control {{ $errors->has($locale.'.duration') ? 'is-invalid' : '' }}"
                               type="text" name="{{$locale}}[duration]" id="{{$locale}}-duration"
                               value="{{ old($locale.'.duration', $course->translate($locale, true)->duration) }}">
                        @if($errors->has($locale.'.duration'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.duration') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.course.fields.duration_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="{{$locale}}-months">{{ trans('cruds.course.fields.months') }} [{{$locale}}]</label>
                        <input class="form-control {{ $errors->has($locale.'.months') ? 'is-invalid' : '' }}"
                               type="text"
                               name="{{$locale}}[months]" id="{{$locale}}-months"
                               value="{{ old($locale.'.months', $course->translate($locale, true)->months) }}">
                        @if($errors->has($locale.'.months'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.months') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.course.fields.months_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="{{$locale}}-days">{{ trans('cruds.course.fields.days') }} [{{$locale}}]</label>
                        <input class="form-control {{ $errors->has($locale.'.days') ? 'is-invalid' : '' }}" type="text"
                               name="{{$locale}}[days]" id="{{$locale}}-days"
                               value="{{ old($locale.'.days', $course->translate($locale, true)->days) }}">
                        @if($errors->has($locale.'.days'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.days') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.course.fields.days_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="seo_description-{{$locale}}">{{ trans('cruds.course.fields.seo_description') }}
                            [{{$locale}}]</label>
                        <textarea
                            class="form-control {{ $errors->has($locale.'.seo_description') ? 'is-invalid' : '' }}"
                            name="{{$locale}}[seo_description]"
                            id="seo_description-{{$locale}}">{{ old($locale.'.seo_description', $course->translate($locale, true)->seo_description) }}</textarea>
                        @if($errors->has($locale.'.seo_description'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.seo_description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.course.fields.seo_description_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label for="seo_keywords-{{$locale}}">{{ trans('cruds.course.fields.seo_keywords') }}
                            [{{$locale}}]</label>
                        <textarea class="form-control {{ $errors->has($locale.'.seo_keywords') ? 'is-invalid' : '' }}"
                                  name="{{$locale}}[seo_keywords]"
                                  id="seo_keywords-{{$locale}}">{{ old($locale.'.seo_keywords', $course->translate($locale, true)->seo_keywords) }}</textarea>
                        @if($errors->has($locale.'.seo_keywords'))
                            <div class="invalid-feedback">
                                {{ $errors->first($locale.'.seo_keywords') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.course.fields.seo_keywords_helper') }}</span>
                    </div>

                @endforeach

                <div class="form-group">
                    <label class="required" for="slug">{{ trans('cruds.course.fields.slug') }}</label>
                    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug"
                           id="slug" value="{{ old('slug', $course->slug) }}" required>
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.slug_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="exam_link">{{ trans('cruds.course.fields.exam_link') }}</label>
                    <input class="form-control {{ $errors->has('exam_link') ? 'is-invalid' : '' }}" type="text"
                           name="exam_link" id="exam_link" value="{{ old('exam_link', $course->exam_link) }}">
                    @if($errors->has('exam_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('exam_link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.exam_link_helper') }}</span>
                </div>

                <div class="form-group">
                    <label>{{ trans('cruds.course.fields.type') }}</label>
                    <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type">
                        <option value
                                disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Course::TYPE as $key => $label)
                            <option
                                value="{{ $key }}" {{ old('type', $course->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.type_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="course_type_id">{{ trans('cruds.course.fields.course_type') }}</label>
                    <select class="form-control select2 {{ $errors->has('course_type') ? 'is-invalid' : '' }}"
                            name="course_type_id" id="course_type_id" required>
                        @foreach($course_types as $entry)
                            <option
                                value="{{ $entry->id }}" {{ (old('course_type_id') ? old('course_type_id') : $course->course_type->id ?? '') == $entry->id ? 'selected' : '' }}>
                                {{ $entry->name }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('course_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.course_type_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="course_level_id">{{ trans('cruds.course.fields.course_level') }}</label>
                    <select class="form-control select2 {{ $errors->has('course_level') ? 'is-invalid' : '' }}"
                            name="course_level_id" id="course_level_id">
                        <option value="{{ null }}" {{ old('course_level_id') === null ? 'selected' : '' }}>Please Select
                            Level
                        </option>
                        @foreach($course_levels as $entry)
                            <option
                                value="{{ $entry->id }}" {{ (old('course_level_id') ? old('course_level_id') : $course->course_level->id ?? '') == $entry->id ? 'selected' : '' }}>{{ $entry->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('course_level'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_level') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.course_level_helper') }}</span>
                </div>

                <div class="form-group">
                    <label>{{ trans('cruds.course.fields.course_attend_type') }}</label>
                    <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}"
                            name="course_attend_type" id="course_attend_type">
                        <option value
                                disabled {{ old('course_attend_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Course::COURSE_ATTEND_TYPE as $key => $label)
                            <option
                                value="{{ $key }}" {{ old('course_attend_type', $course->course_attend_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('course_attend_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_attend_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.course_attend_type_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="course_book">{{ trans('cruds.course.fields.course_book') }}</label>
                    <input class="form-control {{ $errors->has('course_book') ? 'is-invalid' : '' }}" type="text"
                           name="course_book"
                           id="course_book" value="{{ old('course_book', $course->course_book) }}">
                    @if($errors->has('course_book'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_book') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.course_book_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="price">{{ trans('cruds.course.fields.participant') }}</label>
                    <input class="form-control {{ $errors->has('participant') ? 'is-invalid' : '' }}" type="number"
                           name="participant" id="participant" value="{{ old('participant', $course->participant) }}">
                    @if($errors->has('participant'))
                        <div class="invalid-feedback">
                            {{ $errors->first('participant') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.participant_helper') }}</span>
                </div>


                <div class="form-group">
                    <label for="price">{{ trans('cruds.course.fields.price') }}</label>
                    <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number"
                           name="price" id="price" value="{{ old('price', $course->price) }}" step="0.01">
                    @if($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.price_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="start_date">{{ trans('cruds.course.fields.start_date') }}</label>
                    <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text"
                           name="start_date" id="start_date" value="{{ old('start_date', $course->start_date) }}">
                    @if($errors->has('start_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('start_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.start_date_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="end_date">{{ trans('cruds.course.fields.end_date') }}</label>
                    <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text"
                           name="end_date" id="end_date" value="{{ old('end_date', $course->end_date) }}">
                    @if($errors->has('end_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('end_date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.end_date_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="from">{{ trans('cruds.course.fields.from') }}</label>
                    <input class="form-control timepicker {{ $errors->has('from') ? 'is-invalid' : '' }}" type="text"
                           name="from" id="from" value="{{ old('from', $course->from) }}">
                    @if($errors->has('from'))
                        <div class="invalid-feedback">
                            {{ $errors->first('from') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.from_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="to">{{ trans('cruds.course.fields.to') }}</label>
                    <input class="form-control timepicker {{ $errors->has('to') ? 'is-invalid' : '' }}" type="text"
                           name="to" id="to" value="{{ old('to', $course->to) }}">
                    @if($errors->has('to'))
                        <div class="invalid-feedback">
                            {{ $errors->first('to') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.to_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="image">{{ trans('cruds.course.fields.image') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}"
                         id="image-dropzone">
                    </div>
                    @if($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.image_helper') }}</span>
                </div>

                <div class="form-group">
                    <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="active" value="0">
                        <input class="form-check-input" type="checkbox" name="active" id="active"
                               value="1" {{ $course->active || old('active', 0) === 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="active">{{ trans('cruds.course.fields.active') }}</label>
                    </div>
                    @if($errors->has('active'))
                        <div class="invalid-feedback">
                            {{ $errors->first('active') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.course.fields.active_helper') }}</span>
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
                                        xhr.open('POST', '{{ route('admin.courses.storeCKEditorImages') }}', true);
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
                                        data.append('crud_id', '{{ $course->id ?? 0 }}');
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
            url: '{{ route('admin.courses.storeMedia') }}',
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
                @if(isset($course) && $course->image)
                var file = {!! json_encode($course->image) !!}
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
