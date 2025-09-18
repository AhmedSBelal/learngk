<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySiteLanguageRequest;
use App\Http\Requests\StoreSiteLanguageRequest;
use App\Http\Requests\UpdateSiteLanguageRequest;
use App\Models\SiteLanguage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SiteLanguageController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('site_language_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SiteLanguage::query()->select(sprintf('%s.*', (new SiteLanguage())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'site_language_show';
                $editGate = 'site_language_edit';
                $deleteGate = 'site_language_delete';
                $crudRoutePart = 'site-languages';

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
            $table->editColumn('locale', function ($row) {
                return $row->locale ? $row->locale : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.siteLanguages.index');
    }

    public function create()
    {
        abort_if(Gate::denies('site_language_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteLanguages.create');
    }

    public function store(StoreSiteLanguageRequest $request)
    {
        $siteLanguage = SiteLanguage::create($request->all());

        return redirect()->route('admin.site-languages.index');
    }

    public function edit(SiteLanguage $siteLanguage)
    {
        abort_if(Gate::denies('site_language_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteLanguages.edit', compact('siteLanguage'));
    }

    public function update(UpdateSiteLanguageRequest $request, SiteLanguage $siteLanguage)
    {
        $siteLanguage->update($request->all());

        return redirect()->route('admin.site-languages.index');
    }

    public function show(SiteLanguage $siteLanguage)
    {
        abort_if(Gate::denies('site_language_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteLanguages.show', compact('siteLanguage'));
    }

    public function destroy(SiteLanguage $siteLanguage)
    {
        abort_if(Gate::denies('site_language_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siteLanguage->delete();

        return back();
    }

    public function massDestroy(MassDestroySiteLanguageRequest $request)
    {
        SiteLanguage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
