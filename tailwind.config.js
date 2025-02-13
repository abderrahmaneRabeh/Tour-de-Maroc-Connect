/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/**/*.{php,html,js}", "./public/**/*.{php,html,js}"],
  theme: {
    extend: {
      colors: {
        primary: "#dc2626",
        black: "#000000",
      },
      container: {
        center: true,
        padding: {
          DEFAULT: "1.25rem",
          md: "2.5rem",
        },
      },
    },
  },
  plugins: [],
};
