<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ApplicationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        // TODO:  check if user is authenticated
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required',
            'environment_id' => 'required',
            'url'   => 'required',
            'business_id' => 'required',
            'devteam_id' => 'required'
        ];
    }
}
