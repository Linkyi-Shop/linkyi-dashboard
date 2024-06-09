<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password' => 'required|min:8|max:16',
            'old_password' => 'required|min:8|max:16',
        ];
    }
    public function messages(): array
    {
        return [
            'password.required' => 'Password diperlukan.',
            'password.min' => 'Password minimal harus terdiri dari 8 karakter.',
            'password.max' => 'Password tidak boleh lebih dari 16 karakter.',
            'old_password.required' => 'Password lama diperlukan.',
            'old_password.min' => 'Password lama minimal harus terdiri dari 8 karakter.',
            'old_password.max' => 'Password lama tidak boleh lebih dari 16 karakter.',
        ];
    }
}
