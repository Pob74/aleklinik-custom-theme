/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["*.php", "**/*.php", "lib/**/*.php", "components/**/*.php"],
  theme: {
    extend: {
      fontFamily: {
        sans: ["Montserrat", "Arial", "sans-serif"]
      },
      colors: {
        "custom-gray": "#6b7280" // Example gray
      }
    }
  },
  plugins: [
    require("@tailwindcss/typography"),
    require("tailwind-scrollbar-hide")
  ]
}
