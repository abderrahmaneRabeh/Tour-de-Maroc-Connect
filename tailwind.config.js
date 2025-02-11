/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/**/*.{php,html,js}"], 
  theme: {
    extend: {
    },
    container: {
      center: true,
      padding: {
        DEFAULT: "1.25rem", 
        md: "2.5rem", 
      },
    },
  },
  plugins: [],
};

