<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Admin\Ext\BaseRequest;

class RoleRequest extends BaseRequest
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
            'id'            => trans('labels.id'),
            'name'          => trans('labels.role.name'),
            'slug'          => trans('labels.role.slug'),
            'description'   => trans('labels.role.description'),
            'status'        => trans('labels.role.status'),
        ];
    }
}
