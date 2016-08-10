<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
            'email'     => 'required|email',
            'password'  => 'required|min:6'
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
