/** @type {import('tailwindcss').Config} */
export default {
    content: [
        // "./index.html",
        // "./src/**/*.{vue,js,ts,jsx,tsx}",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                beige: '#FFF5E0',
                rose: '#FF6969',
                red: '#C70039',
                ink: '#141E46',
            },
            fontFamily: {
                'sans': ['Noto-Sans-Georgian']
            }
        },
    },
    plugins: [],
}

