// tailwind.config.js
/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue", // Keep this if you ever use Vue
  ],
 theme: {
    extend: {},
  },
  // Add daisyUI plugin here
  plugins: [require("daisyui")],
}