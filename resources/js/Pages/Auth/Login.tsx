import { Head, Link, useForm } from '@inertiajs/react';
import { FormEventHandler, useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { EyeIcon, EyeSlashIcon, EnvelopeIcon, LockClosedIcon, UserIcon } from '@heroicons/react/24/outline';
import { useTheme } from '@/contexts/ThemeContext';


export default function Login({
    status,
    canResetPassword,
}: {
    status?: string;
    canResetPassword: boolean;
}) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false as boolean,
    });
    
    const [showPassword, setShowPassword] = useState(false);
    const [focusedField, setFocusedField] = useState<string | null>(null);
    const { theme } = useTheme();

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
        post(route('login'), {
            onFinish: () => reset('password'),
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
        <div className="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 transition-all duration-500 relative overflow-hidden">
            <Head title="Masuk" />
            
            {/* Background Decorations */}
            <div className="absolute inset-0 overflow-hidden">
                <div className="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-primary/20 to-secondary/20 rounded-full blur-3xl" />
                <div className="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-br from-secondary/20 to-primary/20 rounded-full blur-3xl" />
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
                        whileHover={{ scale: 1.05 }}
                        whileTap={{ scale: 0.95 }}
                    >
                        <img 
                            src="/images/Logo-BEM-FTI.png" 
                            alt="Logo BEM FTI" 
                            className="w-20 h-20 object-contain rounded-2xl shadow-lg"
                        />
                    </motion.div>
                    <h1 className="text-4xl font-bold text-gray-800 dark:text-white mb-2 font-superline">
                         Selamat Datang
                     </h1>
                    <p className="text-gray-600 dark:text-gray-400 mt-2">
                        Masuk ke akun Anda untuk melanjutkan
                    </p>
                </motion.div>

                {/* Main Card */}
                <motion.div
                    className="bg-white dark:bg-gray-800 backdrop-blur-xl rounded-3xl shadow-xl border border-gray-200 dark:border-gray-700 p-8"
                    variants={itemVariants}
                    whileHover={{ y: -5 }}
                    transition={{ type: "spring", stiffness: 300 }}
                >
                    {/* Status Message */}
                    <AnimatePresence>
                        {status && (
                            <motion.div
                                className="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl"
                                initial={{ opacity: 0, scale: 0.9 }}
                                animate={{ opacity: 1, scale: 1 }}
                                exit={{ opacity: 0, scale: 0.9 }}
                            >
                                <p className="text-sm font-medium text-green-600 dark:text-green-400">
                                    {status}
                                </p>
                            </motion.div>
                        )}
                    </AnimatePresence>

                    <form onSubmit={submit} className="space-y-6">
                        {/* Email Field */}
                        <motion.div variants={itemVariants}>
                            <label className="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Email
                            </label>
                            <div className="relative">
                                <div className="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <EnvelopeIcon className={`h-5 w-5 transition-colors duration-200 ${
                                        focusedField === 'email' 
                                            ? 'text-primary dark:text-secondary' 
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
                                            ? 'border-primary dark:border-secondary focus:border-primary dark:focus:border-secondary'
                                            : 'border-gray-200 dark:border-gray-600 focus:border-primary dark:focus:border-secondary'
                                    } text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400`}
                                    placeholder="Masukkan email Anda"
                                    autoComplete="username"
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
                                            ? 'text-primary dark:text-secondary' 
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
                                            ? 'border-primary dark:border-secondary focus:border-primary dark:focus:border-secondary'
                                            : 'border-gray-200 dark:border-gray-600 focus:border-primary dark:focus:border-secondary'
                                    } text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400`}
                                    placeholder="Masukkan password Anda"
                                    autoComplete="current-password"
                                    whileFocus={{ scale: 1.02 }}
                                />
                                <button
                                    type="button"
                                    onClick={() => setShowPassword(!showPassword)}
                                    className="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors duration-200"
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

                        {/* Remember Me */}
                        <motion.div 
                            className="flex items-center justify-between"
                            variants={itemVariants}
                        >
                            <label className="flex items-center">
                                <input
                                    type="checkbox"
                                    checked={data.remember}
                                    onChange={(e) => setData('remember', e.target.checked)}
                                    className="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary dark:focus:ring-secondary dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                />
                                <span className="ml-2 text-sm text-gray-600 dark:text-gray-400">
                                    Ingat saya
                                </span>
                            </label>
                            {canResetPassword && (
                                <Link
                                    href={route('password.request')}
                                    className="text-sm text-primary hover:text-primary/80 dark:text-secondary dark:hover:text-secondary/80 font-medium transition-colors duration-200"
                                >
                                    Lupa password?
                                </Link>
                            )}
                        </motion.div>

                        {/* Submit Button */}
                        <motion.div variants={itemVariants}>
                            <motion.button
                                type="submit"
                                disabled={processing}
                                className="w-full py-4 px-6 bg-gradient-to-r from-primary to-secondary text-white font-semibold rounded-xl shadow-lg transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-primary/50 dark:focus:ring-secondary/50 disabled:opacity-50 disabled:cursor-not-allowed"
                                whileHover={{ scale: processing ? 1 : 1.02 }}
                                whileTap={{ scale: processing ? 1 : 0.98 }}
                            >
                                {processing ? (
                                    <div className="flex items-center justify-center space-x-2">
                                        <div className="w-5 h-5 border-2 border-white border-t-transparent rounded-full animate-spin" />
                                        <span>Memproses...</span>
                                    </div>
                                ) : (
                                    'Masuk'
                                )}
                            </motion.button>
                        </motion.div>

                        {/* Register Link */}
                        <motion.div 
                            className="text-center pt-4 border-t border-gray-200 dark:border-gray-700"
                            variants={itemVariants}
                        >
                            <p className="text-sm text-gray-600 dark:text-gray-400">
                                Belum punya akun?{' '}
                                <Link
                                    href={route('register')}
                                    className="text-primary hover:text-primary/80 dark:text-secondary dark:hover:text-secondary/80 font-semibold transition-colors duration-200"
                                >
                                    Daftar sekarang
                                </Link>
                            </p>
                        </motion.div>
                    </form>
                </motion.div>
            </motion.div>
        </div>
    );
}
