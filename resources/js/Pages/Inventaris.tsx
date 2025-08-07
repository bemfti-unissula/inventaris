import { Head, Link, router } from '@inertiajs/react';
import { useState, useEffect } from 'react';
import AppLayout from '@/Layouts/AppLayout';
import { InventarisProps, Barang } from '@/types';
import {
    MagnifyingGlassIcon,
    FunnelIcon,
    CubeIcon,
    SparklesIcon,
    EyeIcon,
    ShareIcon,
    TagIcon,
    CheckCircleIcon,
    XCircleIcon,
    ClockIcon,
    ChevronLeftIcon,
    ChevronRightIcon,
} from '@heroicons/react/24/outline';
import { motion } from 'framer-motion';

export default function Inventaris({ auth, barangs, currentFilters, kategoris }: InventarisProps) {
    const [searchTerm, setSearchTerm] = useState(currentFilters.search || '');
    const [selectedKategori, setSelectedKategori] = useState(currentFilters.kategori || '');
    const [isVisible, setIsVisible] = useState(false);

    
    useEffect(() => {
        const timer = setTimeout(() => setIsVisible(true), 100);
        return () => clearTimeout(timer);
    }, []);

    const handleSearch = (e: React.FormEvent) => {
        e.preventDefault();
        router.get(route('inventaris'), {
            search: searchTerm,
            kategori: selectedKategori,
        }, {
            preserveState: true,
            replace: true,
        });
    };

    const getImageUrl = (gambar: Barang['gambar']) => {
        if (!gambar) return '/images/no-image.png';
        if (typeof gambar === 'string') return gambar;
        return gambar.url;
    };

    // Category color mapping for gradient backgrounds and accents
    const getCategoryStyles = (kategori: string) => {
        const categoryMap: Record<string, {
            gradient: string;
            border: string;
            shadow: string;
            pattern: string;
        }> = {
            'Elektronik': {
                gradient: 'from-blue-500/10 via-cyan-500/5 to-indigo-500/10',
                border: 'border-l-4 border-blue-500',
                shadow: 'shadow-blue-500/20',
                pattern: 'bg-[radial-gradient(circle_at_1px_1px,_rgba(59,130,246,0.15)_1px,_transparent_0)] bg-[length:20px_20px]'
            },
            'Banner': {
                gradient: 'from-yellow-500/10 via-orange-500/5 to-amber-500/10',
                border: 'border-l-4 border-yellow-500',
                shadow: 'shadow-yellow-500/20',
                pattern: 'bg-[radial-gradient(circle_at_1px_1px,_rgba(245,158,11,0.15)_1px,_transparent_0)] bg-[length:20px_20px]'
            },
            'Manusia': {
                gradient: 'from-green-500/10 via-emerald-500/5 to-teal-500/10',
                border: 'border-l-4 border-green-500',
                shadow: 'shadow-green-500/20',
                pattern: 'bg-[radial-gradient(circle_at_1px_1px,_rgba(34,197,94,0.15)_1px,_transparent_0)] bg-[length:20px_20px]'
            },
            'Peralatan': {
                gradient: 'from-purple-500/10 via-violet-500/5 to-fuchsia-500/10',
                border: 'border-l-4 border-purple-500',
                shadow: 'shadow-purple-500/20',
                pattern: 'bg-[radial-gradient(circle_at_1px_1px,_rgba(147,51,234,0.15)_1px,_transparent_0)] bg-[length:20px_20px]'
            },
            'Furniture': {
                gradient: 'from-amber-500/10 via-orange-500/5 to-red-500/10',
                border: 'border-l-4 border-amber-500',
                shadow: 'shadow-amber-500/20',
                pattern: 'bg-[radial-gradient(circle_at_1px_1px,_rgba(245,158,11,0.15)_1px,_transparent_0)] bg-[length:20px_20px]'
            },
            'Kendaraan': {
                gradient: 'from-slate-500/10 via-gray-500/5 to-zinc-500/10',
                border: 'border-l-4 border-slate-500',
                shadow: 'shadow-slate-500/20',
                pattern: 'bg-[radial-gradient(circle_at_1px_1px,_rgba(100,116,139,0.15)_1px,_transparent_0)] bg-[length:20px_20px]'
            }
        };

        return categoryMap[kategori] || {
            gradient: 'from-primary/10 via-secondary/5 to-primary/10',
            border: 'border-l-4 border-primary',
            shadow: 'shadow-primary/20',
            pattern: 'bg-[radial-gradient(circle_at_1px_1px,_rgba(183,37,50,0.15)_1px,_transparent_0)] bg-[length:20px_20px]'
        };
    };
    


    return (
        <>
            <div className="relative overflow-hidden">
                {/* Decorative SVG Background */}
                <div className="absolute inset-0 pointer-events-none opacity-5 dark:opacity-10 z-0">
                    <img 
                        src="/slasss 4.svg" 
                        alt="Decorative Background" 
                        className="absolute top-20 right-0 w-80 h-auto transform rotate-6 translate-x-24"
                    />
                    <img 
                        src="/slasss 4.svg" 
                        alt="Decorative Background" 
                        className="absolute bottom-20 left-0 w-60 h-auto transform -rotate-6 -translate-x-20"
                    />
                </div>
            </div>
            <AppLayout
            header={
                <div className={`relative overflow-hidden transition-all duration-1000 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'}`}>
                    <div className="absolute inset-0 bg-gradient-to-r from-primary/20 to-secondary/20 rounded-2xl" />
                    <div className="relative flex justify-between items-center p-6">
                        <div className="flex items-center space-x-4">
                                    <motion.div
                                        initial={{ scale: 0, rotate: -180 }}
                                        animate={{ scale: 1, rotate: 0 }}
                                        transition={{ duration: 0.6, type: "spring" }}
                                        whileHover={{ scale: 1.1 }}
                                    >
                                        <div className="relative">
                                            <div className="absolute inset-0 bg-gradient-to-r from-primary to-secondary rounded-xl blur-sm opacity-50" />
                                            <div className="w-10 h-10 relative z-10 bg-gradient-to-br from-primary to-secondary rounded-xl shadow-lg transition-all duration-300 hover:scale-110 flex items-center justify-center">
                                                <CubeIcon className="w-5 h-5 text-white" />
                                            </div>
                                        </div>
                                    </motion.div>
                                    <div>
                                        <motion.h1 
                                            className="text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 dark:from-white dark:to-gray-200 bg-clip-text text-transparent font-superline"
                                            initial={{ opacity: 0, x: -20 }}
                                            animate={{ opacity: 1, x: 0 }}
                                            transition={{ delay: 0.3, duration: 0.6 }}
                                        >
                                            Daftar Inventaris
                                        </motion.h1>
                                        <p className="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                            Jelajahi koleksi barang inventaris yang tersedia
                                        </p>
                                    </div>
                                </div>
                        <div className="flex items-center space-x-3">
                            <div className="px-4 py-2 bg-gradient-to-r from-primary/20 to-secondary/20 rounded-xl">
                                <span className="text-sm font-semibold text-gray-700 dark:text-gray-300">
                                    {barangs.total} item
                                </span>
                            </div>
                            <div className="w-3 h-3 bg-green-500 rounded-full animate-pulse" />
                        </div>
                    </div>
                </div>
            }
        >
            <Head title="Daftar Inventaris" />

            <div className="py-4 sm:py-8 lg:py-12">
                <div className="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
                    {/* Search and Filter Section */}
                    <div className={`relative overflow-hidden mb-6 sm:mb-8 transition-all duration-1000 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'}`} style={{ animationDelay: '200ms' }}>
                        <div className="relative bg-white dark:bg-gray-800 rounded-2xl sm:rounded-3xl shadow-xl border border-gray-200 dark:border-gray-700">
                            <div className="relative p-4 sm:p-6 lg:p-8">
                                <div className="flex items-center space-x-3 sm:space-x-4 mb-4 sm:mb-6">
                                    <div className="relative">
                                        <div className="absolute inset-0 bg-gradient-to-r from-primary to-secondary rounded-xl blur-sm opacity-50" />
                                        <div className="w-8 h-8 sm:w-10 sm:h-10 relative z-10 bg-gradient-to-br from-primary to-secondary rounded-xl shadow-lg transition-all duration-300 hover:scale-110 flex items-center justify-center">
                                            <MagnifyingGlassIcon className="w-4 h-4 sm:w-5 sm:h-5 text-white" />
                                        </div>
                                    </div>
                                    <div>
                                        <h3 className="text-base sm:text-lg lg:text-xl font-bold text-gray-800 dark:text-white leading-tight">
                                            Pencarian & Filter
                                        </h3>
                                        <p className="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                            Temukan barang yang Anda butuhkan dengan mudah
                                        </p>
                                    </div>
                                </div>
                                
                                <form onSubmit={handleSearch} className="space-y-4 sm:space-y-6">
                                    <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3 sm:gap-4">
                                        {/* Search Input */}
                                        <div className="lg:col-span-6">
                                            <div className="relative group">
                                                <div className="relative">
                                                    <input
                                                        type="text"
                                                        value={searchTerm}
                                                        onChange={(e) => setSearchTerm(e.target.value)}
                                                        className="w-full bg-gray-50 dark:bg-gray-700 rounded-xl sm:rounded-2xl pl-10 sm:pl-12 pr-3 sm:pr-4 py-3 sm:py-4 text-sm sm:text-base text-gray-900 dark:text-white border border-gray-200 dark:border-gray-600 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent transition-all duration-300 shadow-lg min-h-[44px]"
                                                        placeholder="Cari nama barang, kategori, atau deskripsi..."
                                                    />
                                                    <div className="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                                        <MagnifyingGlassIcon className="h-4 w-4 sm:h-5 sm:w-5 text-gray-500 dark:text-gray-400 group-focus-within:text-primary transition-colors duration-300" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {/* Category Filter */}
                                        <div className="lg:col-span-4">
                                            <div className="relative group">
                                                <div className="relative">
                                                    <select
                                                        value={selectedKategori}
                                                        onChange={(e) => setSelectedKategori(e.target.value)}
                                                        className="w-full bg-gray-50 dark:bg-gray-700 rounded-xl sm:rounded-2xl pl-10 sm:pl-12 pr-3 sm:pr-4 py-3 sm:py-4 text-sm sm:text-base text-gray-900 dark:text-white border border-gray-200 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-transparent transition-all duration-300 shadow-lg appearance-none min-h-[44px]"
                                                    >
                                                        <option value="">Semua Kategori</option>
                                                        {kategoris.map((kat) => (
                                                            <option key={kat} value={kat}>
                                                                {kat}
                                                            </option>
                                                        ))}
                                                    </select>
                                                    <div className="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                                        <FunnelIcon className="h-4 w-4 sm:h-5 sm:w-5 text-gray-500 dark:text-gray-400 group-focus-within:text-primary transition-colors duration-300" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {/* Search Button */}
                                        <div className="lg:col-span-2">
                                            <button
                                                type="submit"
                                                className="w-full h-full bg-gradient-to-r from-primary to-secondary hover:from-primary/80 hover:to-secondary/80 text-white rounded-xl sm:rounded-2xl font-semibold shadow-lg transition-all duration-300 hover:scale-105 flex items-center justify-center space-x-1.5 sm:space-x-2 py-3 sm:py-4 min-h-[44px]"
                                            >
                                                <MagnifyingGlassIcon className="w-4 h-4 sm:w-5 sm:h-5" />
                                                <span className="text-sm sm:text-base hidden sm:inline">Cari</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {/* Search Results Info */}
                    <div className={`mb-6 sm:mb-8 transition-all duration-1000 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'}`} style={{ animationDelay: '400ms' }}>
                        <div className="bg-white dark:bg-gray-800 rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-lg border border-gray-200 dark:border-gray-700">
                            <div className="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 sm:gap-4">
                                <div className="flex items-center space-x-3 sm:space-x-4">
                                    <div className="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-r from-primary to-secondary rounded-xl flex items-center justify-center shadow-lg">
                                        <CubeIcon className="w-5 h-5 sm:w-6 sm:h-6 text-white" />
                                    </div>
                                    <div>
                                        <div className="text-gray-700 dark:text-gray-300">
                                            {searchTerm || selectedKategori ? (
                                                <div className="space-y-1">
                                                    <p className="text-sm sm:text-base lg:text-lg font-semibold leading-tight">
                                                        Ditemukan <span className="text-blue-600 dark:text-blue-400 font-bold">{barangs.data.length}</span> dari <span className="text-gray-600 dark:text-gray-400">{barangs.total}</span> barang
                                                    </p>
                                                    <div className="flex flex-wrap gap-1.5 sm:gap-2 text-xs sm:text-sm">
                                                        {searchTerm && (
                                                            <span className="inline-flex items-center px-2 sm:px-3 py-1 rounded-full bg-primary/10 text-primary border border-primary/20">
                                                                <MagnifyingGlassIcon className="w-3 h-3 mr-1" />
                                                                "{searchTerm}"
                                                            </span>
                                                        )}
                                                        {selectedKategori && (
                                                            <span className="inline-flex items-center px-2 sm:px-3 py-1 rounded-full bg-secondary/10 text-secondary border border-secondary/20">
                                                                <TagIcon className="w-3 h-3 mr-1" />
                                                                {selectedKategori}
                                                            </span>
                                                        )}
                                                    </div>
                                                </div>
                                            ) : (
                                                <div>
                                                    <p className="text-sm sm:text-base lg:text-lg font-semibold leading-tight">
                                                        Total <span className="text-blue-600 dark:text-blue-400 font-bold">{barangs.data.length}</span> dari <span className="text-gray-600 dark:text-gray-400">{barangs.total}</span> barang
                                                    </p>
                                                    <p className="text-xs sm:text-sm text-gray-500 dark:text-gray-400 leading-relaxed">
                                                        Semua inventaris tersedia
                                                    </p>
                                                </div>
                                            )}
                                        </div>
                                    </div>
                                </div>
                                
                                {/* Quick Stats */}
                                <div className="flex items-center space-x-3 sm:space-x-4">
                                    <div className="text-center">
                                        <div className="text-sm sm:text-base lg:text-lg font-bold text-green-600 dark:text-green-400">
                                            {barangs.data.filter(item => item.stok > 0).length}
                                        </div>
                                        <div className="text-xs text-gray-500 dark:text-gray-400 leading-tight">Tersedia</div>
                                    </div>
                                    <div className="text-center">
                                        <div className="text-sm sm:text-base lg:text-lg font-bold text-red-600 dark:text-red-400">
                                            {barangs.data.filter(item => item.stok === 0).length}
                                        </div>
                                        <div className="text-xs text-gray-500 dark:text-gray-400 leading-tight">Habis</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* Items Grid */}
                    {barangs.data.length > 0 ? (
                        <div className={`grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6 lg:gap-8 transition-all duration-1000 mb-6 sm:mb-8 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'}`} style={{ animationDelay: '600ms' }}>
                            {barangs.data.map((barang, index) => (
                                <div
                                    key={barang._id}
                                    className={`group relative overflow-hidden rounded-2xl sm:rounded-3xl cursor-pointer transition-all duration-300 sm:duration-500 hover:scale-[1.01] sm:hover:scale-105 hover:-translate-y-0.5 sm:hover:-translate-y-2 ${
                                        getCategoryStyles(barang.kategori).border
                                    } bg-gradient-to-br ${getCategoryStyles(barang.kategori).gradient} backdrop-blur-sm border border-gray-200/50 dark:border-gray-700/50 shadow-lg sm:shadow-xl hover:shadow-xl sm:hover:shadow-2xl ${getCategoryStyles(barang.kategori).shadow} hover:shadow-3xl min-h-[320px] sm:min-h-[360px] will-change-transform`}
                                    style={{
                                        boxShadow: '0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 0 0 1px rgba(255, 255, 255, 0.05), inset 0 1px 0 rgba(255, 255, 255, 0.1)'
                                    }}
                                >
                                    {/* Subtle Pattern Overlay */}
                                    <div className={`absolute inset-0 ${getCategoryStyles(barang.kategori).pattern} opacity-30`} />
                                    
                                    {/* Glass Effect Background */}
                                    <div className="absolute inset-0 bg-white/80 dark:bg-gray-800/80 backdrop-blur-sm" />
                                    {/* Image Container */}
                                    <div className="relative h-40 sm:h-48 lg:h-56 overflow-hidden">
                                        <div className="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent z-10" />
                                        <img
                                            src={getImageUrl(barang.gambar)}
                                            alt={barang.nama_barang}
                                            className="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                                            onError={(e) => {
                                                const target = e.target as HTMLImageElement;
                                                target.src = '/images/no-image.png';
                                            }}
                                        />
                                        
                                        {/* Stock Status Badge */}
                                        <div className="absolute top-2 sm:top-4 right-2 sm:right-4 z-20">
                                            {barang.stok > 0 ? (
                                                <div className="flex items-center space-x-1 bg-green-500/90 backdrop-blur-sm text-white px-2 sm:px-3 py-1 sm:py-1.5 rounded-full text-xs font-semibold shadow-lg">
                                                    <CheckCircleIcon className="w-3 h-3" />
                                                    <span className="hidden sm:inline">Tersedia</span>
                                                </div>
                                            ) : (
                                                <div className="flex items-center space-x-1 bg-red-500/90 backdrop-blur-sm text-white px-2 sm:px-3 py-1 sm:py-1.5 rounded-full text-xs font-semibold shadow-lg">
                                                    <XCircleIcon className="w-3 h-3" />
                                                    <span className="hidden sm:inline">Habis</span>
                                                </div>
                                            )}
                                        </div>
                                        
                                        {/* Action Buttons - Only show on individual item hover using CSS */}
                                        <div className="absolute top-2 sm:top-4 left-2 sm:left-4 z-20 flex flex-col space-y-1.5 sm:space-y-2 transition-all duration-200 sm:duration-300 opacity-0 -translate-x-2 sm:-translate-x-4 pointer-events-none group-hover:opacity-100 group-hover:translate-x-0 group-hover:pointer-events-auto">
                                            <button className="w-8 h-8 sm:w-10 sm:h-10 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full text-white flex items-center justify-center transition-all duration-200 sm:duration-300 hover:scale-105 sm:hover:scale-110 hover:bg-white/30 min-h-[44px] min-w-[44px] sm:min-h-[40px] sm:min-w-[40px] will-change-transform">
                                                <ShareIcon className="w-3.5 h-3.5 sm:w-4 sm:h-4" />
                                            </button>
                                            <button className="w-8 h-8 sm:w-10 sm:h-10 bg-white/20 backdrop-blur-sm border border-white/30 rounded-full text-white flex items-center justify-center transition-all duration-200 sm:duration-300 hover:scale-105 sm:hover:scale-110 hover:bg-white/30 min-h-[44px] min-w-[44px] sm:min-h-[40px] sm:min-w-[40px] will-change-transform">
                                                <EyeIcon className="w-3.5 h-3.5 sm:w-4 sm:h-4" />
                                            </button>
                                        </div>
                                    </div>

                                    {/* Content */}
                                    <div className="relative p-4 sm:p-6 bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm">
                                        <div className="mb-3 sm:mb-4">
                                            <div className="flex items-start justify-between mb-2">
                                                <h3 className="text-base sm:text-lg font-bold text-gray-900 dark:text-white group-hover:text-primary transition-colors duration-200 sm:duration-300 line-clamp-1 pr-2">
                                                    {barang.nama_barang}
                                                </h3>
                                                <SparklesIcon className="w-4 h-4 sm:w-5 sm:h-5 text-secondary transition-all duration-200 sm:duration-300 opacity-0 rotate-6 sm:rotate-12 scale-105 sm:scale-110 group-hover:opacity-100 flex-shrink-0 will-change-transform" />
                                            </div>
                                            
                                            <div className="flex items-center space-x-2 mb-2 sm:mb-3">
                                                <div className="flex items-center space-x-1 bg-gradient-to-r from-primary/20 to-secondary/20 text-primary dark:text-secondary text-xs px-2 sm:px-3 py-1 rounded-full border border-primary/20 dark:border-secondary/20">
                                                    <TagIcon className="w-3 h-3" />
                                                    <span className="truncate">{barang.kategori}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <p className="text-gray-600 dark:text-gray-400 text-xs sm:text-sm mb-3 sm:mb-4 line-clamp-2 leading-relaxed">
                                            {barang.deskripsi}
                                        </p>

                                        {/* Stats */}
                                        <div className="grid grid-cols-2 gap-2 sm:gap-4">
                                            <div className="text-center p-2 sm:p-3 bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-xl sm:rounded-2xl border border-green-200/50 dark:border-green-700/30">
                                                <div className="text-base sm:text-lg font-bold text-green-600 dark:text-green-400">
                                                    {barang.stok}
                                                </div>
                                                <div className="text-xs text-green-600/70 dark:text-green-400/70 font-medium">Stok Tersedia</div>
                                            </div>
                                            <div className="text-center p-2 sm:p-3 bg-gradient-to-br from-orange-50 to-amber-50 dark:from-orange-900/20 dark:to-amber-900/20 rounded-xl sm:rounded-2xl border border-orange-200/50 dark:border-orange-700/30">
                                                <div className="text-base sm:text-lg font-bold text-orange-600 dark:text-orange-400">
                                                    {(barang.total_dimiliki || 0) - barang.stok}
                                                </div>
                                                <div className="text-xs text-orange-600/70 dark:text-orange-400/70 font-medium">Sedang Dipinjam</div>
                                            </div>
                                        </div>
                                        
                                        {/* Progress bar for stock */}
                                        <div className="mt-3 sm:mt-4">
                                            <div className="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400 mb-1">
                                                <span>Ketersediaan</span>
                                                <span>{Math.round((barang.stok / (barang.total_dimiliki || barang.stok)) * 100) || 0}%</span>
                                            </div>
                                            <div className="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-1.5 sm:h-2 overflow-hidden">
                                                <div 
                                                    className="h-full bg-gradient-to-r from-green-500 to-emerald-500 rounded-full transition-all duration-300 sm:duration-500"
                                                    style={{ width: `${Math.round((barang.stok / (barang.total_dimiliki || barang.stok)) * 100) || 0}%` }}
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ))}
                        </div>
                    ) : (
                        <div className="text-center py-8 sm:py-12">
                            <div className="text-gray-600 dark:text-gray-400 text-base sm:text-lg mb-2 transition-colors duration-300 leading-relaxed">Tidak ada barang ditemukan</div>
                            <p className="text-sm sm:text-base text-gray-500 dark:text-gray-500 transition-colors duration-300 leading-relaxed">
                                {currentFilters.search || currentFilters.kategori
                                    ? 'Coba ubah kata kunci pencarian atau filter kategori'
                                    : 'Belum ada barang yang tersedia'
                                }
                            </p>
                        </div>
                    )}

                    {/* Pagination */}
                    {barangs.last_page > 1 && (
                        <div className={`flex justify-center mt-8 sm:mt-12 transition-all duration-1000 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'}`} style={{ animationDelay: '1000ms' }}>
                            <div className="bg-white dark:bg-gray-800 rounded-2xl sm:rounded-3xl p-4 sm:p-6 shadow-lg sm:shadow-xl border border-gray-200 dark:border-gray-700">
                                <div className="flex items-center justify-center space-x-2 sm:space-x-3">
                                    {/* Previous Button */}
                                    <Link
                                        href={barangs.prev_page_url || '#'}
                                        className={`group flex items-center space-x-1.5 sm:space-x-2 px-3 sm:px-4 py-2.5 sm:py-3 rounded-xl sm:rounded-2xl text-xs sm:text-sm font-semibold transition-all duration-300 min-h-[44px] ${
                                            barangs.prev_page_url
                                                ? 'bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 text-gray-700 dark:text-gray-300 hover:from-primary/10 hover:to-secondary/10 hover:text-primary shadow-lg hover:shadow-xl hover:scale-105'
                                                : 'bg-gray-100 dark:bg-gray-800 text-gray-400 dark:text-gray-600 cursor-not-allowed opacity-50'
                                        }`}
                                        preserveState
                                        preserveScroll
                                    >
                                        <ChevronLeftIcon className="w-3.5 h-3.5 sm:w-4 sm:h-4 transition-transform duration-300 group-hover:-translate-x-1" />
                                        <span className="hidden sm:inline">Sebelumnya</span>
                                    </Link>

                                    {/* Page Numbers */}
                                    <div className="flex items-center space-x-2">
                                        {(() => {
                                            const currentPage = barangs.current_page;
                                            const lastPage = barangs.last_page;
                                            const pages = [];
                                            
                                            // Show first page
                                            if (currentPage > 3) {
                                                pages.push(1);
                                                if (currentPage > 4) pages.push('...');
                                            }
                                            
                                            // Show pages around current
                                            for (let i = Math.max(1, currentPage - 2); i <= Math.min(lastPage, currentPage + 2); i++) {
                                                pages.push(i);
                                            }
                                            
                                            // Show last page
                                            if (currentPage < lastPage - 2) {
                                                if (currentPage < lastPage - 3) pages.push('...');
                                                pages.push(lastPage);
                                            }
                                            
                                            return pages.map((page, index) => {
                                                if (page === '...') {
                                                    return (
                                                        <span key={`ellipsis-${index}`} className="px-3 py-2 text-gray-400 dark:text-gray-600">
                                                            ...
                                                        </span>
                                                    );
                                                }
                                                
                                                return (
                                                    <Link
                                                        key={page}
                                                        href={`?page=${page}${searchTerm ? `&search=${searchTerm}` : ''}${selectedKategori ? `&kategori=${selectedKategori}` : ''}`}
                                                        className={`relative px-3 sm:px-4 py-2.5 sm:py-3 rounded-xl sm:rounded-2xl text-xs sm:text-sm font-semibold transition-all duration-300 hover:scale-110 min-h-[44px] min-w-[44px] flex items-center justify-center ${
                                                            page === currentPage
                                                                ? 'bg-gradient-to-r from-primary to-secondary text-white shadow-lg scale-110'
                                                                : 'bg-white/60 dark:bg-gray-700/60 text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-primary/10 hover:to-secondary/10 hover:text-primary shadow-md hover:shadow-lg'
                                                        }`}
                                                        preserveState
                                                        preserveScroll
                                                    >
                                                        <span className="relative">{page}</span>
                                                    </Link>
                                                );
                                            });
                                        })()}
                                    </div>

                                    {/* Next Button */}
                                    <Link
                                        href={barangs.next_page_url || '#'}
                                        className={`group flex items-center space-x-1.5 sm:space-x-2 px-3 sm:px-4 py-2.5 sm:py-3 rounded-xl sm:rounded-2xl text-xs sm:text-sm font-semibold transition-all duration-300 min-h-[44px] ${
                                            barangs.next_page_url
                                                ? 'bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 text-gray-700 dark:text-gray-300 hover:from-primary/10 hover:to-secondary/10 hover:text-primary shadow-lg hover:shadow-xl hover:scale-105'
                                                : 'bg-gray-100 dark:bg-gray-800 text-gray-400 dark:text-gray-600 cursor-not-allowed opacity-50'
                                        }`}
                                        preserveState
                                        preserveScroll
                                    >
                                        <span className="hidden sm:inline">Selanjutnya</span>
                                        <ChevronRightIcon className="w-3.5 h-3.5 sm:w-4 sm:h-4 transition-transform duration-300 group-hover:translate-x-1" />
                                    </Link>
                                </div>
                                
                                {/* Page Info */}
                                <div className="mt-3 sm:mt-4 text-center">
                                    <p className="text-xs sm:text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                        Halaman <span className="font-semibold text-primary">{barangs.current_page}</span> dari <span className="font-semibold">{barangs.last_page}</span>
                                        <span className="mx-1 sm:mx-2">•</span>
                                        Total <span className="font-semibold text-blue-600 dark:text-blue-400">{barangs.total}</span> barang
                                    </p>
                                </div>
                            </div>
                        </div>
                    )}
                </div>
            </div>
        </AppLayout>
        </>
    );
}