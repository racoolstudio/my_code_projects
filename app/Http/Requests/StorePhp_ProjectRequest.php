<?php

namespace App\Http\Requests;

use App\Models\Php_Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePhp_ProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('php_project_create');
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
