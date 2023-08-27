<?php

namespace Pshenichniyinfo\AdminPanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|unique:users',
            'password' => 'required|string',
        ];
    }
}
