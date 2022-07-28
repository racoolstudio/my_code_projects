<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFlutter_ProjectRequest;
use App\Http\Requests\StoreFlutter_ProjectRequest;
use App\Http\Requests\UpdateFlutter_ProjectRequest;
use App\Models\Flutter_Project;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Flutter_ProjectController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('flutter_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $flutter_projects = Flutter_Project::all();

        return view('admin.flutter_projects.index', compact('flutter_projects'));
    }

    public function create()
    {
        abort_if(Gate::denies('flutter_project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.flutter_projects.create');
    }

    public function store(StoreFlutter_ProjectRequest $request)
    {
        $flutter_project = Flutter_Project::create($request->all());

        return redirect()->route('admin.flutter_projects.index');
    }

    public function edit(Flutter_Project $flutter_project)
    {
        abort_if(Gate::denies('flutter_project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.flutter_projects.edit', compact('flutter_project'));
    }

    public function update(UpdateFlutter_ProjectRequest $request, Flutter_Project $flutter_project)
    {
        $flutter_project->update($request->all());

        return redirect()->route('admin.flutter_projects.index');
    }

    public function show(Flutter_Project $flutter_project)
    {
        abort_if(Gate::denies('flutter_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.flutter_projects.show', compact('flutter_project'));
    }

    public function destroy(Flutter_Project $flutter_project)
    {
        abort_if(Gate::denies('flutter_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $flutter_project->delete();

        return back();
    }

    public function massDestroy(MassDestroyFlutter_ProjectRequest $request)
    {
        Flutter_Project::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
