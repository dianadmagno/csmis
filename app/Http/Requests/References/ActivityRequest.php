<?php

namespace App\Http\Requests\References;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
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
            'name' => 'required|unique:rf_activities,name,'.$this->activity,
            'description' => 'required',
            'nr_of_points' => 'numeric|nullable',
            'performance_type' => 'required'
        ];
    }
}
