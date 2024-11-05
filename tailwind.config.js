/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')
export default {
  content: ["./index.html", "./src/**/*.{ts,tsx,js,jsx}"],
  theme: {
    extend: {fontFamily: {
      'primary': ['"Ubuntu"', ...defaultTheme.fontFamily.sans],
      'secondary':['"Zeyada"',],
    },},
  },
  plugins: [],
}

