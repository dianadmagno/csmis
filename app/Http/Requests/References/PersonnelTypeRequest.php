<?php

namespace App\Http\Requests\References;

use Illuminate\Foundation\Http\FormRequest;

class PersonnelTypeRequest extends FormRequest
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
            'name' => 'required|unique:rf_personnel_types,name,'.$this->personnelType,
            'description' => 'required',
        ];
    }
}
