<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6',
            'telp'      => 'required|numeric',
            'address'   => 'required'
        ];
    }

    /**
     * @param  array  $errors
     * @return json
     */
    public function response(array $errors)
    {
        return response()->json(['status' => 'false','message' => $errors],401);
    }
}
