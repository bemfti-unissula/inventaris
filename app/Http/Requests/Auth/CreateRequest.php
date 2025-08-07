<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15',
            'fakultas' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi',
            'name.unique' => 'Nama sudah terdaftar',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'name.string' => 'Nama harus berupa string',
            'email.required' => 'Email harus diisi',
            'email.string' => 'Email harus berupa string',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter',
            'email.unique' => 'Email sudah terdaftar',
            'phone.required' => 'Nomor telepon harus diisi',
            'phone.string' => 'Nomor telepon harus berupa string',
            'phone.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter',
            'fakultas.required' => 'Fakultas harus diisi',
            'fakultas.string' => 'Fakultas harus berupa string',
            'password.required' => 'Password harus diisi',
            'password.string' => 'Password harus berupa string',
            'password.min' => 'Password harus minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'terms.required' => 'Anda harus menyetujui syarat dan ketentuan',
            'terms.accepted' => 'Anda harus menyetujui syarat dan ketentuan'
        ];
    }
}
