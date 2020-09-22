<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JadwaljumatRequest extends Request
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
            'tanggal' => 'required',
            'imam' => 'required',
            'khotib' => 'required',
            'keterangan' => 'required',
            //
        ];
        switch($this->method()){
            case 'PUT';
            case 'PATCH';
                // $rules['slug'] = 'required|unique:posts,slug,'.$this->route('blog');
                break;
        }
        return $rules;
    }
}
