<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file' => 'required|mimetypes:application/xml,text/xml|max:1200000',
        ];
    }
}