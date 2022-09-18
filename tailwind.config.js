const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
            },
        },
        backgroundImage: {
            'banner-code': "url('https://www.packtpub.com/images/backgrounds/header-bg.png')"
        },
        colors: {
            'dark-grey': '#1a1a1a',
            'white': '#ffffff',
            'natural': '#fafafa',
        }
    },

    plugins: [require('@tailwindcss/forms')],
};
