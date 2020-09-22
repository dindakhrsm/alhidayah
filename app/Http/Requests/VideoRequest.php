<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class VideoRequest extends Request
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
            'judul_video' => 'required',
            'ket_video' => 'required',
           // 'imagecategory_id' => 'required',
            'video' => 'required',
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
