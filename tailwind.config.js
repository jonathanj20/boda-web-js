/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        "alexbrush": ["Alex Brush", "cursive"],
        "allura": ["Allura", "cursive"],
        "montserrat": ["Montserrat", "sans-serif"],
        "nunito": ["Nunito", "sans-serif"],
        "sofadi": ["Sofadi One", "system-ui"]
      }
    },
  },
  plugins: [],
}


