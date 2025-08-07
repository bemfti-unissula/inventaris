import { Head, Link, useForm } from '@inertiajs/react';
import { FormEventHandler, useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { EyeIcon, EyeSlashIcon, EnvelopeIcon, LockClosedIcon, UserIcon, UserPlusIcon } from '@heroicons/react/24/outline';
import { useTheme } from '@/contexts/ThemeContext';


export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });
    
    const [showPassword, setShowPassword] = useState(false);
    const [showPasswordConfirmation, setShowPasswordConfirmation] = useState(false);
    const [focusedField, setFocusedField] = useState<string | null>(null);
    const { theme } = useTheme();

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('register'), {
            onFinish: () => reset('password', 'password_confirmation'),
        });
    };

    const containerVariants = {
        hidden: { opacity: 0, y: 50 },
        visible: {
            opacity: 1,
            y: 0,
            transition: {
                duration: 0.6,
                staggerChildren: 0.1
            }
        }
    };

    const itemVariants = {
        hidden: { opacity: 0, x: -20 },
        visible: { opacity: 1, x: 0 }
    };

    return (
        <div className="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-900 dark:via-gray-800 dark:to-black transition-all duration-500 relative overflow-hidden py-8">
            <Head title="Daftar" />
            
            {/* Background Decorations */}
            <div className="absolute inset-0 overflow-hidden">
                <motion.div
                    className="absolute -top-40 -left-40 w-80 h-80 bg-red-500/10 dark:bg-yellow-400/10 rounded-full blur-3xl"
                    animate={{
                        scale: [1, 1.3, 1],
                        rotate: [0, -180, -360]
                    }}
                    transition={{
                        duration: 25,
                        repeat: Infinity,
                        ease: "linear"
                    }}
                />
                <motion.div
                    className="absolute -bottom-40 -right-40 w-80 h-80 bg-red-500/5 dark:bg-yellow-400/5 rounded-full blur-3xl"
                    animate={{
                        scale: [1.3, 1, 1.3],
                        rotate: [-360, -180, 0]
                    }}
                    transition={{
                        duration: 30,
                        repeat: Infinity,
                        ease: "linear"
                    }}
                />
            </div>

            <motion.div
                className="relative z-10 w-full max-w-md mx-4"
                variants={containerVariants}
                initial="hidden"
                animate="visible"
            >
                {/* Logo Section */}
                <motion.div
                    className="text-center mb-8"
                    variants={itemVariants}
                >
                    <motion.div
                        className="inline-flex items-center justify-center w-20 h-20 mb-4"
                        whileHover={{ scale: 1.05, rotate: -5 }}
                        whileTap={{ scale: 0.95 }}
                    >
                        <img 
                            src="/images/Logo-BEM-FTI.png" 
                            alt="Logo BEM FTI" 
                            className="w-20 h-20 object-contain rounded-2xl shadow-lg"
                        />
                    </motion.div>
                    <h1 className="text-4xl font-bold text-gray-800 dark:text-white mb-2 font-superline">
                         Bergabung Dengan Kami
                     </h1>
                    <p className="text-gray-600 dark:text-gray-400 mt-2">
                        Buat akun baru untuk memulai
                    </p>
                </motion.div>

                {/* Main Card */}
                <motion.div
                    className="bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl rounded-3xl shadow-2xl border border-gray-200/50 dark:border-gray-700/50 p-8"
                    variants={itemVariants}
                    whileHover={{ y: -5 }}
                    transition={{ type: "spring", stiffness: 300 }}
                >
                    <form onSubmit={submit} className="space-y-6">
                        {/* Name Field */}
                        <motion.div variants={itemVariants}>
                            <label className="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Nama Lengkap
                            </label>
                            <div className="relative">
                                <div className="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <UserIcon className={`h-5 w-5 transition-colors duration-200 ${
                                        focusedField === 'name' 
                                            ? 'text-red-500 dark:text-yellow-400' 
                                            : 'text-gray-400'
                                    }`} />
                                </div>
                                <motion.input
                                    type="text"
                                    value={data.name}
                                    onChange={(e) => setData('name', e.target.value)}
                                    onFocus={() => setFocusedField('name')}
                                    onBlur={() => setFocusedField(null)}
                                    className={`w-full pl-12 pr-4 py-4 bg-gray-50 dark:bg-gray-700 border-2 rounded-xl transition-all duration-200 focus:outline-none ${
                                        errors.name
                                            ? 'border-red-500 focus:border-red-600'
                                            : focusedField === 'name'
                                            ? 'border-red-500 dark:border-yellow-400 focus:border-red-600 dark:focus:border-yellow-500'
                                            : 'border-gray-200 dark:border-gray-600 focus:border-red-500 dark:focus:border-yellow-400'
                                    } text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400`}
                                    placeholder="Masukkan nama lengkap Anda"
                                    autoComplete="name"
                                    required
                                    whileFocus={{ scale: 1.02 }}
                                />
                            </div>
                            <AnimatePresence>
                                {errors.name && (
                                    <motion.p
                                        className="mt-2 text-sm text-red-600 dark:text-red-400"
                                        initial={{ opacity: 0, y: -10 }}
                                        animate={{ opacity: 1, y: 0 }}
                                        exit={{ opacity: 0, y: -10 }}
                                    >
                                        {errors.name}
                                    </motion.p>
                                )}
                            </AnimatePresence>
                        </motion.div>

                        {/* Email Field */}
                        <motion.div variants={itemVariants}>
                            <label className="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Email
                            </label>
                            <div className="relative">
                                <div className="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <EnvelopeIcon className={`h-5 w-5 transition-colors duration-200 ${
                                        focusedField === 'email' 
                                            ? 'text-red-500 dark:text-yellow-400' 
                                            : 'text-gray-400'
                                    }`} />
                                </div>
                                <motion.input
                                    type="email"
                                    value={data.email}
                                    onChange={(e) => setData('email', e.target.value)}
                                    onFocus={() => setFocusedField('email')}
                                    onBlur={() => setFocusedField(null)}
                                    className={`w-full pl-12 pr-4 py-4 bg-gray-50 dark:bg-gray-700 border-2 rounded-xl transition-all duration-200 focus:outline-none ${
                                        errors.email
                                            ? 'border-red-500 focus:border-red-600'
                                            : focusedField === 'email'
                                            ? 'border-red-500 dark:border-yellow-400 focus:border-red-600 dark:focus:border-yellow-500'
                                            : 'border-gray-200 dark:border-gray-600 focus:border-red-500 dark:focus:border-yellow-400'
                                    } text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400`}
                                    placeholder="Masukkan email Anda"
                                    autoComplete="username"
                                    required
                                    whileFocus={{ scale: 1.02 }}
                                />
                            </div>
                            <AnimatePresence>
                                {errors.email && (
                                    <motion.p
                                        className="mt-2 text-sm text-red-600 dark:text-red-400"
                                        initial={{ opacity: 0, y: -10 }}
                                        animate={{ opacity: 1, y: 0 }}
                                        exit={{ opacity: 0, y: -10 }}
                                    >
                                        {errors.email}
                                    </motion.p>
                                )}
                            </AnimatePresence>
                        </motion.div>

                        {/* Password Field */}
                        <motion.div variants={itemVariants}>
                            <label className="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Password
                            </label>
                            <div className="relative">
                                <div className="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <LockClosedIcon className={`h-5 w-5 transition-colors duration-200 ${
                                        focusedField === 'password' 
                                            ? 'text-red-500 dark:text-yellow-400' 
                                            : 'text-gray-400'
                                    }`} />
                                </div>
                                <motion.input
                                    type={showPassword ? 'text' : 'password'}
                                    value={data.password}
                                    onChange={(e) => setData('password', e.target.value)}
                                    onFocus={() => setFocusedField('password')}
                                    onBlur={() => setFocusedField(null)}
                                    className={`w-full pl-12 pr-12 py-4 bg-gray-50 dark:bg-gray-700 border-2 rounded-xl transition-all duration-200 focus:outline-none ${
                                        errors.password
                                            ? 'border-red-500 focus:border-red-600'
                                            : focusedField === 'password'
                                            ? 'border-red-500 dark:border-yellow-400 focus:border-red-600 dark:focus:border-yellow-500'
                                            : 'border-gray-200 dark:border-gray-600 focus:border-red-500 dark:focus:border-yellow-400'
                                    } text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400`}
                                    placeholder="Buat password yang kuat"
                                    autoComplete="new-password"
                                    required
                                    whileFocus={{ scale: 1.02 }}
                                />
                                <button
                                    type="button"
                                    onClick={() => setShowPassword(!showPassword)}
                                    className="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-red-500 dark:hover:text-yellow-400 transition-colors duration-200"
                                >
                                    {showPassword ? (
                                        <EyeSlashIcon className="h-5 w-5" />
                                    ) : (
                                        <EyeIcon className="h-5 w-5" />
                                    )}
                                </button>
                            </div>
                            <AnimatePresence>
                                {errors.password && (
                                    <motion.p
                                        className="mt-2 text-sm text-red-600 dark:text-red-400"
                                        initial={{ opacity: 0, y: -10 }}
                                        animate={{ opacity: 1, y: 0 }}
                                        exit={{ opacity: 0, y: -10 }}
                                    >
                                        {errors.password}
                                    </motion.p>
                                )}
                            </AnimatePresence>
                        </motion.div>

                        {/* Password Confirmation Field */}
                        <motion.div variants={itemVariants}>
                            <label className="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Konfirmasi Password
                            </label>
                            <div className="relative">
                                <div className="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <LockClosedIcon className={`h-5 w-5 transition-colors duration-200 ${
                                        focusedField === 'password_confirmation' 
                                            ? 'text-red-500 dark:text-yellow-400' 
                                            : 'text-gray-400'
                                    }`} />
                                </div>
                                <motion.input
                                    type={showPasswordConfirmation ? 'text' : 'password'}
                                    value={data.password_confirmation}
                                    onChange={(e) => setData('password_confirmation', e.target.value)}
                                    onFocus={() => setFocusedField('password_confirmation')}
                                    onBlur={() => setFocusedField(null)}
                                    className={`w-full pl-12 pr-12 py-4 bg-gray-50 dark:bg-gray-700 border-2 rounded-xl transition-all duration-200 focus:outline-none ${
                                        errors.password_confirmation
                                            ? 'border-red-500 focus:border-red-600'
                                            : focusedField === 'password_confirmation'
                                            ? 'border-red-500 dark:border-yellow-400 focus:border-red-600 dark:focus:border-yellow-500'
                                            : 'border-gray-200 dark:border-gray-600 focus:border-red-500 dark:focus:border-yellow-400'
                                    } text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400`}
                                    placeholder="Ulangi password Anda"
                                    autoComplete="new-password"
                                    required
                                    whileFocus={{ scale: 1.02 }}
                                />
                                <button
                                    type="button"
                                    onClick={() => setShowPasswordConfirmation(!showPasswordConfirmation)}
                                    className="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-red-500 dark:hover:text-yellow-400 transition-colors duration-200"
                                >
                                    {showPasswordConfirmation ? (
                                        <EyeSlashIcon className="h-5 w-5" />
                                    ) : (
                                        <EyeIcon className="h-5 w-5" />
                                    )}
                                </button>
                            </div>
                            <AnimatePresence>
                                {errors.password_confirmation && (
                                    <motion.p
                                        className="mt-2 text-sm text-red-600 dark:text-red-400"
                                        initial={{ opacity: 0, y: -10 }}
                                        animate={{ opacity: 1, y: 0 }}
                                        exit={{ opacity: 0, y: -10 }}
                                    >
                                        {errors.password_confirmation}
                                    </motion.p>
                                )}
                            </AnimatePresence>
                        </motion.div>

                        {/* Submit Button */}
                        <motion.div variants={itemVariants}>
                            <motion.button
                                type="submit"
                                disabled={processing}
                                className={`w-full py-4 px-6 rounded-xl font-semibold text-white transition-all duration-200 ${
                                    processing
                                        ? 'bg-gray-400 cursor-not-allowed'
                                        : 'bg-gradient-to-r from-red-500 to-red-600 dark:from-yellow-400 dark:to-yellow-500 hover:from-red-600 hover:to-red-700 dark:hover:from-yellow-500 dark:hover:to-yellow-600 shadow-lg hover:shadow-xl'
                                } dark:text-gray-900`}
                                whileHover={!processing ? { scale: 1.02, y: -2 } : {}}
                                whileTap={!processing ? { scale: 0.98 } : {}}
                            >
                                {processing ? (
                                    <div className="flex items-center justify-center">
                                        <motion.div
                                            className="w-5 h-5 border-2 border-white border-t-transparent rounded-full mr-2"
                                            animate={{ rotate: 360 }}
                                            transition={{ duration: 1, repeat: Infinity, ease: "linear" }}
                                        />
                                        Memproses...
                                    </div>
                                ) : (
                                    'Daftar Sekarang'
                                )}
                            </motion.button>
                        </motion.div>

                        {/* Login Link */}
                        <motion.div 
                            className="text-center pt-4 border-t border-gray-200 dark:border-gray-700"
                            variants={itemVariants}
                        >
                            <p className="text-sm text-gray-600 dark:text-gray-400">
                                Sudah punya akun?{' '}
                                <Link
                                    href={route('login')}
                                    className="font-semibold text-red-600 dark:text-yellow-400 hover:text-red-700 dark:hover:text-yellow-300 transition-colors duration-200"
                                >
                                    Masuk di sini
                                </Link>
                            </p>
                        </motion.div>
                    </form>
                </motion.div>
            </motion.div>
        </div>
    );
}
