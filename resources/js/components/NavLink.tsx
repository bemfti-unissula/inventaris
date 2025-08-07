import { InertiaLinkProps, Link } from '@inertiajs/react';

export default function NavLink({
    active = false,
    className = '',
    children,
    ...props
}: InertiaLinkProps & { active: boolean }) {
    return (
        <Link
            {...props}
            className={
                'inline-flex items-center border-b-2 px-2 sm:px-1 pt-2 sm:pt-1 pb-2 sm:pb-1 text-sm font-medium leading-5 transition duration-150 ease-in-out focus:outline-none min-h-[44px] relative ' +
                (active
                    ? 'border-indigo-400 text-gray-900 focus:border-indigo-700'
                    : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 focus:border-gray-300 focus:text-gray-700 hover:after:w-full after:content-[""] after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-gradient-to-r after:from-primary after:to-secondary after:transition-all after:duration-300 after:ease-in-out') +
                ' ' + className
            }
        >
            {children}
        </Link>
    );
}
