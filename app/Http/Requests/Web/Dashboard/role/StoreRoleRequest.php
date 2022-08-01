<?php

namespace App\Http\Requests\Web\Dashboard\role;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                  => ['string', 'unique:roles,name' ,'required', 'min:1', 'max:200'],
        ];
    }

    public function messages()
    {
        return [
          'name.required' => trans('name is required'),
          'name.min' => trans('minmum number of charchters is 2'),
          'name.max' => trans('maxmum number of charchters is 250'),
          'name.unique' => trans('this role alerady taken'),
        ];
    }
}
