<?php

namespace App\Http\Requests\Theme;

use Illuminate\Foundation\Http\FormRequest;

class CreateThemeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'is_premium' => 'required|boolean',
            'price' => 'required_if:is_premium,1|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => ['required', 'url', 'regex:/^https?:\/\/(?:www\.)?linkyi\.shop(?:\/|$)/i'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa string.',
            'name.max' => 'Nama maksimal 255 karakter.',
            'is_premium.required' => 'Tipe tema wajib diisi.',
            'is_premium.boolean' => 'Tipe tema tidak valid.',
            'price.required_if' => 'Harga wajib diisi jika Tema Premium.',
            'link.required' => 'Link wajib diisi.',
            'link.url' => 'Link harus berupa URL yang valid.',
            'link.regex' => 'Link harus berupa URL yang valid dengan domain linkyi.shop.',
            'thumbnail.required' => 'Thumbnail harus dilengkapi.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'thumbnail.max' => 'Ukuran gambar tidak boleh melebihi 2MB.',
        ];
    }
}
