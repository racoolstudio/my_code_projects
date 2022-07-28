<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPhp_ProjectRequest;
use App\Http\Requests\StorePhp_ProjectRequest;
use App\Http\Requests\UpdatePhp_ProjectRequest;
use App\Models\Php_Project;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Php_ProjectController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('php_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $php_projects = Php_Project::all();

        return view('admin.php_projects.index', compact('php_projects'));
    }

    public function create()
    {
        abort_if(Gate::denies('php_project_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.php_projects.create');
    }

    public function store(StorePhp_ProjectRequest $request)
    {
        $php_project = Php_Project::create($request->all());

        return redirect()->route('admin.php_projects.index');
    }

    public function edit(Php_Project $php_project)
    {
        abort_if(Gate::denies('php_project_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.php_projects.edit', compact('php_project'));
    }

    public function update(UpdatePhp_ProjectRequest $request, Php_Project $php_project)
    {
        $php_project->update($request->all());

        return redirect()->route('admin.php_projects.index');
    }

    public function show(Php_Project $php_project)
    {
        abort_if(Gate::denies('php_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.php_projects.show', compact('php_project'));
    }

    public function destroy(Php_Project $php_project)
    {
        abort_if(Gate::denies('php_project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $php_project->delete();

        return back();
    }

    public function massDestroy(MassDestroyPhp_ProjectRequest $request)
    {
        Php_Project::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
