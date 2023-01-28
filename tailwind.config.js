/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
	'templates/**/*.html.twig',
    'assets/js/**/*.js',
  ],
  theme: {
    extend: {
        colors: {
            'aqua-forest': '#529972',
            'panda': {
                400: '#E97F16',
                600: '#D74A09',
                800: '#932B0E',
                900: '#391B10'
            },
            'github': '#161B22',
            'discord': '#8B9EFF',
            'twitter': '#1DA1F2',
            'twitch': '#A970FF',
        }
    },
	fontFamily: {
		sans: ['Poppins', 'sans-serif']
	},
  },
  plugins: [
	require('@tailwindcss/forms')
  ],
}
