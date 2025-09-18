<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourseTypeRequest;
use App\Http\Requests\StoreCourseTypeRequest;
use App\Http\Requests\UpdateCourseTypeRequest;
use App\Models\CourseType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CourseTypeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('course_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CourseType::query()->translatedIn(app()->getLocale())->get();
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'course_type_show';
                $editGate = 'course_type_edit';
                $deleteGate = 'course_type_delete';
                $crudRoutePart = 'course-types';

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
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.courseTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courseTypes.create');
    }

    public function store(StoreCourseTypeRequest $request)
    {
        $courseType = CourseType::create($request->validated());

        return redirect()->route('admin.course-types.index');
    }

    public function edit(CourseType $courseType)
    {
        abort_if(Gate::denies('course_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courseTypes.edit', compact('courseType'));
    }

    public function update(UpdateCourseTypeRequest $request, CourseType $courseType)
    {
        $courseType->update($request->validated());

        return redirect()->route('admin.course-types.index');
    }

    public function show(CourseType $courseType)
    {
        abort_if(Gate::denies('course_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.courseTypes.show', compact('courseType'));
    }

    public function destroy(CourseType $courseType)
    {
        abort_if(Gate::denies('course_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseType->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseTypeRequest $request)
    {
        CourseType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
