<?php

namespace App\Http\Requests\Transaksi;

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
            'barang_id' => 'required|exists:barangs,id',
            'user_id' => 'required|exists:users,id',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date',
            'file' => 'required|file|mimes:pdf|max:2048',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'barang_id.required' => 'Barang harus dipilih',
            'barang_id.exists' => 'Barang tidak ditemukan',
            'user_id.required' => 'User harus dipilih',
            'user_id.exists' => 'User tidak ditemukan',
            'tanggal_peminjaman.required' => 'Tanggal peminjaman harus diisi',
            'tanggal_peminjaman.date' => 'Tanggal peminjaman harus berupa tanggal',
            'tanggal_pengembalian.required' => 'Tanggal pengembalian harus diisi',
            'tanggal_pengembalian.date' => 'Tanggal pengembalian harus berupa tanggal',
            'file.required' => 'File harus diupload',
            'file.file' => 'File harus berupa file',
            'file.mimes' => 'File harus berupa pdf',
            'file.max' => 'File maksimal 2MB',
            'jumlah.required' => 'Jumlah harus diisi',
            'jumlah.integer' => 'Jumlah harus berupa angka',
            'jumlah.min' => 'Jumlah minimal 1',
            'keterangan.string' => 'Keterangan harus berupa teks',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'barang_id' => $this->route('barang_id')
        ]);
    }
}
