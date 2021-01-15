<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'name_ar'=>'required',
                'name_en'=>'required',
                // 'icon'=>'required|mimes:jpeg,bmp,png,jpg',
                'meta_tags'=>'required'
            ];
        }
        case 'PUT':
        {
            return [
                'name_ar'=>'required',
                'name_en'=>'required',
                // 'icon'=>'mimes:jpeg,bmp,png,jpg',
                'meta_tags'=>'required'
            ];
        }
        case 'PATCH':

        }

    }
}
