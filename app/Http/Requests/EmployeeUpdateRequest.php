<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
            'loginname'=>'required |alpha_num',
            'password'=>'required |min:5 | confirmed',
            'password_confirmation'=>'required |min:5',
            'first_name'=>'required',
            'last_name'=>'required',
            'gender'=>'required',
            'phone'=>'required |numeric',
            'email'=>'required |email',
            'employeeid'=>'required |numeric'
        ];
    }
}
