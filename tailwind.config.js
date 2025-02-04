import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            colors: {},
            fontFamily: {
                default: ["Inter", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require("flowbite/plugin")],
};
