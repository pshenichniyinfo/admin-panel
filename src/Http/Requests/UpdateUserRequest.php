<?php

namespace Pshenichniyinfo\AdminPanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id, 'id')],
            'password' => 'nullable|string',
            'role' => 'required|int|exists:roles,id',
        ];
    }
}
