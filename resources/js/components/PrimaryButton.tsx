import { ButtonHTMLAttributes } from 'react';

interface PrimaryButtonProps extends ButtonHTMLAttributes<HTMLButtonElement> {
    variant?: 'primary' | 'secondary' | 'outline';
    size?: 'sm' | 'md' | 'lg';
    loading?: boolean;
    icon?: React.ReactNode;
}

export default function PrimaryButton({
    className = '',
    disabled,
    children,
    variant = 'primary',
    size = 'md',
    loading = false,
    icon,
    ...props
}: PrimaryButtonProps) {
    const baseClasses = 'inline-flex items-center justify-center font-semibold rounded-xl transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-opacity-50 disabled:opacity-50 disabled:cursor-not-allowed transform hover:scale-105 active:scale-95';
    
    const sizeClasses = {
        sm: 'px-4 py-2 text-sm',
        md: 'px-6 py-3 text-base',
        lg: 'px-8 py-4 text-lg'
    };
    
    const variantClasses = {
        primary: 'bg-gradient-to-r from-red-600 to-red-700 dark:from-yellow-400 dark:to-yellow-500 text-white dark:text-black hover:from-red-700 hover:to-red-800 dark:hover:from-yellow-500 dark:hover:to-yellow-600 focus:ring-red-500 dark:focus:ring-yellow-400 shadow-lg hover:shadow-xl',
        secondary: 'bg-gray-600 dark:bg-gray-700 text-white hover:bg-gray-700 dark:hover:bg-gray-600 focus:ring-gray-500 shadow-md hover:shadow-lg',
        outline: 'border-2 border-red-600 dark:border-yellow-400 text-red-600 dark:text-yellow-400 hover:bg-red-600 dark:hover:bg-yellow-400 hover:text-white dark:hover:text-black focus:ring-red-500 dark:focus:ring-yellow-400'
    };
    
    return (
        <button
            {...props}
            className={`${baseClasses} ${sizeClasses[size]} ${variantClasses[variant]} ${className}`}
            disabled={disabled || loading}
        >
            {loading && (
                <div className="mr-2 animate-spin">
                    <svg className="w-4 h-4" fill="none" viewBox="0 0 24 24">
                        <circle
                            className="opacity-25"
                            cx="12"
                            cy="12"
                            r="10"
                            stroke="currentColor"
                            strokeWidth="4"
                        />
                        <path
                            className="opacity-75"
                            fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                        />
                    </svg>
                </div>
            )}
            
            {icon && !loading && (
                <span className="mr-2">{icon}</span>
            )}
            
            {children}
        </button>
    );
}
