<?php

namespace App\Http\Requests\Transaksi;

use Illuminate\Foundation\Http\FormRequest;

class ReturnRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:transaksis,id',
            'jumlah' => 'required|integer|min:1',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal_kembali' => 'required|date',
            'keterangan' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Transaksi Id harus diisi.',
            'id.exists' => 'Transaksi tidak ditemukan.',
            'jumlah.required' => 'Jumlah harus diisi.',
            'jumlah.integer' => 'Jumlah harus berupa angka.',
            'jumlah.min' => 'Jumlah minimal 1.',
            'gambar.required' => 'Gambar harus diisi.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau svg.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
            'tanggal_kembali.required' => 'Tanggal kembali harus diisi.',
            'tanggal_kembali.date' => 'Tanggal kembali harus berupa tanggal.',
            'keterangan.string' => 'Keterangan harus berupa teks.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'id' => $this->route('id')
        ]);
    }
}
