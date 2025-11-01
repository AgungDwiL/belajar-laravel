<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProductValidated extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'productName'   => 'required|max:255',
            'idBrand'       => 'required',
            'productImage'  => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ];
    }
}
