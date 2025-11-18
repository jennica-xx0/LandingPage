// vite.config.js

import { defineConfig } from 'vite' // <-- ADD THIS LINE

export default defineConfig({
  // Your existing configuration content goes here
  plugins: [
    // ... your plugins
  ],
  server: {
    // If you added this previously, keep it:
    hmr: {
      overlay: false,
    }
  }
});