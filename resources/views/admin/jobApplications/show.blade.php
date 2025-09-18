@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.jobApplication.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.job-applications.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.id') }}
                        </th>
                        <td>
                            {{ $jobApplication->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.name') }}
                        </th>
                        <td>
                            {{ $jobApplication->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.family_name') }}
                        </th>
                        <td>
                            {{ $jobApplication->family_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.email') }}
                        </th>
                        <td>
                            <a href="mailto:{{ $jobApplication->email }}">{{ $jobApplication->email }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.phone') }}
                        </th>
                        <td>
                            <a href="tel:{{ $jobApplication->phone }}">{{ $jobApplication->phone }}</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.nationality') }}
                        </th>
                        <td>
                            {{ $jobApplication->nationality }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.address') }}
                        </th>
                        <td>
                            {{ $jobApplication->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.birthdate') }}
                        </th>
                        <td>
                            {{ $jobApplication->birthdate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\JobApplication::STATUS_SELECT[$jobApplication->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.reach') }}
                        </th>
                        <td>
                            {{ App\Models\JobApplication::REACH_SELECT[$jobApplication->reach] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.resume') }}
                        </th>
                        <td>
                            @if($jobApplication->resume)
                                <a href="{{ $jobApplication->resume->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.approve') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $jobApplication->approve ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.job') }}
                        </th>
                        <td>
                            {{ $jobApplication->job->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.application_status') }}
                        </th>
                        <td>
                            {{ App\Models\JobApplication::APPLICATION_STATUS_SELECT[$jobApplication->application_status] ?? '' }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.job-applications.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
