<?php

namespace App\Http\Requests\Admin\Transaksi;

use Illuminate\Foundation\Http\FormRequest;

class updateStatusPermintaanRequest extends FormRequest
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
            'status' => 'required|in:accepted,rejected',
            'catatan' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'Status harus diisi',
            'status.in' => 'Status harus diisi dengan accepted atau rejected',
            'catatan.required' => 'Catatan harus diisi',
            'catatan.string' => 'Catatan harus berupa string'
        ];
    }
}
