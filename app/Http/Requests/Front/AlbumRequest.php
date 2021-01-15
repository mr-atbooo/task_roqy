<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>'required',
            'content'=>'required',
            'status'=>'required',
            'images.*' => 'required|mimes:jpg,jpeg,bmp,png'
        ];
    }
}
