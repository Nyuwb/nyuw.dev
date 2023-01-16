/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
	'templates/**/*.html.twig',
    'assets/js/**/*.js',
  ],
  theme: {
    extend: {},
	fontFamily: {
		sans: ['Poppins', 'sans-serif']
	},
  },
  plugins: [
	require('@tailwindcss/forms')
  ],
}
