/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
	'templates/**/*.html.twig',
    'assets/js/**/*.js',
  ],
  theme: {
    colors: {
        'aqua-forest': '#529972'
    },
    extend: {},
	fontFamily: {
		sans: ['Poppins', 'sans-serif']
	},
  },
  plugins: [
	require('@tailwindcss/forms')
  ],
}
