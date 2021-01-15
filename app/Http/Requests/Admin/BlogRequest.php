<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                {
                 return array();
            }
            case 'POST':
            {
                return [
                    'title_ar'=>'required',
                    'title_en'=>'required',
                    'content_ar'=>'required',
                    'content_en'=>'required',
                    'url'=>'required',
                    'image'=>'required|mimes:jpeg,bmp,png,jpg'
                ];
            }
            case 'PUT':
            {
                return [
                    'title_ar'=>'required',
                    'title_en'=>'required',
                    'content_ar'=>'required',
                    'content_en'=>'required',
                    'url'=>'required',
                    'image'=>'mimes:jpeg,bmp,png,jpg'
                ];
            }
            case 'PATCH':

        }
    }
}
