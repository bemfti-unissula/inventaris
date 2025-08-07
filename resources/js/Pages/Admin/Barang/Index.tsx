import { Head, Link, router } from '@inertiajs/react';
import { useState, useEffect } from 'react';
import AppLayout from '@/Layouts/AppLayout';
import { BarangIndexProps, Barang } from '@/types';
import {
    MagnifyingGlassIcon,
    FunnelIcon,
    CubeIcon,
    PlusIcon,
    PencilIcon,
    TrashIcon,
    EyeIcon,
    SparklesIcon,
    TagIcon,
    CheckCircleIcon,
    XCircleIcon,
    ChartBarIcon,
    ClockIcon,
    ChevronLeftIcon,
    ChevronRightIcon,
    ExclamationTriangleIcon,
} from '@heroicons/react/24/outline';
import { motion } from 'framer-motion';

export default function Index({ auth, barangs, currentFilters, kategoris }: BarangIndexProps) {
    const [searchTerm, setSearchTerm] = useState(currentFilters.search || '');
    const [selectedKategori, setSelectedKategori] = useState(currentFilters.kategori || '');
    const [isVisible, setIsVisible] = useState(false);
    const [hoveredCard, setHoveredCard] = useState<string | null>(null);
    const [showDeleteModal, setShowDeleteModal] = useState<{ id: string; nama: string } | null>(null);
    
    useEffect(() => {
        const timer = setTimeout(() => setIsVisible(true), 100);
        return () => clearTimeout(timer);
    }, []);

    const handleSearch = (e: React.FormEvent) => {
        e.preventDefault();
        router.get(route('admin.barang.index'), {
            search: searchTerm,
            kategori: selectedKategori,
        }, {
            preserveState: true,
            replace: true,
        });
    };

    const handleDelete = (id: string, nama: string) => {
        setShowDeleteModal({ id, nama });
    };
    
    const confirmDelete = () => {
        if (showDeleteModal) {
            router.delete(route('admin.barang.destroy', showDeleteModal.id));
            setShowDeleteModal(null);
        }
    };
    
    const cancelDelete = () => {
        setShowDeleteModal(null);
    };

    const getImageUrl = (gambar: Barang['gambar']) => {
        if (!gambar) return '/images/no-image.png';
        if (typeof gambar === 'string') return gambar;
        return gambar.url;
    };

    return (
        <AppLayout
            header={
                <div className={`transition-all duration-1000 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-4'}`}>
                    <div className="relative overflow-hidden">
                        {/* Animated background elements */}
                        <div className="absolute inset-0 overflow-hidden">
                            <div className="absolute -top-10 -right-10 w-32 h-32 bg-gradient-radial from-primary-red/10 to-transparent rounded-full animate-float" />
                            <div className="absolute -bottom-10 -left-10 w-24 h-24 bg-gradient-radial from-primary-yellow/10 to-transparent rounded-full animate-float" style={{ animationDelay: '2s' }} />
                        </div>
                        
                        <div className="relative flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                            <div className="flex items-center space-x-4">
                                <motion.div
                                    initial={{ scale: 0, rotate: -180 }}
                                    animate={{ scale: 1, rotate: 0 }}
                                    transition={{ duration: 0.6, type: "spring" }}
                                    whileHover={{ scale: 1.1 }}
                                >
                                    <div className="w-14 h-14 bg-gradient-to-br from-primary-red to-primary-yellow rounded-2xl flex items-center justify-center shadow-xl shadow-primary-red/30 animate-shimmer">
                                        <CubeIcon className="w-7 h-7 text-white" />
                                    </div>
                                </motion.div>
                                <div>
                                    <div className="flex items-center space-x-3">
                                        <motion.h1 
                                            className="text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-white dark:to-gray-200 bg-clip-text text-transparent font-superline"
                                            initial={{ opacity: 0, x: -20 }}
                                            animate={{ opacity: 1, x: 0 }}
                                            transition={{ delay: 0.3, duration: 0.6 }}
                                        >
                                            Kelola Inventaris
                                        </motion.h1>
                                        <div className="flex items-center space-x-1 px-3 py-1 bg-gradient-to-r from-green-500/10 to-emerald-500/10 rounded-full border border-green-500/20">
                                            <div className="w-2 h-2 bg-green-500 rounded-full animate-pulse" />
                                            <span className="text-xs font-semibold text-green-600 dark:text-green-400">Live</span>
                                        </div>
                                    </div>
                                    <p className="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                        Kelola dan pantau semua inventaris dengan mudah • Total {barangs.total} barang
                                    </p>
                                </div>
                            </div>
                            
                            <div className="flex items-center space-x-3">
                                {/* Quick Stats */}
                                <div className="hidden sm:flex items-center space-x-4 mr-4">
                                    <div className="text-center">
                                        <div className="text-lg font-bold text-green-600 dark:text-green-400">
                                            {barangs.data.filter(item => item.stok > 0).length}
                                        </div>
                                        <div className="text-xs text-gray-500 dark:text-gray-400">Tersedia</div>
                                    </div>
                                    <div className="text-center">
                                        <div className="text-lg font-bold text-red-600 dark:text-red-400">
                                            {barangs.data.filter(item => item.stok === 0).length}
                                        </div>
                                        <div className="text-xs text-gray-500 dark:text-gray-400">Habis</div>
                                    </div>
                                </div>
                                
                                <Link
                                    href={route('admin.barang.create')}
                                    className="group relative overflow-hidden bg-gradient-to-r from-primary-red to-primary-yellow hover:from-primary-red/90 hover:to-primary-yellow/90 text-white font-bold py-3 px-6 rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-primary-red/30 flex items-center space-x-2"
                                >
                                    <div className="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
                                    <PlusIcon className="w-5 h-5 transition-transform duration-300 group-hover:rotate-90" />
                                    <span className="relative">Tambah Barang</span>
                                    <SparklesIcon className="w-4 h-4 opacity-0 group-hover:opacity-100 transition-all duration-300 group-hover:rotate-12" />
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            }
        >
            <Head title="Kelola Inventaris" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {/* Search and Filter */}
                    <div className={`mb-8 transition-all duration-700 delay-200 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'}`}>
                        <div className="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-3xl p-6 shadow-xl border border-gray-200/50 dark:border-gray-700/50">
                            <form onSubmit={handleSearch} className="flex flex-col lg:flex-row gap-4">
                                {/* Search Input */}
                                <div className="flex-1 relative group">
                                    <div className="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <MagnifyingGlassIcon className="h-5 w-5 text-gray-400 group-focus-within:text-primary-red dark:group-focus-within:text-primary-yellow transition-colors duration-300" />
                                    </div>
                                    <input
                                        type="text"
                                        placeholder="Cari barang berdasarkan nama, kategori, atau deskripsi..."
                                        value={searchTerm}
                                        onChange={(e) => setSearchTerm(e.target.value)}
                                        className="w-full pl-12 pr-4 py-4 bg-gradient-to-r from-gray-50 to-white dark:from-gray-700 dark:to-gray-600 border-2 border-gray-200 dark:border-gray-600 rounded-2xl focus:ring-4 focus:ring-primary-red/20 dark:focus:ring-primary-yellow/20 focus:border-primary-red dark:focus:border-primary-yellow text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 transition-all duration-300 hover:shadow-lg focus:shadow-xl"
                                    />
                                    <div className="absolute inset-0 rounded-2xl bg-gradient-to-r from-primary-red/5 to-primary-yellow/5 opacity-0 group-focus-within:opacity-100 transition-opacity duration-300 pointer-events-none" />
                                </div>
                                
                                {/* Category Filter */}
                                <div className="lg:w-64 relative group">
                                    <div className="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <FunnelIcon className="h-5 w-5 text-gray-400 group-focus-within:text-primary-red dark:group-focus-within:text-primary-yellow transition-colors duration-300" />
                                    </div>
                                    <select
                                        value={selectedKategori}
                                        onChange={(e) => setSelectedKategori(e.target.value)}
                                        className="w-full pl-12 pr-4 py-4 bg-gradient-to-r from-gray-50 to-white dark:from-gray-700 dark:to-gray-600 border-2 border-gray-200 dark:border-gray-600 rounded-2xl focus:ring-4 focus:ring-primary-red/20 dark:focus:ring-primary-yellow/20 focus:border-primary-red dark:focus:border-primary-yellow text-gray-900 dark:text-white transition-all duration-300 hover:shadow-lg focus:shadow-xl appearance-none cursor-pointer"
                                    >
                                        <option value="">Semua Kategori</option>
                                        {kategoris.map((kat) => (
                                            <option key={kat} value={kat}>{kat}</option>
                                        ))}
                                    </select>
                                    <div className="absolute inset-0 rounded-2xl bg-gradient-to-r from-primary-red/5 to-primary-yellow/5 opacity-0 group-focus-within:opacity-100 transition-opacity duration-300 pointer-events-none" />
                                </div>
                                
                                {/* Search Button */}
                                <button
                                    type="submit"
                                    className="group relative overflow-hidden bg-gradient-to-r from-primary-red to-primary-yellow hover:from-primary-red/90 hover:to-primary-yellow/90 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-primary-red/30 flex items-center justify-center space-x-2 min-w-[140px]"
                                >
                                    <div className="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
                                    <MagnifyingGlassIcon className="w-5 h-5 transition-transform duration-300 group-hover:scale-110" />
                                    <span className="relative font-semibold">Cari</span>
                                    <SparklesIcon className="w-4 h-4 opacity-0 group-hover:opacity-100 transition-all duration-300 group-hover:rotate-12" />
                                </button>
                            </form>
                        </div>
                    </div>

                    {/* Results Info */}
                    {(searchTerm || selectedKategori) && (
                        <div className={`mb-8 transition-all duration-700 delay-300 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'}`}>
                            <div className="relative overflow-hidden bg-gradient-to-r from-blue-50 via-indigo-50 to-purple-50 dark:from-blue-900/20 dark:via-indigo-900/20 dark:to-purple-900/20 border-2 border-blue-200/50 dark:border-blue-700/50 rounded-2xl p-6 shadow-lg">
                                {/* Animated background elements */}
                                <div className="absolute top-0 right-0 w-32 h-32 bg-gradient-radial from-blue-400/10 to-transparent rounded-full animate-float" />
                                <div className="absolute bottom-0 left-0 w-24 h-24 bg-gradient-radial from-purple-400/10 to-transparent rounded-full animate-float" style={{ animationDelay: '1s' }} />
                                
                                <div className="relative flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                                    <div className="flex items-start space-x-4">
                                        <div className="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                                            <CubeIcon className="w-6 h-6 text-white" />
                                        </div>
                                        <div className="flex-1">
                                            <div className="flex items-center space-x-2 mb-2">
                                                <h3 className="text-lg font-bold text-blue-800 dark:text-blue-200">Hasil Pencarian</h3>
                                                <div className="px-3 py-1 bg-blue-500/10 rounded-full border border-blue-500/20">
                                                    <span className="text-sm font-semibold text-blue-600 dark:text-blue-400">{barangs.data.length} dari {barangs.total}</span>
                                                </div>
                                            </div>
                                            <div className="space-y-1">
                                                {searchTerm && (
                                                    <div className="flex items-center space-x-2 text-sm text-blue-700 dark:text-blue-300">
                                                        <MagnifyingGlassIcon className="w-4 h-4" />
                                                        <span>Pencarian: <span className="font-semibold">"{searchTerm}"</span></span>
                                                    </div>
                                                )}
                                                {selectedKategori && (
                                                    <div className="flex items-center space-x-2 text-sm text-blue-700 dark:text-blue-300">
                                                        <TagIcon className="w-4 h-4" />
                                                        <span>Kategori: <span className="font-semibold">{selectedKategori}</span></span>
                                                    </div>
                                                )}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {/* Quick Stats */}
                                    <div className="flex items-center space-x-6">
                                        <div className="text-center">
                                            <div className="flex items-center justify-center space-x-1">
                                                <CheckCircleIcon className="w-5 h-5 text-green-500" />
                                                <span className="text-xl font-bold text-green-600 dark:text-green-400">
                                                    {barangs.data.filter(item => item.stok > 0).length}
                                                </span>
                                            </div>
                                            <div className="text-xs text-gray-600 dark:text-gray-400 font-medium">Tersedia</div>
                                        </div>
                                        <div className="text-center">
                                            <div className="flex items-center justify-center space-x-1">
                                                <XCircleIcon className="w-5 h-5 text-red-500" />
                                                <span className="text-xl font-bold text-red-600 dark:text-red-400">
                                                    {barangs.data.filter(item => item.stok === 0).length}
                                                </span>
                                            </div>
                                            <div className="text-xs text-gray-600 dark:text-gray-400 font-medium">Habis</div>
                                        </div>
                                        <div className="text-center">
                                            <div className="flex items-center justify-center space-x-1">
                                                <ChartBarIcon className="w-5 h-5 text-blue-500" />
                                                <span className="text-xl font-bold text-blue-600 dark:text-blue-400">
                                                    {barangs.data.reduce((sum, item) => sum + (item.total_dipinjam || 0), 0)}
                                                </span>
                                            </div>
                                            <div className="text-xs text-gray-600 dark:text-gray-400 font-medium">Dipinjam</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    )}

                    {/* Items Grid */}
                    <div className={`transition-all duration-700 delay-400 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'}`}>
                        {barangs.data.length > 0 ? (
                            <>
                                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                                    {barangs.data.map((barang, index) => (
                                        <div
                                            key={barang._id}
                                            className={`group relative bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm rounded-3xl shadow-xl hover:shadow-2xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden transition-all duration-500 hover:scale-105 hover:-translate-y-2 animate-shimmer`}
                                            style={{ animationDelay: `${index * 100}ms` }}
                                            onMouseEnter={() => setHoveredCard(barang._id)}
                                            onMouseLeave={() => setHoveredCard(null)}
                                        >
                                            {/* Animated background gradient */}
                                            <div className="absolute inset-0 bg-gradient-to-br from-primary-red/5 via-transparent to-primary-yellow/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500" />
                                            
                                            {/* Image Container */}
                                            <div className="relative overflow-hidden">
                                                <img
                                                    src={getImageUrl(barang.gambar)}
                                                    alt={barang.nama_barang}
                                                    className="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-110"
                                                />
                                                <div className="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
                                                
                                                {/* Status Badge */}
                                                <div className="absolute top-4 left-4">
                                                    <div className={`flex items-center space-x-1 px-3 py-1 rounded-full backdrop-blur-sm border ${
                                                        barang.stok > 0
                                                            ? 'bg-green-500/20 border-green-500/30 text-green-700 dark:text-green-300'
                                                            : 'bg-red-500/20 border-red-500/30 text-red-700 dark:text-red-300'
                                                    }`}>
                                                        {barang.stok > 0 ? (
                                                            <CheckCircleIcon className="w-4 h-4" />
                                                        ) : (
                                                            <XCircleIcon className="w-4 h-4" />
                                                        )}
                                                        <span className="text-xs font-semibold">
                                                            {barang.stok > 0 ? 'Tersedia' : 'Habis'}
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                {/* Quick Actions */}
                                                <div className={`absolute top-4 right-4 flex space-x-2 transition-all duration-300 ${
                                                    hoveredCard === barang._id ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-4'
                                                }`}>
                                                    <button className="w-8 h-8 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/30 transition-colors duration-200">
                                                        <EyeIcon className="w-4 h-4 text-white" />
                                                    </button>
                                                </div>
                                            </div>
                                            
                                            {/* Content */}
                                            <div className="p-6 relative">
                                                <div className="flex items-start justify-between mb-3">
                                                    <div className="flex-1">
                                                        <h3 className="font-bold text-lg text-gray-900 dark:text-white mb-1 group-hover:text-primary-red dark:group-hover:text-primary-yellow transition-colors duration-300">
                                                            {barang.nama_barang}
                                                        </h3>
                                                        <div className="flex items-center space-x-1 text-sm text-gray-600 dark:text-gray-400">
                                                            <TagIcon className="w-4 h-4" />
                                                            <span>{barang.kategori}</span>
                                                        </div>
                                                    </div>
                                                    <SparklesIcon className={`w-5 h-5 text-primary-yellow transition-all duration-300 ${
                                                        hoveredCard === barang._id ? 'opacity-100 rotate-12' : 'opacity-0'
                                                    }`} />
                                                </div>
                                                
                                                <p className="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                                                    {barang.deskripsi}
                                                </p>
                                                
                                                {/* Stats */}
                                                <div className="grid grid-cols-2 gap-4 mb-6">
                                                    <div className="text-center p-3 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-xl border border-blue-200/50 dark:border-blue-700/50">
                                                        <div className="text-lg font-bold text-blue-600 dark:text-blue-400">{barang.stok}</div>
                                                        <div className="text-xs text-gray-600 dark:text-gray-400 font-medium">Stok</div>
                                                    </div>
                                                    <div className="text-center p-3 bg-gradient-to-br from-orange-50 to-yellow-50 dark:from-orange-900/20 dark:to-yellow-900/20 rounded-xl border border-orange-200/50 dark:border-orange-700/50">
                                                        <div className="text-lg font-bold text-orange-600 dark:text-orange-400">{(barang.total_dimiliki || 0) - barang.stok}</div>
                                                        <div className="text-xs text-gray-600 dark:text-gray-400 font-medium">Dipinjam</div>
                                                    </div>
                                                </div>
                                                
                                                {/* Availability Progress */}
                                                <div className="mb-6">
                                                    <div className="flex justify-between items-center mb-2">
                                                        <span className="text-xs font-medium text-gray-600 dark:text-gray-400">Ketersediaan</span>
                                                        <span className="text-xs font-bold text-gray-800 dark:text-gray-200">
                                                            {Math.round((barang.stok / (barang.total_dimiliki || barang.stok)) * 100) || 0}%
                                                        </span>
                                                    </div>
                                                    <div className="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 overflow-hidden">
                                                        <div 
                                                            className="h-full bg-gradient-to-r from-green-500 to-emerald-500 rounded-full transition-all duration-1000 ease-out"
                                                            style={{ 
                                                                width: `${Math.round((barang.stok / (barang.total_dimiliki || barang.stok)) * 100) || 0}%`,
                                                                animationDelay: `${index * 200}ms`
                                                            }}
                                                        />
                                                    </div>
                                                </div>
                                                
                                                {/* Action Buttons */}
                                                <div className="flex gap-3">
                                                    <Link
                                                        href={route('admin.barang.edit', barang._id)}
                                                        className="group/btn flex-1 relative overflow-hidden bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg flex items-center justify-center space-x-2"
                                                    >
                                                        <div className="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300" />
                                                        <PencilIcon className="w-4 h-4 transition-transform duration-300 group-hover/btn:rotate-12" />
                                                        <span className="relative text-sm">Edit</span>
                                                    </Link>
                                                    <button
                                                        onClick={() => handleDelete(barang._id, barang.nama_barang)}
                                                        className="group/btn relative overflow-hidden bg-gradient-to-r from-red-500 to-pink-600 hover:from-red-600 hover:to-pink-700 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg flex items-center justify-center"
                                                    >
                                                        <div className="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300" />
                                                        <TrashIcon className="w-4 h-4 transition-transform duration-300 group-hover/btn:scale-110" />
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    ))}
                                </div>

                                {/* Pagination */}
                                {barangs.last_page > 1 && (
                                    <div className={`mt-8 transition-all duration-700 delay-500 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'}`}>
                                        <div className="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50 dark:border-gray-700/50">
                                            <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                                {/* Page Info */}
                                                <div className="flex items-center space-x-2 text-sm text-gray-600 dark:text-gray-400">
                                                    <CubeIcon className="w-4 h-4" />
                                                    <span>
                                                        Menampilkan <span className="font-semibold text-gray-900 dark:text-white">{barangs.from || 0}</span> - 
                                                        <span className="font-semibold text-gray-900 dark:text-white">{barangs.to || 0}</span> dari 
                                                        <span className="font-semibold text-gray-900 dark:text-white">{barangs.total}</span> barang
                                                    </span>
                                                </div>
                                                
                                                {/* Pagination Links */}
                                                <nav className="flex items-center space-x-1">
                                                    {barangs.links.map((link, index) => {
                                                        const isFirst = index === 0;
                                                        const isLast = index === barangs.links.length - 1;
                                                        const isActive = link.active;
                                                        const isDisabled = !link.url;
                                                        
                                                        return (
                                                            <Link
                                                                key={index}
                                                                href={link.url || '#'}
                                                                className={`group relative overflow-hidden flex items-center justify-center min-w-[40px] h-10 text-sm font-semibold rounded-xl transition-all duration-300 ${
                                                                    isActive
                                                                        ? 'bg-gradient-to-r from-primary-red to-primary-yellow text-white shadow-lg scale-110'
                                                                        : isDisabled
                                                                        ? 'bg-gray-100 dark:bg-gray-700 text-gray-400 dark:text-gray-500 cursor-not-allowed'
                                                                        : 'bg-gray-50 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-primary-red/10 hover:to-primary-yellow/10 hover:text-primary-red dark:hover:text-primary-yellow hover:scale-105 hover:shadow-md'
                                                                } ${(isFirst || isLast) ? 'px-3' : 'px-2'}`}
                                                                preserveState
                                                            >
                                                                {isActive && (
                                                                    <div className="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-100" />
                                                                )}
                                                                
                                                                {isFirst ? (
                                                                    <div className="flex items-center space-x-1">
                                                                        <ChevronLeftIcon className="w-4 h-4" />
                                                                        <span className="hidden sm:inline">Prev</span>
                                                                    </div>
                                                                ) : isLast ? (
                                                                    <div className="flex items-center space-x-1">
                                                                        <span className="hidden sm:inline">Next</span>
                                                                        <ChevronRightIcon className="w-4 h-4" />
                                                                    </div>
                                                                ) : (
                                                                    <span className="relative" dangerouslySetInnerHTML={{ __html: link.label }} />
                                                                )}
                                                            </Link>
                                                        );
                                                    })}
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                )}
                            </>
                        ) : (
                            <div className="bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm rounded-3xl p-12 shadow-xl border border-gray-200/50 dark:border-gray-700/50 text-center">
                                <div className="w-24 h-24 bg-gradient-to-br from-gray-400 to-gray-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                                    <CubeIcon className="w-12 h-12 text-white" />
                                </div>
                                <h3 className="text-xl font-bold text-gray-700 dark:text-gray-300 mb-2">Tidak Ada Barang</h3>
                                <p className="text-gray-500 dark:text-gray-400 mb-6">
                                    {searchTerm || selectedKategori ? 'Tidak ada barang yang sesuai dengan pencarian.' : 'Belum ada barang yang sesuai dengan kriteria pencarian Anda.'}
                                </p>
                                <Link
                                    href={route('admin.barang.create')}
                                    className="inline-flex items-center space-x-2 bg-gradient-to-r from-primary-red to-primary-yellow hover:from-primary-red/90 hover:to-primary-yellow/90 text-white font-bold py-3 px-6 rounded-2xl transition-all duration-300 hover:scale-105 hover:shadow-xl"
                                >
                                    <PlusIcon className="w-5 h-5" />
                                    <span>Tambah Barang Pertama</span>
                                </Link>
                            </div>
                        )}
                    </div>
                </div>
            </div>

            {/* Delete Confirmation Modal */}
            {showDeleteModal && (
                <div className="fixed inset-0 z-50 overflow-y-auto">
                    <div className="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        {/* Background overlay */}
                        <div 
                            className="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity duration-300"
                            onClick={cancelDelete}
                        />
                        
                        {/* Modal */}
                        <div className="inline-block align-bottom bg-white dark:bg-gray-800 rounded-3xl px-6 pt-6 pb-6 text-left overflow-hidden shadow-2xl transform transition-all duration-300 sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-200/50 dark:border-gray-700/50">
                            {/* Animated background elements */}
                            <div className="absolute top-0 right-0 w-32 h-32 bg-gradient-radial from-red-400/10 to-transparent rounded-full animate-float" />
                            <div className="absolute bottom-0 left-0 w-24 h-24 bg-gradient-radial from-orange-400/10 to-transparent rounded-full animate-float" style={{ animationDelay: '1s' }} />
                            
                            <div className="relative">
                                {/* Icon */}
                                <div className="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-gradient-to-br from-red-500 to-pink-600 shadow-xl mb-6">
                                    <ExclamationTriangleIcon className="h-8 w-8 text-white" />
                                </div>
                                
                                {/* Content */}
                                <div className="text-center">
                                    <h3 className="text-xl font-bold text-gray-900 dark:text-white mb-2">
                                        Konfirmasi Hapus Barang
                                    </h3>
                                    <div className="mb-6">
                                        <p className="text-gray-600 dark:text-gray-400 mb-3">
                                            Apakah Anda yakin ingin menghapus barang:
                                        </p>
                                        <div className="bg-gradient-to-r from-red-50 to-pink-50 dark:from-red-900/20 dark:to-pink-900/20 border-2 border-red-200/50 dark:border-red-700/50 rounded-xl p-4">
                                            <p className="font-bold text-red-800 dark:text-red-200 text-lg">
                                                {showDeleteModal.nama}
                                            </p>
                                        </div>
                                        <p className="text-sm text-gray-500 dark:text-gray-400 mt-3">
                                            Tindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait barang ini.
                                        </p>
                                    </div>
                                </div>
                                
                                {/* Actions */}
                                <div className="flex flex-col sm:flex-row gap-3">
                                    <button
                                        type="button"
                                        onClick={cancelDelete}
                                        className="group relative overflow-hidden flex-1 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 hover:from-gray-200 hover:to-gray-300 dark:hover:from-gray-600 dark:hover:to-gray-500 text-gray-700 dark:text-gray-300 font-semibold py-3 px-6 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg flex items-center justify-center space-x-2"
                                    >
                                        <div className="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
                                        <XCircleIcon className="w-5 h-5" />
                                        <span className="relative">Batal</span>
                                    </button>
                                    <button
                                        type="button"
                                        onClick={confirmDelete}
                                        className="group relative overflow-hidden flex-1 bg-gradient-to-r from-red-500 to-pink-600 hover:from-red-600 hover:to-pink-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-xl hover:shadow-red-500/30 flex items-center justify-center space-x-2"
                                    >
                                        <div className="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
                                        <TrashIcon className="w-5 h-5 transition-transform duration-300 group-hover:scale-110" />
                                        <span className="relative">Ya, Hapus</span>
                                        <SparklesIcon className="w-4 h-4 opacity-0 group-hover:opacity-100 transition-all duration-300 group-hover:rotate-12" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            )}
        </AppLayout>
    );
}