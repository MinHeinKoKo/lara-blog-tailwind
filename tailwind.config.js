const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    darkMode: "class",

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                'montserret': 'Montserrat',
            },
            colors: {
                "primary" : "#232946",
                "headline" : "#fffffe",
                "paragraph" : "#b8c1ec",
                "button" : "#eebbc3",
                "but-text" : "#232946",
                "main" : "#b8c1ec",
                "description" : "#0f0e17"
            }
        },
    },

    plugins: [require("@tailwindcss/forms"),require('@tailwindcss/typography'),require('flowbite/plugin')],
};
