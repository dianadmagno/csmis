<?php

namespace App\Http\Requests\References;

use Illuminate\Foundation\Http\FormRequest;

class CollegeCourseRequest extends FormRequest
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
            'name' => 'required|unique:rf_college_courses,name,'.$this->collegeCourse,
            'description' => 'required',
        ];
    }
}
