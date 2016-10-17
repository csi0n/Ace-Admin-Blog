<?php

namespace App\Http\Requests\Admin\Blog;

use App\Http\Requests\Admin\Ext\BaseRequest;

class ArticleRequest extends BaseRequest
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
            'title'=>'required',
            'cate_id'=>'required',
            'sort'=>'required|numeric',
        ];
    }

    public function attributes()
    {
        return [
            'id'            => trans('labels.blog.article.id'),
            'title'          => trans('labels.blog.article.title'),
            'content_md'          => trans('labels.blog.article.content'),
            'sort'   => trans('labels.blog.article.sort'),
        ];
    }
}
