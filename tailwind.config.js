/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/views/**/*.php",
    "./public/**/*.js",
    "./theme/**/*.html",
  ],
  theme: {
    extend: {},
    fontFamily: {
      "primary": [ "Roboto_Slab" ],
      "secondary": [ "PT_SANS" ],
    }
  },
  plugins: [],
}

