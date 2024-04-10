<?php

namespace Pshenichniyinfo\AdminPanel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->hasRole('super-admin');
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'permissions' => 'required|array',
            'permissions.*' => 'required|integer|exists:permissions,id',
        ];
    }
}
