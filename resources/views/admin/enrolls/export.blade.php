@extends('layouts.admin')
@section('styles')

@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-4">
                            Export Enroll Data
                        </div>
                        <div class="col-md-4">
                            <form action="" method="get">
                                <div class="form-group">
                                    <label for="course" class="form-label">Choose Course</label>
                                    <select name="course_id" id="course" class="form-control">
                                        @forelse($courses as $course)
                                            <option
                                                @if(request()->has('course_id') && request()->get('course_id') == $course->id) selected
                                                @endif value="{{ $course->id }}">{{ $course->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-outline-success">Search</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="file_name">Name of file</label>
                                <input type="text" name="file_name" class="form-control" id="file_name">
                            </div>
                            <button id="ex-btn-enroll" class="btn btn-outline-success" type="button">Export Data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="ex-table-enroll" class="table table-responsive table-hover table-bordered text-center">
                        <thead>
                        <tr>
                            <th>name</th>
                            <th>family_name</th>
                            <th>birthdate</th>
                            <th>age</th>
                            <th>gender</th>
                            <th>id_card</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>parent_phone</th>
                            <th>nationality</th>
                            <th>address</th>
                            <th>degree</th>
                            <th>job</th>
                            <th>knowledge</th>
                            <th>reach_us</th>
                            <th>course_id</th>
                            <th>status</th>
                            <th>created_at</th>
                            <th>course_start</th>
                            <th>course_end</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($enrolls as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->family_name}}</td>
                                <td>{{$item->birthdate}}</td>
                                <td>{{$item->age}}</td>
                                <td>{{$item->gender}}</td>
                                <td>{{$item->id_card}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->parent_phone}}</td>
                                <td>{{$item->nationality}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->degree}}</td>
                                <td>{{$item->job}}</td>
                                <td>{{$item->knowledge}}</td>
                                <td>{{$item->reach_us}}</td>
                                <td>{{$item->course->name}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->course_start}}</td>
                                <td>{{$item->course_end}}</td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"
            integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('ex-btn-enroll').addEventListener('click', function () {

                const fileName = document.getElementById('file_name').value ?? 'lgk-enrolls-export';

                var table = document.getElementById('ex-table-enroll');

                // Convert the table to a workbook
                var workbook = XLSX.utils.table_to_book(table);

                // Generate a binary string from the workbook
                var wbout = XLSX.write(workbook, {type: 'binary', bookType: 'xlsx'});

                // Download the Excel file
                saveAs(new Blob([s2ab(wbout)], {type: 'application/octet-stream'}), `${fileName}.xlsx`);
            });
        });

        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
            return buf;
        }
    </script>
@endsection
