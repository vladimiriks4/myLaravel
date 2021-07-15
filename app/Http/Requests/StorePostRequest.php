<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
//        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validateSlug = 'required|unique:articles|regex:/^[a-zA-Z0-9_-]+$/u';
        if ($this->method() == 'PATCH'){
            $validateSlug = 'required|regex:/^[a-zA-Z0-9_-]+$/u';
        }

        return [
            'title' => 'required|string|between:5,100',
            'preview' => 'required|string|max:255',
            'body' => 'required|string',
            'slug' => $validateSlug,
            'published' => 'in:on',
        ];
    }
}
