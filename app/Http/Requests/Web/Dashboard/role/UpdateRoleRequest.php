<?php

namespace App\Http\Requests\Web\Dashboard\role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'                  => ['string' ,'required', 'min:1', 'max:200'],
        ];
    }

    public function messages()
    {
        return [
          'name.required' => trans('name is required'),
          'name.min' => trans('minmum number of charchters is 2'),
          'name.max' => trans('maxmum number of charchters is 250'),
        ];
    }
}
