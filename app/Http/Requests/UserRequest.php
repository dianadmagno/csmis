<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'lastname' => [
                'required',
            ],
            'firstname' => [
                'required',
            ],
            'middlename' => [
                'required',
            ],
            'email' => [
                'required', 'email', 'unique:users,email,'.$this->user
            ]
        ];
    }
}
