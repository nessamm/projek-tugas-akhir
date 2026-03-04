/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './application/views/**/*.{php,html}',
    './application/controllers/**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        'dark-bg': '#0f0f0f',
        'dark-card': '#1a1a2e',
        'dark-border': '#2a2a2a',
      },
      fontFamily: {
        sans: ['Nunito', 'sans-serif'],
      }
    },
  },
  plugins: [],
  darkMode: 'class',
}
