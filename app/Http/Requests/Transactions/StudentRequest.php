<?php

namespace App\Http\Requests\Transactions;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required|email|unique:tr_students,email,'.$this->student,
            'age' => 'required|numeric',
            'address' => 'required',
            'birthdate' => 'required|date',
            'blood_type_id' => 'required',
            'religion_id' => 'required',
            'rank_id' => 'required',
            'enlistment_type_id' => 'required',
            'class_id' => 'required',
            'unit_id' => 'required',
            'bda' => 'required',
            'ethnic_group_id' => 'required',
            'headgear' => 'required|numeric',
            'goa_chest' => 'required|numeric',
            'goa_waist' => 'required|numeric',
            'shoe_size' => 'required|numeric',
            'shoe_width' => 'required|numeric',
            'company_id' => 'required',
            'emergency_contact_person' => 'required',
            'emergency_contact_number' => 'required|unique:tr_students,emergency_contact_number,'.$this->student,
            'emergency_contact_relationship' => 'required',
            'mobile_number' => 'required|unique:tr_students,mobile_number,'.$this->student,
            'civil_status' => 'required',
            'educational_attainment' => 'required',
            'sex' => 'required',
            'physical_profile' => 'required'
        ];
    }
}
