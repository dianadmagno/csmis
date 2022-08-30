<?php

namespace App\Http\Requests\References;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'name' => 'required|unique:rf_subjects,name,NULL,id,sub_module_id,'.request('sub_module_id'),
            'description' => 'required',
            'sub_module_id' => 'required|integer',
            'nr_of_points' => 'required|integer',
            'nr_of_pds' => 'required|integer'
        ];
    }
}
