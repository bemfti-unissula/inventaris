<?php

namespace App\Http\Requests\Barang;

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
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string|max:100',
            'stok' => 'required|integer|min:1',
            'total_dimiliki' => 'required|integer|min:1',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'is_paid' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_barang.required' => 'Nama barang harus diisi.',
            'nama_barang.max' => 'Nama barang maksimal 255 karakter.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'kategori.required' => 'Kategori harus diisi.',
            'kategori.max' => 'Kategori maksimal 100 karakter.',
            'stok.required' => 'Stok harus diisi.',
            'stok.integer' => 'Stok harus berupa angka.',
            'stok.min' => 'Stok minimal 1.',
            'total_dimiliki.required' => 'Total dimiliki harus diisi.',
            'total_dimiliki.integer' => 'Total dimiliki harus berupa angka.',
            'total_dimiliki.min' => 'Total dimiliki minimal 1.',
            'gambar.required' => 'Gambar harus diupload.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau svg.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
            'is_paid.required' => 'Is paid harus diisi.',
            'is_paid.boolean' => 'Is paid harus berupa true atau false.',
        ];
    }
}
