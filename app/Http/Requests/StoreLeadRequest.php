<?php

namespace App\Http\Requests;

use App\Models\Lead;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreLeadRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lead_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'fname'       => [
                'required',
            ],
            'lname'       => [
                'required',
            ],
            'email'       => [
                'required',
            ],
            'status_id'   => [
                'required',
                'integer',
            ],
            'phone' => [
                'required'
            ],
            'category_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
