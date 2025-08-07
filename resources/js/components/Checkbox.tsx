import { InputHTMLAttributes, useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { CheckIcon } from '@heroicons/react/24/outline';

interface CheckboxProps extends InputHTMLAttributes<HTMLInputElement> {
    label?: string;
    description?: string;
}

export default function Checkbox({
    className = '',
    label,
    description,
    checked,
    onChange,
    ...props
}: CheckboxProps) {
    const [isChecked, setIsChecked] = useState(checked || false);

    const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
        setIsChecked(e.target.checked);
        onChange?.(e);
    };

    return (
        <div className="flex items-start space-x-3">
            <div className="relative flex items-center">
                <input
                    {...props}
                    type="checkbox"
                    checked={isChecked}
                    onChange={handleChange}
                    className="sr-only"
                />
                
                <motion.div
                    className={`
                        w-5 h-5 rounded-md border-2 cursor-pointer flex items-center justify-center
                        transition-all duration-200
                        ${
                            isChecked
                                ? 'bg-red-600 dark:bg-yellow-400 border-red-600 dark:border-yellow-400'
                                : 'bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600 hover:border-red-500 dark:hover:border-yellow-400'
                        }
                        ${className}
                    `}
                    onClick={() => {
                        const event = {
                            target: { checked: !isChecked },
                            currentTarget: { checked: !isChecked }
                        } as React.ChangeEvent<HTMLInputElement>;
                        handleChange(event);
                    }}
                    whileHover={{ scale: 1.05 }}
                    whileTap={{ scale: 0.95 }}
                    transition={{ type: "spring", stiffness: 400, damping: 17 }}
                >
                    <AnimatePresence>
                        {isChecked && (
                            <motion.div
                                initial={{ scale: 0, opacity: 0 }}
                                animate={{ scale: 1, opacity: 1 }}
                                exit={{ scale: 0, opacity: 0 }}
                                transition={{ duration: 0.15 }}
                                className="text-white dark:text-black"
                            >
                                <CheckIcon className="w-3 h-3 stroke-2" />
                            </motion.div>
                        )}
                    </AnimatePresence>
                </motion.div>
            </div>
            
            {(label || description) && (
                <div className="flex-1">
                    {label && (
                        <motion.label
                            className="block text-sm font-medium text-gray-900 dark:text-white cursor-pointer"
                            onClick={() => {
                                const event = {
                                    target: { checked: !isChecked },
                                    currentTarget: { checked: !isChecked }
                                } as React.ChangeEvent<HTMLInputElement>;
                                handleChange(event);
                            }}
                            initial={{ opacity: 0 }}
                            animate={{ opacity: 1 }}
                            transition={{ delay: 0.1 }}
                        >
                            {label}
                        </motion.label>
                    )}
                    {description && (
                        <motion.p
                            className="text-sm text-gray-500 dark:text-gray-400"
                            initial={{ opacity: 0 }}
                            animate={{ opacity: 1 }}
                            transition={{ delay: 0.15 }}
                        >
                            {description}
                        </motion.p>
                    )}
                </div>
            )}
        </div>
    );
}
