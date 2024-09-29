import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
                'poppins' : 'Poppins, sans-serif',
                'alegreya' : 'Alegreya Sans, sans-serif',
                eafont: ['myFont', 'sans-serif'],
            },
            colors: {
                'primary': '#040D12',
                'secondary': '#262626',
            },
            animation: {
                'light-moving': 'lightMoving 3s linear infinite',
              },
              keyframes: {
                lightSwipe: {
                    '0%': { transform: 'translateX(-100%)', opacity: '0' },
                    '50%': { transform: 'translateX(100%)', opacity: '1' },
                    '100%': { transform: 'translateX(200%)', opacity: '0' },
                  },
              },
        },
    },

    plugins: [forms, require('daisyui')],
    
};
