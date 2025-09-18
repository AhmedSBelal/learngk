<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEnrollRequest;
use App\Http\Requests\UpdateEnrollRequest;
use App\Models\Course;
use App\Models\Enroll;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class EnrollController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('enroll_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Enroll::with(['course'])->get();
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'enroll_show';
                $editGate = 'enroll_edit';
                $deleteGate = 'enroll_delete';
                $crudRoutePart = 'enrolls';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->addColumn('course_name', function ($row) {
                return $row->course ? $row->course->name : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? Enroll::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'course']);

            return $table->make(true);
        }

        return view('admin.enrolls.index');
    }

    public function edit(Enroll $enroll)
    {
        abort_if(Gate::denies('enroll_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enroll->load('course');

        return view('admin.enrolls.edit', compact('enroll'));
    }

    public function update(UpdateEnrollRequest $request, Enroll $enroll)
    {
        $enroll->update($request->all());

        return redirect()->route('admin.enrolls.index');
    }

    public function show(Enroll $enroll)
    {
        abort_if(Gate::denies('enroll_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enroll->load('course');

        return view('admin.enrolls.show', compact('enroll'));
    }

    public function destroy(Enroll $enroll)
    {
        abort_if(Gate::denies('enroll_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enroll->delete();

        return back();
    }

    public function massDestroy(MassDestroyEnrollRequest $request)
    {
        Enroll::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function export(Request $request)
    {
        abort_if(Gate::denies('enroll_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $courses = Course::with('translations')->get();
        $enrolls = Enroll::query()->with('course')
            ->when($request->has('course_id'), function ($query) use ($request) {
                $query->where('course_id', $request->course_id);
            })
            ->latest()
            ->get();
        return view('admin.enrolls.export', compact([
            'courses',
            'enrolls'
        ]));
    }
}
