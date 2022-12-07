<?php

namespace App\Http\Requests;

use App\Rules\AlphaSpaces;
use App\Rules\Mobile;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        if($this->segment(3)){
            $email = 'required|email|max:45|unique:admins,email,'.$this->segment(3);
            $password = 'nullable|min:6|max:20';
            $confirm_password = 'nullable|min:6|max:20|same:password';
        }else{
            $email = 'required|email|max:45|unique:admins';
            $password = 'required|min:6|max:20';
            $confirm_password = 'required|min:6|max:20|same:password';
        }

        return [
            'first_name' => ['required', new AlphaSpaces, 'min:3', 'max:45'],
            'last_name' => ['required', new AlphaSpaces, 'min:3', 'max:45'],
            'designation' => ['required', new AlphaSpaces, 'min:3', 'max:45'],
            'role_id' => 'required',
            'mobile_no' => ['required', 'min:11', 'max:14', new Mobile()],
            'gender' => 'required',
            'email' => $email,
            'password' => $password,
            'confirm_password' => $confirm_password,
            'status' => 'required',
            'photo' => 'nullable|mimes:jpeg,jpg,png,gif|max:4000'
        ];
    }


    public function attributes()
    {
        return [
            'role_id' => 'role/level'
        ];
    }
}
