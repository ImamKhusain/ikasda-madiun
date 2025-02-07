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
            colors: {
                primary: "#FFD600",
                secondary: "#FE0000",
                trinary: "#03A0F4",
            },
            fontFamily: {
                default: ["Inter", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require("flowbite/plugin")],
};
