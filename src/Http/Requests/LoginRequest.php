<?php

namespace Pshenichniyinfo\AdminPanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->guest();
    }

    public function rules(): array
    {
        return [
            'email' => 'required|string|exists:users',
            'password' => 'required|string',
        ];
    }
}
