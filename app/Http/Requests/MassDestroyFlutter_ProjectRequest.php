<?php

namespace App\Http\Requests;

use App\Models\Flutter_Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFlutter_ProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('flutter_Project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:flutter_Projects,id',
        ];
    }
}
