<?php

namespace App\Http\Requests\Admin\Blog;

use App\Http\Requests\Admin\Ext\BaseRequest;

class TagRequest extends BaseRequest
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
            'id' => 'numeric',
            'name'=>'required',
        ];
    }

    public function attributes()
    {
        return [
            'id'            => trans('labels.blog.tag.id'),
            'name'          => trans('labels.blog.tag.name'),
        ];
    }
}
