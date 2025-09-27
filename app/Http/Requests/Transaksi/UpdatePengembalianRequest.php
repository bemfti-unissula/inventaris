<?php

namespace App\Http\Requests\transaksi;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePengembalianRequest extends FormRequest
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

        return $this->transaksi->user_id == Auth::id();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jumlah' => 'required|integer|min:1',
            'gambar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal_kembali' => 'required|date',
            'keterangan' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'jumlah.required' => 'Jumlah harus diisi.',
            'jumlah.integer' => 'Jumlah harus berupa angka.',
            'jumlah.min' => 'Jumlah minimal 1.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau svg.',
            'gambar.max' => 'Ukuran gambar maksimal 2MB.',
            'tanggal_kembali.required' => 'Tanggal kembali harus diisi.',
            'tanggal_kembali.date' => 'Tanggal kembali harus berupa tanggal.',
            'keterangan.string' => 'Keterangan harus berupa teks.',
        ];
    }
}
