import {
    forwardRef,
    InputHTMLAttributes,
    useEffect,
    useImperativeHandle,
    useRef,
    useState,
} from 'react';
import { motion } from 'framer-motion';

interface TextInputProps extends InputHTMLAttributes<HTMLInputElement> {
    isFocused?: boolean;
    error?: string;
    icon?: React.ReactNode;
    label?: string;
}

export default forwardRef(function TextInput(
    {
        type = 'text',
        className = '',
        isFocused = false,
        error,
        icon,
        label,
        ...props
    }: TextInputProps,
    ref,
) {
    const localRef = useRef<HTMLInputElement>(null);
    const [focused, setFocused] = useState(false);

    useImperativeHandle(ref, () => ({
        focus: () => localRef.current?.focus(),
    }));

    useEffect(() => {
        if (isFocused) {
            localRef.current?.focus();
        }
    }, [isFocused]);

    const handleFocus = (e: React.FocusEvent<HTMLInputElement>) => {
        setFocused(true);
        props.onFocus?.(e);
    };

    const handleBlur = (e: React.FocusEvent<HTMLInputElement>) => {
        setFocused(false);
        props.onBlur?.(e);
    };

    return (
        <div className="relative">
            {label && (
                <motion.label
                    className={`block text-sm font-semibold mb-2 transition-colors duration-200 ${
                        error
                            ? 'text-red-600 dark:text-red-400'
                            : focused
                            ? 'text-red-600 dark:text-yellow-400'
                            : 'text-gray-700 dark:text-gray-300'
                    }`}
                    initial={{ opacity: 0, y: -10 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.2 }}
                >
                    {label}
                </motion.label>
            )}
            
            <div className="relative">
                {icon && (
                    <div className="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <div className={`transition-colors duration-200 ${
                            error
                                ? 'text-red-500 dark:text-red-400'
                                : focused
                                ? 'text-red-500 dark:text-yellow-400'
                                : 'text-gray-400'
                        }`}>
                            {icon}
                        </div>
                    </div>
                )}
                
                <input
                    {...props}
                    type={type}
                    className={`
                        w-full py-3 px-4 bg-gray-50 dark:bg-gray-700 border-2 rounded-xl
                        transition-all duration-200 focus:outline-none transform focus:scale-105
                        text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400
                        ${icon ? 'pl-12' : 'pl-4'}
                        ${error
                            ? 'border-red-500 focus:border-red-600 dark:border-red-500 dark:focus:border-red-400'
                            : focused
                            ? 'border-red-500 dark:border-yellow-400 focus:border-red-600 dark:focus:border-yellow-500'
                            : 'border-gray-200 dark:border-gray-600 focus:border-red-500 dark:focus:border-yellow-400'
                        }
                        ${className}
                    `}
                    ref={localRef}
                    onFocus={handleFocus}
                    onBlur={handleBlur}
                />
            </div>
            
            {error && (
                <motion.p
                    className="mt-2 text-sm text-red-600 dark:text-red-400"
                    initial={{ opacity: 0, y: -10 }}
                    animate={{ opacity: 1, y: 0 }}
                    exit={{ opacity: 0, y: -10 }}
                    transition={{ duration: 0.2 }}
                >
                    {error}
                </motion.p>
            )}
        </div>
    );
});
