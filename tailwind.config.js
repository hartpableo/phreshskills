/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/views/**/*.view.php",
    "./app/**/functions.php",
    "./app/**/Censor.php",
    "./theme/**/*.html",
    "./public/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        gold: "#FFD700"
      }
    },
    fontFamily: {
      "primary": [ "PT_SANS" ],
      "secondary": [ "Roboto_Slab" ],
    }
  },
  plugins: [],
}

