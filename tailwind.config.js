/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/views/**/*.view.php",
    "./app/**/functions.php",
    "./theme/**/*.html",
    "./public/**/*.js",
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

