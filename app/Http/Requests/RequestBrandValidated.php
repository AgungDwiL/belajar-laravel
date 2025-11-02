<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestBrandValidated extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'brandName'   => 'required|max:255',
            'brandImage'  => $this->isMethod('post')
                        ? 'required|image|mimes:jpg,jpeg,png|max:2048'
                        : 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ];
    }
}
