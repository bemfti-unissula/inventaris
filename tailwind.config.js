import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.tsx',
    ],
    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                display: ['Inter', 'system-ui', 'sans-serif'],
                mono: ['JetBrains Mono', 'Fira Code', 'monospace'],
                superline: ['Superline', 'Inter', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
            },
            colors: {
                // Vibrant custom color palette
                primary: {
                    DEFAULT: '#B72532', // Primary red
                    red: '#B72532',
                    yellow: '#F9BC17',
                    50: '#fef2f2',
                    100: '#fee2e2',
                    200: '#fecaca',
                    300: '#fca5a5',
                    400: '#f87171',
                    500: '#B72532',
                    600: '#a21e2a',
                    700: '#8b1a22',
                    800: '#74161a',
                    900: '#5d1214',
                    // Vibrant variants
                    bright: '#E63946',
                    electric: '#FF006E',
                    neon: '#FB8500',
                },
                secondary: {
                    DEFAULT: '#F9BC17', // Secondary yellow
                    50: '#fffbeb',
                    100: '#fef3c7',
                    200: '#fde68a',
                    300: '#fcd34d',
                    400: '#F9BC17',
                    500: '#f59e0b',
                    600: '#d97706',
                    700: '#b45309',
                    800: '#92400e',
                    900: '#78350f',
                    // Vibrant variants
                    bright: '#FFD60A',
                    electric: '#FFBE0B',
                    neon: '#FB8500',
                },
                // Accent colors
                purple: {
                    DEFAULT: '#8B5CF6',
                    bright: '#A855F7',
                    electric: '#9333EA',
                    neon: '#7C3AED',
                },
                pink: {
                    DEFAULT: '#EC4899',
                    bright: '#F472B6',
                    electric: '#E879F9',
                    neon: '#D946EF',
                },
                cyan: {
                    DEFAULT: '#06B6D4',
                    bright: '#22D3EE',
                    electric: '#0891B2',
                    neon: '#0E7490',
                },
                emerald: {
                    DEFAULT: '#10B981',
                    bright: '#34D399',
                    electric: '#059669',
                    neon: '#047857',
                },
                orange: {
                    DEFAULT: '#F97316',
                    bright: '#FB923C',
                    electric: '#EA580C',
                    neon: '#C2410C',
                },
                indigo: {
                    DEFAULT: '#6366F1',
                    bright: '#818CF8',
                    electric: '#4F46E5',
                    neon: '#4338CA',
                },
                theme: {
                    dark: '#282828',
                    light: '#F5F5F5',
                },
                // Override default colors with custom palette
                red: {
                    50: '#fef2f2',
                    100: '#fee2e2',
                    200: '#fecaca',
                    300: '#fca5a5',
                    400: '#f87171',
                    500: '#B72532', // Custom red
                    600: '#a21e2a',
                    700: '#8b1a22',
                    800: '#74161a',
                    900: '#5d1214',
                },
                yellow: {
                    50: '#fffbeb',
                    100: '#fef3c7',
                    200: '#fde68a',
                    300: '#fcd34d',
                    400: '#F9BC17', // Custom yellow
                    500: '#f59e0b',
                    600: '#d97706',
                    700: '#b45309',
                    800: '#92400e',
                    900: '#78350f',
                },
                gray: {
                    50: '#fafafa',
                    100: '#F5F5F5', // Custom light mode
                    200: '#e5e5e5',
                    300: '#d4d4d4',
                    400: '#a3a3a3',
                    500: '#737373',
                    600: '#525252',
                    700: '#404040',
                    800: '#282828', // Custom dark mode
                    900: '#171717',
                },
            },
            backgroundImage: {
                'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                'gradient-conic': 'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
                'gradient-creative': 'linear-gradient(45deg, #B72532 0%, #F9BC17 50%, #B72532 100%)',
                'gradient-dark': 'linear-gradient(135deg, #282828 0%, #171717 100%)',
                'gradient-light': 'linear-gradient(135deg, #F5F5F5 0%, #ffffff 100%)',
                // Vibrant gradients
                'gradient-vibrant': 'linear-gradient(135deg, #B72532 0%, #F9BC17 50%, #E63946 100%)',
                'gradient-electric': 'linear-gradient(45deg, #FF006E 0%, #FB8500 50%, #FFD60A 100%)',
                'gradient-neon': 'linear-gradient(135deg, #8B5CF6 0%, #EC4899 50%, #06B6D4 100%)',
                'gradient-sunset': 'linear-gradient(135deg, #F97316 0%, #FB923C 50%, #FFD60A 100%)',
                'gradient-ocean': 'linear-gradient(135deg, #06B6D4 0%, #22D3EE 50%, #8B5CF6 100%)',
                'gradient-forest': 'linear-gradient(135deg, #10B981 0%, #34D399 50%, #059669 100%)',
                'gradient-cosmic': 'linear-gradient(135deg, #4338CA 0%, #7C3AED 50%, #EC4899 100%)',
                'gradient-aurora': 'linear-gradient(135deg, #22D3EE 0%, #A855F7 50%, #F472B6 100%)',
                // Glass effects
                'glass-light': 'linear-gradient(135deg, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0.05) 100%)',
                'glass-dark': 'linear-gradient(135deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.05) 100%)',
                'glass-primary': 'linear-gradient(135deg, rgba(183,37,50,0.1) 0%, rgba(249,188,23,0.05) 100%)',
            },
            animation: {
                'fade-in': 'fadeIn 0.5s ease-in-out',
                'fade-in-up': 'fadeInUp 0.6s ease-out',
                'fade-in-down': 'fadeInDown 0.6s ease-out',
                'slide-in-left': 'slideInLeft 0.5s ease-out',
                'slide-in-right': 'slideInRight 0.5s ease-out',
                'scale-in': 'scaleIn 0.3s ease-out',
                'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                // Vibrant animations
                'gradient-x': 'gradient-x 15s ease infinite',
                'gradient-y': 'gradient-y 15s ease infinite',
                'gradient-xy': 'gradient-xy 15s ease infinite',
                'float': 'float 6s ease-in-out infinite',
                'float-slow': 'float-slow 8s ease-in-out infinite',
                'bounce-subtle': 'bounce-subtle 2s ease-in-out infinite',
                'pulse-glow': 'pulse-glow 2s ease-in-out infinite',
                'shimmer': 'shimmer 2s linear infinite',
                'wiggle': 'wiggle 1s ease-in-out infinite',
                'scale-pulse': 'scale-pulse 2s ease-in-out infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(30px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeInDown: {
                    '0%': { opacity: '0', transform: 'translateY(-30px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                slideInLeft: {
                    '0%': { opacity: '0', transform: 'translateX(-30px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                slideInRight: {
                    '0%': { opacity: '0', transform: 'translateX(30px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                scaleIn: {
                    '0%': { opacity: '0', transform: 'scale(0.9)' },
                    '100%': { opacity: '1', transform: 'scale(1)' },
                },
                // Vibrant keyframes
                'gradient-x': {
                    '0%, 100%': {
                        'background-size': '200% 200%',
                        'background-position': 'left center'
                    },
                    '50%': {
                        'background-size': '200% 200%',
                        'background-position': 'right center'
                    },
                },
                'gradient-y': {
                    '0%, 100%': {
                        'background-size': '200% 200%',
                        'background-position': 'center top'
                    },
                    '50%': {
                        'background-size': '200% 200%',
                        'background-position': 'center bottom'
                    },
                },
                'gradient-xy': {
                    '0%, 100%': {
                        'background-size': '400% 400%',
                        'background-position': 'left center'
                    },
                    '50%': {
                        'background-size': '200% 200%',
                        'background-position': 'right center'
                    },
                },
                'float': {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
                'float-slow': {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-15px)' },
                },
                'bounce-subtle': {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-5px)' },
                },
                'pulse-glow': {
                    '0%, 100%': { 
                        'box-shadow': '0 0 5px rgba(183, 37, 50, 0.5)',
                        transform: 'scale(1)'
                    },
                    '50%': { 
                        'box-shadow': '0 0 20px rgba(249, 188, 23, 0.8)',
                        transform: 'scale(1.02)'
                    },
                },
                'shimmer': {
                    '0%': { transform: 'translateX(-100%)' },
                    '100%': { transform: 'translateX(100%)' },
                },
                'wiggle': {
                    '0%, 100%': { transform: 'rotate(-3deg)' },
                    '50%': { transform: 'rotate(3deg)' },
                },
                'scale-pulse': {
                    '0%, 100%': { transform: 'scale(1)' },
                    '50%': { transform: 'scale(1.05)' },
                },
            },
        },
    },

    plugins: [forms],
};
