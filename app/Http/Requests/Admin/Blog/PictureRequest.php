<?php

namespace App\Http\Requests\Admin\Blog;

use App\Http\Requests\Request;

class PictureRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file'=>'required|image',
        ];
    }
}
