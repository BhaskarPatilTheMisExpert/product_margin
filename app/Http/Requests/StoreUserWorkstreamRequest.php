<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gate;

class StoreUserWorkstreamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('user_workstream_create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user' => [
                'integer',
                'required',
                'exists:users,id'
            ],
            'workstreams.*' => [
                'integer',
            ],
            'workstreams' => [
                'required',
                'array',
            ],
        ];
    }
}
