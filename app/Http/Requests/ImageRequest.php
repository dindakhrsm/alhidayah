<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;


class ImageRequest extends Request
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
            'judul_gambar' => 'required',
            'ket_gambar' => 'required',
            'imagecategory_id' => 'required',
            'image' => 'mimes:jpg,jpeg,bmp,png',
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
