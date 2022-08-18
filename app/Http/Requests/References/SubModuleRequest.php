<?php

namespace App\Http\Requests\References;

use Illuminate\Foundation\Http\FormRequest;

class SubModuleRequest extends FormRequest
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
            'name' => 'required|unique:rf_sub_modules,name,'.$this->subModule,
            'description' => 'required',
            'module_id' => 'required|integer'
        ];
    }
}
