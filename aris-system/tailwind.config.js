/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('daisyui'),
  ],

  // Add this section to enable your theme
  daisyui: {
    themes: [
      {
        Project_tracker: { // Must match the name from your app.css
          "base-100": "oklch(98% 0.001 106.423)",
          "base-content": "oklch(21% 0.006 56.043)",
          "primary": "rgb(255, 225, 1)",
          "secondary": "rgb(35, 44, 84)",
          // Add any other colors from your theme here
        },
      },
    ],
  },
}