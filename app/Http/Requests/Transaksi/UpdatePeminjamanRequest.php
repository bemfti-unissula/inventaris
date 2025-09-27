<?php

namespace App\Http\Requests\transaksi;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePeminjamanRequest extends FormRequest
{
    public ?Transaksi $transaksi;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $this->transaksi = Transaksi::find($this->route('id'));

        if (!$this->transaksi) {
            return false;
        }

        return $this->transaksi->user_id == Auth::user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date',
            'file' => 'nullable|file|mimes:pdf|max:2048',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'tanggal_peminjaman.required' => 'Tanggal peminjaman harus diisi',
            'tanggal_peminjaman.date' => 'Tanggal peminjaman harus berupa tanggal',
            'tanggal_pengembalian.required' => 'Tanggal pengembalian harus diisi',
            'tanggal_pengembalian.date' => 'Tanggal pengembalian harus berupa tanggal',
            'file.file' => 'File harus berupa file',
            'file.mimes' => 'File harus berupa pdf',
            'file.max' => 'File maksimal 2MB',
            'jumlah.required' => 'Jumlah harus diisi',
            'jumlah.integer' => 'Jumlah harus berupa angka',
            'jumlah.min' => 'Jumlah minimal 1',
            'keterangan.string' => 'Keterangan harus berupa teks',
        ];
    }
}

