<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'user_type' => 'required|string',
        ];
        if ($this->method() == 'PUT') {
            $rules['email'] = 'required|string|email|max:255|unique:users,email,' . $this->route()->parameter('user');
            $rules['password'] = 'sometimes|string|' .config('rules.password');
        } else {
            $rules['email'] = 'required|string|email|max:255|unique:users';
            $rules['password'] = 'required|string|' .config('rules.password');
        }

        return $rules;
    }
}
