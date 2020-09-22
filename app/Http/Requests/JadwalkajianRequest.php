<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JadwalkajianRequest extends Request
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
        $rules = [
            'hari' =>'required',
            'tanggal' => 'required | date_format:Y-m-d',
            'jam' => 'required',
            'tempat' => 'required',
            'narasumber' => 'required',
            'tema' => 'required',
            //


        ];
        switch($this->method()){
            case 'PUT';
            case 'PATCH';

                break;
        }
        return $rules;
    }
}
