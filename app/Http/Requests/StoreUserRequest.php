<?php

namespace App\Http\Requests;

use App\User;
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
        return [
            User::create(
                request()->validate([
                    'name' => 'required|min:3',
                    'email' => 'required|email',
                    'password' => 'required',
                    'role_id' => 'required'
                ])
            )
        ];
    }
}
