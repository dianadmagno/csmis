<?php

namespace App\Http\Requests\References;

use Illuminate\Foundation\Http\FormRequest;

class PersonnelCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:rf_personnel_categories,name,'.$this->personnelCategory,
            'description' => 'required',
        ];
    }
}