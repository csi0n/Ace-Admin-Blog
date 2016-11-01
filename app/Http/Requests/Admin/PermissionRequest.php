<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Admin\Ext\BaseRequest;

class PermissionRequest extends BaseRequest
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
            'name' => 'required',
            'slug' => 'required|unique:permissions,slug,' . endSegments(),
            'description' => 'required',
            'status' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'id'            => trans('labels.permission.id'),
            'name'          => trans('labels.permission.name'),
            'slug'          => trans('labels.permission.slug'),
            'description'   => trans('labels.permission.description'),
            'status'        => trans('labels.permission.status'),
        ];
    }
}
