@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.flutter_project.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.flutter_projects.update", [$flutter_project->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="project_name">{{ trans('cruds.flutter_project.fields.project_name') }}</label>
                <input class="form-control {{ $errors->has('project_name') ? 'is-invalid' : '' }}" type="text" name="project_name" id="project_name" value="{{ old('project_name', $flutter_project->project_name) }}" required>
                @if($errors->has('project_name'))
                    <span class="text-danger">{{ $errors->first('project_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.flutter_project.fields.project_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="purpose">{{ trans('cruds.flutter_project.fields.purpose') }}</label>
                <input class="form-control {{ $errors->has('purpose') ? 'is-invalid' : '' }}" type="text" name="purpose" id="purpose" value="{{ old('purpose', $flutter_project->purpose) }}" required>
                @if($errors->has('purpose'))
                    <span class="text-danger">{{ $errors->first('purpose') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.flutter_project.fields.purpose_helper') }}</span>
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