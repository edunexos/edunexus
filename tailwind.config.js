import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./vendor/ramonrietdijk/livewire-tables/resources/**/*.blade.php"
    ],

    theme: {
        extend: {
            fontFamily: {
                inter: ['Inter', "sans-serif"],
            },
            colors: {
                blue85: 'rgba(81, 78, 243, 0.85)',
                blue15: 'rgba(81, 78, 243, 0.15)',
                black33: '#333333',
            },
        },
    },

    plugins: [forms, typography],
};
