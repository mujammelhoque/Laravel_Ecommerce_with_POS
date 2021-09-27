<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required |email|unique:users',
            'password' => 'required |min:5 | confirmed',
            'password_confirmation' => 'required |min:5',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'phone' => 'required |numeric',
            'image' => 'required | mimes:jpg,bmp,png,svg,gif',
            'employeeid' => 'required |numeric'
        ];
    }
}
