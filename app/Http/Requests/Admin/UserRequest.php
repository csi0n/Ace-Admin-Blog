<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Admin\Ext\BaseRequest;

class UserRequest extends BaseRequest
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
            'email' => 'required|email|unique:users,email,'.$this->id,
            'password' => 'required|min:6|max:32',
            'status' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'id' => trans('labels.user.id'),
            'name' => trans('labels.user.name'),
            'email' => trans('labels.user.email'),
            'password' => trans('labels.user.password'),
            'status' => trans('labels.user.status'),
        ];
    }
}
