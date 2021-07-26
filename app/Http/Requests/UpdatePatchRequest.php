<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdatePatchRequest extends FormRequest
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
        return [
            'title' => 'required|string|between:5,100',
            'preview' => 'required|string|max:255',
            'body' => 'required|string',
            'slug' => 'required|regex:/^[a-zA-Z0-9_-]+$/u|unique:articles,slug,' . $this->route()->parameter('article')->id,
            'published' => 'in:on',
        ];
    }
}
