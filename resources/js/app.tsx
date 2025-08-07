import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot } from 'react-dom/client';
import { ThemeProvider } from './contexts/ThemeContext';
import React, { Suspense } from 'react';
import { motion } from 'framer-motion';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// Loading Component dengan animasi menarik
const LoadingSpinner = () => (
    <div className="min-h-screen bg-gray-50 dark:bg-gray-900 flex items-center justify-center transition-colors duration-300">
        <div className="text-center">
            <motion.div
                className="inline-block w-16 h-16 border-4 border-red-500 dark:border-yellow-400 border-t-transparent rounded-full"
                animate={{ rotate: 360 }}
                transition={{ duration: 1, repeat: Infinity, ease: "linear" }}
            />
            <motion.p
                className="mt-4 text-lg font-medium text-gray-700 dark:text-gray-300"
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                transition={{ delay: 0.2 }}
            >
                Memuat halaman...
            </motion.p>
        </div>
    </div>
);

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        // Implementasi lazy loading untuk semua pages
        const pages = import.meta.glob('./Pages/**/*.tsx', { eager: false });
        const page = pages[`./Pages/${name}.tsx`];
        
        if (!page) {
            throw new Error(`Page not found: ${name}`);
        }
        
        return page().then((module: any) => {
            const Component = module.default;
            
            // Wrap component dengan lazy loading
            return {
                default: React.lazy(() => Promise.resolve({ default: Component }))
            };
        });
    },
    setup({ el, App, props }) {
        const root = createRoot(el);

        root.render(
            <ThemeProvider>
                <Suspense fallback={<LoadingSpinner />}>
                    <App {...props} />
                </Suspense>
            </ThemeProvider>
        );
    },
    progress: {
        color: '#B82532',
        showSpinner: true,
    },
});
