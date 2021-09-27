<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuppliersRequest extends FormRequest
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
            'company_name'=>'required',
            'agency_name'=>'required',
            'account_number'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'email'=>'required |email',
            'address1'=>'required',
            'address2',
            'city'=>'required',
            'state'=>'required',
            'zip'=>'required',
            'country'=>'required',
            'comments'=>'required'
        ];
    }
}
