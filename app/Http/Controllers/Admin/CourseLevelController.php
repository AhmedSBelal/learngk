<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourseLevelRequest;
use App\Http\Requests\StoreCourseLevelRequest;
use App\Http\Requests\UpdateCourseLevelRequest;
use App\Models\CourseLevel;
use App\Models\CourseType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CourseLevelController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('course_level_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CourseLevel::query()->with(['course_type'])->get();
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'course_level_show';
                $editGate = 'course_level_edit';
                $deleteGate = 'course_level_delete';
                $crudRoutePart = 'course-levels';

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
            $table->addColumn('course_type_name', function ($row) {
                return $row->course_type ? $row->course_type->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'course_type']);

            return $table->make(true);
        }

        return view('admin.courseLevels.index');
    }

    public function store(StoreCourseLevelRequest $request)
    {
        $courseLevel = CourseLevel::create($request->validated());

        return redirect()->route('admin.course-levels.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_level_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course_types = CourseType::listsTranslations('name')->get();

        return view('admin.courseLevels.create', compact('course_types'));
    }

    public function edit(CourseLevel $courseLevel)
    {
        abort_if(Gate::denies('course_level_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $course_types = CourseType::listsTranslations('name')->get();

        $courseLevel->load('course_type');

        return view('admin.courseLevels.edit', compact('courseLevel', 'course_types'));
    }

    public function update(UpdateCourseLevelRequest $request, CourseLevel $courseLevel)
    {
        $courseLevel->update($request->validated());

        return redirect()->route('admin.course-levels.index');
    }

    public function show(CourseLevel $courseLevel)
    {
        abort_if(Gate::denies('course_level_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseLevel->load('course_type');

        return view('admin.courseLevels.show', compact('courseLevel'));
    }

    public function destroy(CourseLevel $courseLevel)
    {
        abort_if(Gate::denies('course_level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseLevel->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseLevelRequest $request)
    {
        CourseLevel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
