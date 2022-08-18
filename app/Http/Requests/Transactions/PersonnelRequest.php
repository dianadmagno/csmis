<?php

namespace App\Http\Requests\Transactions;

use Illuminate\Foundation\Http\FormRequest;

class PersonnelRequest extends FormRequest
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
            'serial_number' => 'required|unique:tr_personnels,serial_number,'.$this->personnel,
            'rank_id' => 'required',
            'personnel_category_id' => 'required'
        ];
    }
}
