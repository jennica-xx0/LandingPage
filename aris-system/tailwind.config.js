/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['"Barlow Semi Condensed"', ...defaultTheme.fontFamily.sans],
        serif: ['"Barlow Semi Condensed"', ...defaultTheme.fontFamily.serif],
        mono: ['"Barlow Semi Condensed"', ...defaultTheme.fontFamily.mono],
      },
    },
  },
  plugins: [require("daisyui")],
}