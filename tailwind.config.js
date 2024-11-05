/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {fontFamily: {
      'primary': ['"Ubuntu"', ...defaultTheme.fontFamily.sans],
      'level':['"Zeyada"',],
    },},
  },
  plugins: [],
}

