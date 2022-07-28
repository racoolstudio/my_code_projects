<?php

namespace App\Http\Requests;

use App\Models\Flutter_Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFlutter_ProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('flutter_project_edit');
    }

    public function rules()
    {
        return [
            'project_name' => [
                'string',
                'required',
            ],
            'purpose' => [
                'string',
                'required',
            ],
        ];
    }
}
