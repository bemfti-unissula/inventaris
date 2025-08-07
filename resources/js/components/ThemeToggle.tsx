import { useTheme } from '@/contexts/ThemeContext';
import { Sun, Moon } from 'lucide-react';

export default function ThemeToggle() {
    const { theme, toggleTheme } = useTheme();

    return (
        <button
            onClick={toggleTheme}
            className="relative inline-flex items-center justify-center w-10 h-10 rounded-lg transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 bg-white/10 dark:bg-gray-800/50 hover:bg-white/20 dark:hover:bg-gray-700/50 focus:ring-red-500 dark:focus:ring-yellow-400 border border-gray-300/20 dark:border-gray-600/30"
            title={theme === 'dark' ? 'Switch to Light Mode' : 'Switch to Dark Mode'}
        >
            <div className="relative w-5 h-5">
                {/* Sun Icon for Light Mode */}
                <Sun 
                    className={`absolute inset-0 w-5 h-5 transition-all duration-300 text-red-600 dark:text-yellow-400 ${
                        theme === 'light' 
                            ? 'opacity-100 rotate-0 scale-100' 
                            : 'opacity-0 rotate-90 scale-75'
                    }`}
                />
                
                {/* Moon Icon for Dark Mode */}
                <Moon 
                    className={`absolute inset-0 w-5 h-5 transition-all duration-300 text-red-600 dark:text-yellow-400 ${
                        theme === 'dark' 
                            ? 'opacity-100 rotate-0 scale-100' 
                            : 'opacity-0 -rotate-90 scale-75'
                    }`}
                />
            </div>
            
            {/* Ripple Effect */}
            <div className="absolute inset-0 rounded-lg bg-gradient-to-r from-red-500/20 to-yellow-400/20 opacity-0 hover:opacity-100 transition-opacity duration-300" />
        </button>
    );
}