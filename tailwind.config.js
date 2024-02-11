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
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                blue2: 'rgba(42, 54, 127, 1)',
                blue: '#6a00de',
                'blue-100': '#c0b0ff',
                'blue-200': '#8b74ff',
                'blue-300': '#553dff',
                'blue-400': '#2d14b2',
                or: '#ffc774',
              },

            spacing: {
                '132': '29rem',
                '148': '38rem',
            },
            minHeight: {
                'lg-banner': '38rem'
            },
        },
    },

    plugins: [forms],
};
