<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class UserUpdateRequest extends Request
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
            //
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$this->id,
            'email' => 'required|email|max:255|unique:users,username,'.$this->id,
            'password' => 'required|required_with:password_confirmation|confirmed',
            'roles' => 'required',
        ];
    }
}
