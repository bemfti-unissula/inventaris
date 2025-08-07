import { PropsWithChildren, ReactNode, useState, useEffect } from 'react';
import { Link, usePage } from '@inertiajs/react';
import { User } from '@/types';
import ThemeToggle from '@/components/ThemeToggle';
import { ChevronDownIcon, Bars3Icon, XMarkIcon, SparklesIcon, HomeIcon, CubeIcon, UserGroupIcon, ClipboardDocumentListIcon, ClockIcon } from '@heroicons/react/24/outline';

interface AppLayoutProps {
    header?: ReactNode;
}

export default function AppLayout({ header, children }: PropsWithChildren<AppLayoutProps>) {
    const { auth } = usePage().props as { auth: { user: User } };
    const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
    const [scrolled, setScrolled] = useState(false);
    const [dropdownOpen, setDropdownOpen] = useState(false);

    useEffect(() => {
        const handleScroll = () => {
            setScrolled(window.scrollY > 20);
        };
        const handleClickOutside = (event: MouseEvent) => {
            if (dropdownOpen && !(event.target as Element).closest('.dropdown-container')) {
                setDropdownOpen(false);
            }
        };
        
        window.addEventListener('scroll', handleScroll);
        document.addEventListener('mousedown', handleClickOutside);
        
        return () => {
            window.removeEventListener('scroll', handleScroll);
            document.removeEventListener('mousedown', handleClickOutside);
        };
    }, [dropdownOpen]);

    return (
        <div className="min-h-screen bg-gradient-to-br from-theme-light via-white to-gray-50 dark:from-theme-dark dark:via-gray-900 dark:to-black relative transition-all duration-500 overflow-x-hidden">
            {/* Animated Background Elements */}
            <div className="absolute inset-0 overflow-hidden">
                <div className="absolute -top-40 -right-40 w-80 h-80 bg-gradient-radial from-primary-red/20 to-transparent rounded-full animate-float" />
                <div className="absolute top-1/3 -left-20 w-60 h-60 bg-gradient-radial from-primary-yellow/20 to-transparent rounded-full animate-float" style={{ animationDelay: '2s' }} />
                <div className="absolute bottom-20 right-1/4 w-40 h-40 bg-gradient-radial from-primary-red/15 to-transparent rounded-full animate-float" style={{ animationDelay: '4s' }} />
            </div>
            
            {/* Mesh Gradient Background */}
            <div className="absolute inset-0 bg-gradient-mesh opacity-30 dark:opacity-20" />
            
            {/* Grid Pattern Background */}
            <div className="absolute inset-0 bg-[url('/grid.svg')] bg-center [mask-image:linear-gradient(180deg,white,rgba(255,255,255,0))] opacity-20 dark:opacity-10" />

            {/* Navbar */}
            <nav className={`${
                scrolled 
                    ? 'bg-white/95 dark:bg-gray-900/95 shadow-xl shadow-primary-red/10 dark:shadow-primary-yellow/10' 
                    : 'bg-white/80 dark:bg-gray-800/80'
            } border-b border-gray-200/50 dark:border-gray-700/50 backdrop-blur-xl relative z-50 transition-all duration-500 sticky top-0`}>
                <div className="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
                    <div className="flex justify-between h-14 sm:h-16">
                        <div className="flex">
                            {/* Logo */}
                            <div className="shrink-0 flex items-center group">
                                <Link href={route('dashboard')} className="flex items-center space-x-2 sm:space-x-3 transition-all duration-300 hover:scale-105">
                                     <div className="relative">
                                        <div className="absolute inset-0 bg-gradient-to-r from-primary to-secondary rounded-lg blur-sm opacity-0 group-hover:opacity-30 transition-opacity duration-300" />
                                        <div className="h-8 w-8 sm:h-10 sm:w-10 rounded-lg flex items-center justify-center relative z-10 transition-all duration-300 group-hover:scale-110 p-1">
                                            <img 
                                                src="/images/Logo-BEM-FTI.png" 
                                                alt="Logo BEM FTI" 
                                                className="w-full h-full object-contain drop-shadow-lg"
                                            />
                                        </div>
                                    </div>
                                    <div className="hidden sm:block">
                                        <h1 className="text-lg sm:text-xl font-superline bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                                            Inventaris
                                        </h1>
                                        <p className="text-xs text-gray-500 dark:text-gray-400 font-medium">BEM FTI</p>
                                    </div>
                                </Link>
                            </div>

                            {/* Navigation Links */}
                            <div className="hidden space-x-1 sm:space-x-2 sm:-my-px sm:ml-6 lg:ml-10 sm:flex">
                                <NavLink href={route('dashboard')} active={route().current('dashboard')} icon={HomeIcon}>
                                    Dashboard
                                </NavLink>
                                {auth.user && (
                                    <>
                                        {auth.user.role === 'admin' ? (
                                            <>
                                                <NavLink href={route('admin.barang.index')} active={route().current('admin.barang.*')} icon={CubeIcon}>
                                                    Kelola Inventaris
                                                </NavLink>
                                                <NavLink href={route('admin.users.index')} active={route().current('admin.users.*')} icon={UserGroupIcon}>
                                                    Kelola User
                                                </NavLink>
                                            </>
                                        ) : (
                                            <>
                                                <NavLink href={route('pinjaman')} active={route().current('pinjaman')} icon={ClipboardDocumentListIcon}>
                                                    Pinjaman
                                                </NavLink>
                                                <NavLink href={route('riwayat')} active={route().current('riwayat')} icon={ClockIcon}>
                                                    Riwayat Pinjaman
                                                </NavLink>
                                            </>
                                        )}
                                    </>
                                )}
                            </div>
                        </div>

                        {/* Theme Toggle & Profile */}
                        <div className="hidden sm:flex sm:items-center sm:ml-6 sm:space-x-3">
                            <div className="relative">
                                <ThemeToggle />
                            </div>
                            {auth.user ? (
                                 <div className="relative dropdown-container">
                                    <button 
                                        onClick={() => setDropdownOpen(!dropdownOpen)}
                                        className="group inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-xl text-gray-700 dark:text-gray-300 bg-white/70 dark:bg-gray-800/70 hover:bg-gradient-to-r hover:from-primary/10 hover:to-secondary/10 dark:hover:from-secondary/10 dark:hover:to-primary/10 hover:text-primary dark:hover:text-secondary focus:outline-none focus:ring-2 focus:ring-primary/50 dark:focus:ring-secondary/50 transition-all duration-300 backdrop-blur-sm shadow-lg hover:shadow-xl hover:shadow-primary/20 dark:hover:shadow-secondary/20"
                                    >
                                        <div className="flex items-center space-x-2">
                                            <div className="w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold text-sm shadow-lg">
                                                {auth.user.name.charAt(0).toUpperCase()}
                                            </div>
                                            <div className="hidden md:block text-left">
                                                <div className="font-medium">{auth.user.name}</div>
                                                <div className="text-xs text-gray-500 dark:text-gray-400">{auth.user.role}</div>
                                            </div>
                                        </div>
                                        <ChevronDownIcon className={`ml-2 h-4 w-4 transition-transform duration-200 ${dropdownOpen ? 'rotate-180' : ''}`} />
                                    </button>
                                    
                                    {dropdownOpen && (
                                        <div className="absolute right-0 mt-2 w-56 bg-white/95 dark:bg-gray-800/95 rounded-2xl shadow-2xl border border-gray-200/50 dark:border-gray-700/50 py-2 z-50 backdrop-blur-xl animate-fade-in">
                                            <div className="px-4 py-3 border-b border-gray-200/50 dark:border-gray-700/50">
                                                <p className="text-sm font-medium text-gray-900 dark:text-gray-100">{auth.user.name}</p>
                                                <p className="text-xs text-gray-500 dark:text-gray-400">{auth.user.email}</p>
                                            </div>
                                            <Link
                                                href={route('profile.edit')}
                                                className="flex items-center px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-primary/10 hover:to-secondary/10 hover:text-primary dark:hover:text-secondary transition-all duration-200"
                                            >
                                                <SparklesIcon className="w-4 h-4 mr-3" />
                                                Profile Settings
                                            </Link>
                                            <Link
                                                href={route('logout')}
                                                method="post"
                                                as="button"
                                                className="flex items-center w-full px-4 py-3 text-sm text-gray-700 dark:text-gray-300 hover:bg-gradient-to-r hover:from-red-500/10 hover:to-red-600/10 hover:text-red-600 dark:hover:text-red-400 transition-all duration-200"
                                            >
                                                <XMarkIcon className="w-4 h-4 mr-3" />
                                                Log Out
                                            </Link>
                                        </div>
                                    )}
                                </div>
                            ) : (
                                <div className="flex items-center space-x-3">
                                    <Link 
                                        href={route('login')} 
                                        className="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary transition-all duration-200 rounded-lg hover:bg-white/50 dark:hover:bg-gray-800/50"
                                    >
                                        Login
                                    </Link>
                                    <Link 
                                        href={route('register')} 
                                        className="px-4 py-2 text-sm font-medium text-white bg-gradient-to-r from-primary to-secondary hover:from-primary/90 hover:to-secondary/90 rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl hover:shadow-primary/30 dark:hover:shadow-secondary/30 transform hover:scale-105"
                                    >
                                        Register
                                    </Link>
                                </div>
                            )}
                        </div>

                        {/* Mobile menu button */}
                        <div className="-mr-1 flex items-center sm:hidden space-x-1">
                            <div className="scale-90">
                                <ThemeToggle />
                            </div>
                            <button
                                onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
                                className="group inline-flex items-center justify-center p-3 rounded-xl text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-secondary hover:bg-gradient-to-r hover:from-primary/10 hover:to-secondary/10 focus:outline-none focus:ring-2 focus:ring-primary/50 dark:focus:ring-secondary/50 transition-all duration-300 backdrop-blur-sm min-h-[44px] min-w-[44px]"
                            >
                                <div className="relative w-6 h-6">
                                    <Bars3Icon className={`absolute inset-0 w-6 h-6 transition-all duration-300 ${!mobileMenuOpen ? 'opacity-100 rotate-0' : 'opacity-0 rotate-90'}`} />
                                    <XMarkIcon className={`absolute inset-0 w-6 h-6 transition-all duration-300 ${mobileMenuOpen ? 'opacity-100 rotate-0' : 'opacity-0 -rotate-90'}`} />
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                {/* Mobile menu */}
                <div className={`${mobileMenuOpen ? 'block animate-slide-in' : 'hidden'} sm:hidden bg-white/95 dark:bg-gray-800/95 backdrop-blur-xl border-t border-gray-200/50 dark:border-gray-700/50`}>
                    <div className="pt-3 pb-3 space-y-1 px-3">
                        <ResponsiveNavLink href={route('dashboard')} active={route().current('dashboard')} icon={HomeIcon}>
                            Dashboard
                        </ResponsiveNavLink>
                        {auth.user && (
                            <>
                                {auth.user.role === 'admin' ? (
                                    <>
                                        <ResponsiveNavLink href={route('admin.barang.index')} active={route().current('admin.barang.*')} icon={CubeIcon}>
                                            Kelola Inventaris
                                        </ResponsiveNavLink>
                                        <ResponsiveNavLink href={route('admin.users.index')} active={route().current('admin.users.*')} icon={UserGroupIcon}>
                                            Kelola User
                                        </ResponsiveNavLink>
                                    </>
                                ) : (
                                    <>
                                        <ResponsiveNavLink href={route('pinjaman')} active={route().current('pinjaman')} icon={ClipboardDocumentListIcon}>
                                            Pinjaman
                                        </ResponsiveNavLink>
                                        <ResponsiveNavLink href={route('riwayat')} active={route().current('riwayat')} icon={ClockIcon}>
                                            Riwayat Pinjaman
                                        </ResponsiveNavLink>
                                    </>
                                )}
                            </>
                        )}
                    </div>

                    {/* Mobile Profile */}
                    {auth.user && (
                        <div className="pt-3 pb-4 border-t border-gray-200/50 dark:border-gray-700/50 mx-3">
                            <div className="flex items-center space-x-3 px-4 py-4 bg-gradient-to-r from-primary/5 to-secondary/5 rounded-xl">
                                <div className="w-12 h-12 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                                    {auth.user.name.charAt(0).toUpperCase()}
                                </div>
                                <div className="flex-1 min-w-0">
                                    <div className="font-medium text-base text-gray-800 dark:text-gray-200 truncate">{auth.user.name}</div>
                                    <div className="font-medium text-sm text-gray-500 dark:text-gray-400 truncate">{auth.user.email}</div>
                                </div>
                            </div>
                            <div className="mt-3 space-y-1">
                                <ResponsiveNavLink href={route('profile.edit')} icon={SparklesIcon}>Profile Settings</ResponsiveNavLink>
                                <ResponsiveNavLink method="post" href={route('logout')} as="button" icon={XMarkIcon}>
                                    Log Out
                                </ResponsiveNavLink>
                            </div>
                        </div>
                    )}
                </div>
            </nav>

            {/* Page Heading */}
            {header && (
                <header className="relative bg-gradient-to-r from-white/40 via-white/30 to-white/40 dark:from-gray-800/40 dark:via-gray-800/30 dark:to-gray-800/40 backdrop-blur-xl border-b border-gray-200/30 dark:border-gray-700/30 transition-all duration-500">
                    <div className="absolute inset-0 bg-gradient-to-r from-primary/5 via-transparent to-secondary/5 dark:from-secondary/5 dark:via-transparent dark:to-primary/5" />
                    <div className="relative max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                        <div className="animate-fade-in">
                            {header}
                        </div>
                    </div>
                </header>
            )}

            {/* Page Content */}
            <main className="relative z-10">
                {children}
            </main>
        </div>
    );
}

// NavLink Component
function NavLink({ href, active, children, icon: Icon, ...props }: any) {
    return (
        <Link
            {...props}
            href={href}
            className={
                'group inline-flex items-center px-3 sm:px-4 py-2 text-sm font-medium leading-5 transition-all duration-300 ease-in-out focus:outline-none relative min-h-[44px] ' +
                (active
                    ? 'text-white bg-gradient-to-r from-primary to-secondary shadow-lg shadow-primary/30 dark:shadow-secondary/30 rounded-xl'
                    : 'text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-secondary')
            }
        >
            {active && (
                <div className="absolute inset-0 bg-gradient-to-r from-primary to-secondary animate-shimmer rounded-xl" />
            )}
            <div className="relative flex items-center space-x-1.5 sm:space-x-2">
                {Icon && <Icon className="w-4 h-4 flex-shrink-0" />}
                <span className="truncate">{children}</span>
            </div>
            {/* Animated underline for non-active items */}
            {!active && (
                <div className="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-primary to-secondary transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-in-out origin-left group-hover:origin-right" />
            )}
        </Link>
    );
}

// ResponsiveNavLink Component
function ResponsiveNavLink({ href, active, children, method = 'get', as = 'a', icon: Icon, ...props }: any) {
    return (
        <Link
            {...props}
            href={href}
            method={method}
            as={as}
            className={
                'group flex items-center space-x-3 px-4 py-4 text-base font-medium transition-all duration-300 ease-in-out rounded-xl relative overflow-hidden min-h-[52px] ' +
                (active
                    ? 'text-white bg-gradient-to-r from-primary to-secondary shadow-lg shadow-primary/30 dark:shadow-secondary/30'
                    : 'text-gray-600 dark:text-gray-400 hover:text-primary dark:hover:text-secondary hover:bg-gradient-to-r hover:from-primary/10 hover:to-secondary/10 hover:shadow-md')
            }
        >
            {active && (
                <div className="absolute inset-0 bg-gradient-to-r from-primary to-secondary animate-shimmer" />
            )}
            <div className="relative flex items-center space-x-3 flex-1 min-w-0">
                {Icon && <Icon className="w-5 h-5 flex-shrink-0" />}
                <span className="truncate">{children}</span>
            </div>
            {/* Animated underline for non-active items */}
            {!active && (
                <div className="absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-primary to-secondary transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-in-out origin-left group-hover:origin-right" />
            )}
        </Link>
    );
}