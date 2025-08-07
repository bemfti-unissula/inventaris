import { Head, Link, useForm } from '@inertiajs/react';
import { FormEventHandler, useState } from 'react';
import AppLayout from '@/Layouts/AppLayout';
import { BarangCreateProps } from '@/types';

export default function Create({ auth, kategoris }: BarangCreateProps) {
    const { data, setData, post, processing, errors, reset } = useForm({
        nama_barang: '',
        deskripsi: '',
        kategori: '',
        stok: '',
        gambar: null as File | null,
    });

    const [imagePreview, setImagePreview] = useState<string | null>(null);

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        
        const formData = new FormData();
        formData.append('nama_barang', data.nama_barang);
        formData.append('deskripsi', data.deskripsi);
        formData.append('kategori', data.kategori);
        formData.append('stok', data.stok);
        if (data.gambar) {
            formData.append('gambar', data.gambar);
        }

        post(route('admin.barang.store'), {
            forceFormData: true,
            onSuccess: () => reset(),
        });
    };

    const handleImageChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        const file = e.target.files?.[0];
        if (file) {
            setData('gambar', file);
            const reader = new FileReader();
            reader.onload = (e) => {
                setImagePreview(e.target?.result as string);
            };
            reader.readAsDataURL(file);
        }
    };

    return (
        <AppLayout
            header={
                <div className="flex justify-between items-center">
                    <h2 className="font-semibold text-xl text-white leading-tight">
                        Tambah Barang Baru
                    </h2>
                    <Link
                        href={route('admin.barang.index')}
                        className="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg transition duration-150 ease-in-out"
                    >
                        Kembali
                    </Link>
                </div>
            }
        >
            <Head title="Tambah Barang" />

            <div className="py-12">
                <div className="max-w-4xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-black/50 backdrop-blur-sm border border-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                        <div className="p-6">
                            <form onSubmit={submit} className="space-y-6">
                                {/* Nama Barang */}
                                <div>
                                    <label htmlFor="nama_barang" className="block text-sm font-medium text-gray-300 mb-2">
                                        Nama Barang *
                                    </label>
                                    <input
                                        id="nama_barang"
                                        type="text"
                                        value={data.nama_barang}
                                        onChange={(e) => setData('nama_barang', e.target.value)}
                                        className="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="Masukkan nama barang"
                                        required
                                    />
                                    {errors.nama_barang && (
                                        <p className="mt-1 text-sm text-red-400">{errors.nama_barang}</p>
                                    )}
                                </div>

                                {/* Deskripsi */}
                                <div>
                                    <label htmlFor="deskripsi" className="block text-sm font-medium text-gray-300 mb-2">
                                        Deskripsi *
                                    </label>
                                    <textarea
                                        id="deskripsi"
                                        value={data.deskripsi}
                                        onChange={(e) => setData('deskripsi', e.target.value)}
                                        rows={4}
                                        className="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="Masukkan deskripsi barang"
                                        required
                                    />
                                    {errors.deskripsi && (
                                        <p className="mt-1 text-sm text-red-400">{errors.deskripsi}</p>
                                    )}
                                </div>

                                {/* Kategori */}
                                <div>
                                    <label htmlFor="kategori" className="block text-sm font-medium text-gray-300 mb-2">
                                        Kategori *
                                    </label>
                                    <select
                                        id="kategori"
                                        value={data.kategori}
                                        onChange={(e) => setData('kategori', e.target.value)}
                                        className="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        required
                                    >
                                        <option value="">Pilih Kategori</option>
                                        {kategoris.map((kat) => (
                                            <option key={kat} value={kat}>{kat}</option>
                                        ))}
                                    </select>
                                    {errors.kategori && (
                                        <p className="mt-1 text-sm text-red-400">{errors.kategori}</p>
                                    )}
                                </div>

                                {/* Stok */}
                                <div>
                                    <label htmlFor="stok" className="block text-sm font-medium text-gray-300 mb-2">
                                        Stok *
                                    </label>
                                    <input
                                        id="stok"
                                        type="number"
                                        min="0"
                                        value={data.stok}
                                        onChange={(e) => setData('stok', e.target.value)}
                                        className="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="Masukkan jumlah stok"
                                        required
                                    />
                                    {errors.stok && (
                                        <p className="mt-1 text-sm text-red-400">{errors.stok}</p>
                                    )}
                                </div>

                                {/* Gambar */}
                                <div>
                                    <label htmlFor="gambar" className="block text-sm font-medium text-gray-300 mb-2">
                                        Gambar Barang
                                    </label>
                                    <div className="flex items-center space-x-6">
                                        <div className="shrink-0">
                                            {imagePreview ? (
                                                <img
                                                    className="h-32 w-32 object-cover rounded-lg border border-gray-700"
                                                    src={imagePreview}
                                                    alt="Preview"
                                                />
                                            ) : (
                                                <div className="h-32 w-32 bg-gray-800 border border-gray-700 rounded-lg flex items-center justify-center">
                                                    <svg className="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            )}
                                        </div>
                                        <div className="flex-1">
                                            <input
                                                id="gambar"
                                                type="file"
                                                accept="image/*"
                                                onChange={handleImageChange}
                                                className="w-full px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            />
                                            <p className="mt-1 text-sm text-gray-400">
                                                PNG, JPG, GIF hingga 2MB
                                            </p>
                                        </div>
                                    </div>
                                    {errors.gambar && (
                                        <p className="mt-1 text-sm text-red-400">{errors.gambar}</p>
                                    )}
                                </div>

                                {/* Submit Button */}
                                <div className="flex items-center justify-end space-x-4 pt-6">
                                    <Link
                                        href={route('admin.barang.index')}
                                        className="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg transition duration-150 ease-in-out"
                                    >
                                        Batal
                                    </Link>
                                    <button
                                        type="submit"
                                        disabled={processing}
                                        className="bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 text-white font-bold py-2 px-6 rounded-lg transition duration-150 ease-in-out flex items-center"
                                    >
                                        {processing && (
                                            <svg className="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle className="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" strokeWidth="4"></circle>
                                                <path className="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                        )}
                                        {processing ? 'Menyimpan...' : 'Simpan Barang'}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}