import { HTMLAttributes } from 'react';
import { ExclamationTriangleIcon } from '@heroicons/react/24/outline';

interface InputErrorProps extends HTMLAttributes<HTMLParagraphElement> {
    message?: string;
    messages?: string[];
    showIcon?: boolean;
}

export default function InputError({
    message,
    messages,
    className = '',
    showIcon = true,
    ...props
}: InputErrorProps) {
    const errorMessages = messages || (message ? [message] : []);
    
    return errorMessages.length > 0 ? (
        <div className="mt-2 animate-fade-in">
            {errorMessages.map((error, index) => (
                <p
                    key={index}
                    {...props}
                    className={`
                        flex items-center gap-2 text-sm text-red-600 dark:text-red-400
                        font-medium transition-colors duration-200
                        ${index > 0 ? 'mt-1' : ''}
                        ${className}
                    `}
                >
                    {showIcon && (
                        <div className="animate-pulse">
                            <ExclamationTriangleIcon className="w-4 h-4 flex-shrink-0" />
                        </div>
                    )}
                    <span>{error}</span>
                </p>
            ))}
        </div>
    ) : null;
}
