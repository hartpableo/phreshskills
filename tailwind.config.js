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
      "primary": [ "PT_SANS" ],
      "secondary": [ "Roboto_Slab" ],
    }
  },
  plugins: [],
}

