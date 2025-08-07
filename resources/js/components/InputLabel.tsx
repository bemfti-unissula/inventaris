import { LabelHTMLAttributes } from 'react';

interface InputLabelProps extends LabelHTMLAttributes<HTMLLabelElement> {
    value?: string;
    required?: boolean;
    error?: boolean;
    size?: 'sm' | 'md' | 'lg';
}

export default function InputLabel({
    value,
    className = '',
    children,
    required = false,
    error = false,
    size = 'md',
    ...props
}: InputLabelProps) {
    const sizeClasses = {
        sm: 'text-xs',
        md: 'text-sm',
        lg: 'text-base'
    };

    return (
        <label
            {...props}
            className={`
                block font-semibold transition-all duration-200 animate-fade-in
                ${
                    error
                        ? 'text-red-600 dark:text-red-400'
                        : 'text-gray-700 dark:text-gray-300 hover:text-red-600 dark:hover:text-yellow-400'
                }
                ${sizeClasses[size]}
                ${className}
            `}
        >
            <span className="flex items-center gap-1">
                {value ? value : children}
                {required && (
                    <span className="text-red-500 dark:text-red-400 animate-bounce">
                        *
                    </span>
                )}
            </span>
        </label>
    );
}
