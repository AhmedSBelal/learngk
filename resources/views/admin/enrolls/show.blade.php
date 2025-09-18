@extends('layouts.admin')
@section('styles')
    <style>
        @media print {
            #printHeader, #printPDF, .back-btn {
                display: none !important;
            }
        }
    </style>
@endsection
@section('content')

    <div id="printable" class="card">
        <div id="printHeader" class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.enroll.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default back-btn" href="{{ route('admin.enrolls.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                    <a id="printPDF" class="btn btn-success" href="">
                        <i class="fas fa-print"></i> Print
                    </a>
                </div>
                <section>
                    <div class="row justify-content-between align-items-center">
                        <div class="col-4">
                            <img src="{{ settingImage('logo') }}" alt="learn german kuwait"
                                 style="width: 120px;height: 120px;">
                        </div>
                        <div class="col-8">
                            <h1 class="font-bold text-right">{{ trans('website.enroll.contract') }}</h1>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <table class="table table-striped text-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Family Name</th>
                                    <th>Birthdate</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>ID Card</th>
                                    <th>Nationality</th>
                                </tr>
                                <tr>
                                    <td>{{ $enroll->name }}</td>
                                    <td>{{ $enroll->family_name }}</td>
                                    <td>{{ \Carbon\Carbon::make($enroll->birthdate)->format('d/m/Y') }}</td>
                                    <td>{{ $enroll->age }}</td>
                                    <td>{{ $enroll->gender }}</td>
                                    <td>{{ $enroll->id_Card }}</td>
                                    <td>{{ $enroll->nationality }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $enroll->address }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <table class="table table-striped text-center">
                                <tr>
                                    <th>Phone</th>
                                    <th>Currently Job</th>
                                    <th>Email</th>
                                    <th>Degree</th>
                                    <th>Parent Phone</th>
                                    <th>How did you know about us?</th>
                                </tr>
                                <tr>
                                    <td>{{$enroll->phone}}</td>
                                    <td>{{ $enroll->job }}</td>
                                    <td>{{ $enroll->email }}</td>
                                    <td>{{ $enroll->degree }}</td>
                                    <td>{{ $enroll->parent_phone }}</td>
                                    <td>{{ \App\Models\Enroll::REACH_US[$enroll->reach_us] }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <table class="table table-striped text-center">
                                <tr>
                                    <th>Course</th>
                                    <th>Price</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Previous Knowledge in Germany</th>
                                    <th>Enrollment Status</th>
                                </tr>
                                <tr>
                                    <td>{{ $enroll->course->name }}</td>
                                    <td>
                                        @if($enroll->course->price)
                                            {{ $enroll->course->price }} {{ trans('website.course.course-currency') }}
                                        @else
                                            ---
                                        @endif
                                    </td>
                                    <td>
                                        @if($enroll->course->start_date)
                                            {{ $enroll->course->start_date }}
                                        @else
                                            ---
                                        @endif
                                    </td>
                                    <td>
                                        @if($enroll->course->end_date)
                                            {{ $enroll->course->end_date }}
                                        @else
                                            ---
                                        @endif
                                    </td>
                                    <td>{{ $enroll->knowledge}}</td>
                                    <td>{{ \App\Models\Enroll::STATUS_SELECT[$enroll->status] }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 text-right">
                            {!! settingText('enroll-affiliation-term', 'long_description') !!}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 text-right">
                            {!! settingText('enroll-withdrawal-term', 'long_description') !!}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 text-right">
                            {!! settingText('enroll-contract', 'long_description') !!}
                        </div>
                    </div>
                </section>
                <div class="form-group">
                    <a class="btn btn-default back-btn" href="{{ route('admin.enrolls.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        const body = document.querySelector('body').innerHTML;
        const printArea = document.querySelector('#printable').innerHTML;
        const pdfBtn = document.querySelector('#printPDF');

        pdfBtn.addEventListener('click', function (event) {
            event.preventDefault();
            document.querySelector('body').innerHTML = printArea;
            window.print();
            document.querySelector('body').innerHTML = body;
        });
    </script>
@endsection
