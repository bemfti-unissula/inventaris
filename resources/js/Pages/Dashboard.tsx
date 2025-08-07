import { Head } from '@inertiajs/react';
import AppLayout from '@/Layouts/AppLayout';
import { DashboardProps } from '@/types';
import { CubeIcon, UserGroupIcon, ClipboardDocumentListIcon, SparklesIcon, EyeIcon, ArrowTrendingUpIcon, ArrowTrendingDownIcon } from '@heroicons/react/24/outline';
import { useState, useEffect } from 'react';
import { motion } from 'framer-motion';

export default function Dashboard({ auth, totalBarang, totalUser, totalPinjaman, barangTerbaru }: DashboardProps) {
    const [animatedCounts, setAnimatedCounts] = useState({ barang: 0, user: 0, pinjaman: 0 });
    const [animatedTotalBarang, setAnimatedTotalBarang] = useState(0);
    const [animatedTotalUsers, setAnimatedTotalUsers] = useState(0);
    const [animatedTotalPinjaman, setAnimatedTotalPinjaman] = useState(0);
    const [isVisible, setIsVisible] = useState(false);

    useEffect(() => {
        setIsVisible(true);
        
        // Animate counters
        const animateCounter = (target: number, key: 'barang' | 'user' | 'pinjaman') => {
            let current = 0;
            const increment = target / 50;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                setAnimatedCounts(prev => ({ ...prev, [key]: Math.floor(current) }));
            }, 30);
        };

        setTimeout(() => {
            animateCounter(totalBarang || 0, 'barang');
            if (auth.user.role === 'admin') {
                animateCounter(totalUser || 0, 'user');
            }
            animateCounter(totalPinjaman || 0, 'pinjaman');
            
            // Animate individual counters for new design
            const animateIndividualCounter = (target: number, setter: (value: number) => void) => {
                let current = 0;
                const increment = target / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    setter(Math.floor(current));
                }, 30);
            };
            
            animateIndividualCounter(totalBarang || 0, setAnimatedTotalBarang);
            if (auth.user.role === 'admin') {
                animateIndividualCounter(totalUser || 0, setAnimatedTotalUsers);
            }
            animateIndividualCounter(totalPinjaman || 0, setAnimatedTotalPinjaman);
        }, 500);
    }, [totalBarang, totalUser, totalPinjaman, auth.user.role]);

    return (
        <AppLayout
            header={
                <div className="flex items-center justify-between">
                    <div className="flex items-center space-x-4">
                        <div className="p-3 bg-gradient-vibrant rounded-2xl shadow-lg glow-red animate-pulse-glow">
                        <SparklesIcon className="w-8 h-8 text-white" />
                        </div>
                        <div>
                            <h2 className="text-3xl font-bold text-gradient-primary">
                            Dashboard
                        </h2>
                            <p className="text-sm text-gray-600 dark:text-gray-400 font-medium">
                                {auth.user.role === 'admin' ? 'Admin Control Center' : 'User Dashboard'}
                            </p>
                        </div>
                    </div>
                    <div className="hidden md:flex items-center space-x-2 px-4 py-2 glass-effect dark:glass-effect-dark rounded-xl glow-cyan">
                        <div className="w-2 h-2 bg-emerald-bright rounded-full animate-pulse" />
                        <span className="text-sm text-gray-600 dark:text-gray-400">Live</span>
                    </div>
                </div>
            }
        >
            {/* Decorative SVG Background */}
            <div className="absolute inset-0 pointer-events-none opacity-5 dark:opacity-10">
                <img 
                    src="/slasss 4.svg" 
                    alt="Decorative Background" 
                    className="absolute top-0 right-0 w-96 h-auto transform rotate-12 translate-x-32 -translate-y-16"
                />
                <img 
                    src="/slasss 4.svg" 
                    alt="Decorative Background" 
                    className="absolute bottom-0 left-0 w-64 h-auto transform -rotate-12 -translate-x-16 translate-y-8"
                />
            </div>
            <Head title="Dashboard" />

            <div className="py-8 sm:py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {/* Welcome Message */}
                    <div className={`relative overflow-hidden mb-8 transition-all duration-1000 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'}`}>
                        <div className="relative glass-effect dark:glass-effect-dark rounded-3xl shadow-xl glow-red dark:glow-yellow animate-float-slow">
                            {/* Background elements */}
                            <div className="absolute inset-0 overflow-hidden rounded-3xl">
                                <div className="absolute -top-20 -right-20 w-40 h-40 bg-gradient-electric opacity-30 rounded-full blur-xl animate-float" />
                                <div className="absolute -bottom-10 -left-10 w-32 h-32 bg-gradient-aurora opacity-40 rounded-full blur-lg animate-bounce-subtle" />
                                <div className="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-gradient-cosmic opacity-20 rounded-full blur-2xl animate-pulse-glow" />
                            </div>
                            
                            <div className="relative p-8 sm:p-10">
                                <div className="flex items-start space-x-6">
                                    <div className="flex-shrink-0">
                                        <div className="relative">
                                            <div className="w-16 h-16 relative z-10 bg-gradient-vibrant rounded-2xl shadow-lg transition-all duration-300 hover:scale-110 flex items-center justify-center glow-purple animate-pulse-glow">
                                                <SparklesIcon className="w-8 h-8 text-white" />
                                            </div>
                                        </div>
                                    </div>
                                    <div className="flex-1">
                                        <motion.h3 
                                             className="text-3xl sm:text-4xl font-bold mb-3 font-superline"
                                             initial={{ opacity: 0, y: 20 }}
                                             animate={{ opacity: 1, y: 0 }}
                                             transition={{ duration: 0.6 }}
                                         >
                                             <span className="text-gradient-neon">
                                                 Selamat datang,
                                             </span>
                                             <br />
                                             <motion.span 
                                                 className="text-gradient-vibrant"
                                                 initial={{ opacity: 0 }}
                                                 animate={{ opacity: 1 }}
                                                 transition={{ delay: 0.5, duration: 0.6 }}
                                             >
                                                 {auth.user.name}!
                                             </motion.span>
                                         </motion.h3>
                                        <p className="text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                                            {auth.user.role === 'admin' 
                                                ? 'Kelola inventaris dan pantau aktivitas sistem dari dashboard ini. Anda memiliki akses penuh untuk mengelola semua aspek sistem.'
                                                : 'Lihat inventaris yang tersedia dan kelola pinjaman Anda. Nikmati pengalaman yang mudah dan intuitif.'
                                            }
                                        </p>
                                        <div className="mt-6 flex items-center space-x-4">
                                            <div className="flex items-center space-x-2 px-4 py-2 glass-effect-primary rounded-xl glow-red">
                                                <div className="w-2 h-2 bg-primary-bright rounded-full animate-pulse" />
                                                <span className="text-sm font-medium text-gray-700 dark:text-gray-300">Role: {auth.user.role}</span>
                                            </div>
                                            <div className="flex items-center space-x-2 px-4 py-2 glass-effect-secondary rounded-xl glow-yellow">
                                                <div className="w-2 h-2 bg-emerald-bright rounded-full animate-pulse" />
                                                <span className="text-sm font-medium text-gray-700 dark:text-gray-300">Online</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* Statistics Cards */}
                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                        {/* Total Barang */}
                        <div className={`group relative overflow-hidden transition-all duration-700 hover:scale-105 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'}`}>
                            <div className="relative glass-effect dark:glass-effect-dark rounded-2xl shadow-xl transition-all duration-500 glow-red dark:glow-yellow animate-float-slow">
                                <div className="p-8">
                                    <div className="flex items-center justify-between mb-6">
                                        <div className="flex items-center space-x-4">
                                            <div className="relative">
                                                <div className="w-14 h-14 bg-gradient-vibrant rounded-2xl flex items-center justify-center shadow-lg transition-all duration-300 group-hover:scale-110 glow-red animate-pulse-glow">
                                                    <CubeIcon className="w-7 h-7 text-white" />
                                                </div>
                                                <div className="absolute -top-1 -right-1 w-4 h-4 bg-gradient-electric rounded-full animate-pulse" />
                                            </div>
                                            <div>
                                                <h3 className="text-sm font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Total Barang</h3>
                                                <p className="text-xs text-gray-500 dark:text-gray-500 mt-1">Inventaris Tersedia</p>
                                            </div>
                                        </div>
                                        <div className="text-right">
                                            <motion.div 
                                                 className="text-4xl font-bold text-gradient-primary"
                                                 initial={{ scale: 0 }}
                                                 animate={{ scale: 1 }}
                                                 transition={{ delay: 0.3, type: "spring", stiffness: 200 }}
                                                 whileHover={{ scale: 1.1 }}
                                             >
                                                 {animatedTotalBarang}
                                             </motion.div>
                                            <div className="text-xs text-green-500 font-medium mt-1 flex items-center justify-end">
                                                <ArrowTrendingUpIcon className="w-3 h-3 mr-1" />
                                                +12% bulan ini
                                            </div>
                                        </div>
                                    </div>
                                    <div className="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                        <div className="h-full bg-gradient-vibrant rounded-full animate-pulse-glow" style={{ width: '75%' }} />
                                    </div>
                                </div>
                            </div>
                        </div>

                        {/* Total Users - Only for Admin */}
                        {auth.user.role === 'admin' && (
                            <div className={`group relative overflow-hidden transition-all duration-700 hover:scale-105 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'}`}>
                                <div className="relative glass-effect dark:glass-effect-dark rounded-2xl shadow-xl transition-all duration-500 glow-yellow dark:glow-purple animate-float-slow">
                                    <div className="p-8">
                                        <div className="flex items-center justify-between mb-6">
                                            <div className="flex items-center space-x-4">
                                                <div className="relative">
                                                    <div className="w-14 h-14 bg-gradient-electric rounded-2xl flex items-center justify-center shadow-lg transition-all duration-300 group-hover:scale-110 glow-yellow animate-pulse-glow">
                                                        <UserGroupIcon className="w-7 h-7 text-white" />
                                                    </div>
                                                    <div className="absolute -top-1 -right-1 w-4 h-4 bg-gradient-neon rounded-full animate-pulse" />
                                                </div>
                                                <div>
                                                    <h3 className="text-sm font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Total Pengguna</h3>
                                                    <p className="text-xs text-gray-500 dark:text-gray-500 mt-1">Pengguna Terdaftar</p>
                                                </div>
                                            </div>
                                            <div className="text-right">
                                                <motion.div 
                                                     className="text-4xl font-bold text-gradient-vibrant"
                                                     initial={{ scale: 0 }}
                                                     animate={{ scale: 1 }}
                                                     transition={{ delay: 0.4, type: "spring", stiffness: 200 }}
                                                     whileHover={{ scale: 1.1 }}
                                                 >
                                                     {totalUser}
                                                 </motion.div>
                                                <div className="text-xs text-green-500 font-medium mt-1 flex items-center justify-end">
                                                    <ArrowTrendingUpIcon className="w-3 h-3 mr-1" />
                                                    +8% bulan ini
                                                </div>
                                            </div>
                                        </div>
                                        <div className="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                            <div className="h-full bg-gradient-electric rounded-full animate-pulse-glow" style={{ width: '60%' }} />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        )}

                        {/* Total Pinjaman */}
                        <div className={`group relative overflow-hidden transition-all duration-700 hover:scale-105 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'}`}>
                            <div className="relative glass-effect dark:glass-effect-dark rounded-2xl shadow-xl transition-all duration-500 glow-cyan dark:glow-pink animate-float-slow">
                                <div className="p-8">
                                    <div className="flex items-center justify-between mb-6">
                                        <div className="flex items-center space-x-4">
                                            <div className="relative">
                                                <div className="w-14 h-14 bg-gradient-ocean rounded-2xl flex items-center justify-center shadow-lg transition-all duration-300 group-hover:scale-110 glow-cyan animate-pulse-glow">
                                                    <ClipboardDocumentListIcon className="w-7 h-7 text-white" />
                                                </div>
                                                <div className="absolute -top-1 -right-1 w-4 h-4 bg-gradient-forest rounded-full animate-pulse" />
                                            </div>
                                            <div>
                                                <h3 className="text-sm font-semibold text-gray-600 dark:text-gray-400 uppercase tracking-wider">Total Pinjaman</h3>
                                                <p className="text-xs text-gray-500 dark:text-gray-500 mt-1">Pinjaman Aktif</p>
                                            </div>
                                        </div>
                                        <div className="text-right">
                                            <motion.div 
                                                 className="text-4xl font-bold text-gradient-neon"
                                                 initial={{ scale: 0 }}
                                                 animate={{ scale: 1 }}
                                                 transition={{ delay: 0.5, type: "spring", stiffness: 200 }}
                                                 whileHover={{ scale: 1.1 }}
                                             >
                                                 {totalPinjaman}
                                             </motion.div>
                                            <div className="text-xs text-orange-500 font-medium mt-1 flex items-center justify-end">
                                                <ArrowTrendingDownIcon className="w-3 h-3 mr-1" />
                                                -5% bulan ini
                                            </div>
                                        </div>
                                    </div>
                                    <div className="h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                        <div className="h-full bg-gradient-ocean rounded-full animate-pulse-glow" style={{ width: '45%' }} />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {/* Recent Items */}
                    <div className={`relative overflow-hidden transition-all duration-1000 ${isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'}`}>
                        <div className="relative glass-effect dark:glass-effect-dark rounded-3xl shadow-xl glow-purple dark:glow-cyan animate-float-slow">
                            {/* Header with gradient background */}
                            <div className="relative px-8 py-6 bg-gradient-vibrant opacity-20 animate-gradient-x border-b border-gray-200 dark:border-gray-700">
                                <div className="relative flex items-center justify-between">
                                    <div className="flex items-center space-x-4">
                                        <div className="w-12 h-12 bg-gradient-electric rounded-xl flex items-center justify-center shadow-lg glow-pink animate-pulse-glow">
                                            <EyeIcon className="w-6 h-6 text-white" />
                                        </div>
                                        <div>
                                            <h3 className="text-2xl font-bold text-gradient-primary font-superline">Barang Terbaru</h3>
                                            <p className="text-sm text-gray-600 dark:text-gray-400">Item yang baru ditambahkan ke inventaris</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            {/* Content */}
                            <div className="p-8">
                                {barangTerbaru && barangTerbaru.length > 0 ? (
                                    <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                        {barangTerbaru.slice(0, 6).map((barang, index) => (
                                            <motion.div
                                                key={barang._id}
                                                initial={{ opacity: 0, y: 20 }}
                                                animate={{ opacity: 1, y: 0 }}
                                                transition={{ delay: index * 0.1, duration: 0.5 }}
                                                className="group relative glass-effect dark:glass-effect-dark rounded-2xl p-6 hover:shadow-lg transition-all duration-300 glow-red dark:glow-yellow animate-float-slow hover-glow-red"
                                            >
                                                <div className="flex items-start space-x-4">
                                                    <div className="flex-shrink-0">
                                                        <div className="w-12 h-12 bg-gradient-aurora rounded-xl flex items-center justify-center shadow-md glow-purple animate-pulse-glow">
                                                            <CubeIcon className="w-6 h-6 text-white" />
                                                        </div>
                                                    </div>
                                                    <div className="flex-1 min-w-0">
                                                        <h4 className="text-lg font-semibold text-gray-900 dark:text-white truncate">
                                                            {barang.nama_barang}
                                                        </h4>
                                                        <p className="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                                            Kategori: {barang.kategori}
                                                        </p>
                                                        <div className="flex items-center justify-between mt-3">
                                                            <span className="text-sm font-medium text-gray-700 dark:text-gray-300">
                                                                Stok: {barang.stok}
                                                            </span>
                                                            <span className={`px-2 py-1 text-xs font-medium rounded-full ${
                                                                barang.stok > 10 
                                                                    ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                                                    : barang.stok > 0
                                                                    ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200'
                                                                    : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200'
                                                            }`}>
                                                                {barang.stok > 10 ? 'Tersedia' : barang.stok > 0 ? 'Terbatas' : 'Habis'}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </motion.div>
                                        ))}
                                    </div>
                                ) : (
                                    <div className="text-center py-12">
                                        <div className="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <CubeIcon className="w-12 h-12 text-gray-400" />
                                        </div>
                                        <h3 className="text-lg font-medium text-gray-900 dark:text-white mb-2">Belum ada barang terbaru</h3>
                                        <p className="text-gray-600 dark:text-gray-400">Barang yang baru ditambahkan akan muncul di sini</p>
                                    </div>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
