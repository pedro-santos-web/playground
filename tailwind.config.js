const { colors } = require("laravel-mix/src/Log");

module.exports = {
	darkMode: 'class',
	content: [
		'./resources/views/**/*.blade.php',
	],
	theme: {
		extend: {
			colors: {
				primary: '#202225',
				secondary: '#1B75BC',
				gray: colors.trueGray,
				gray: {
					900: '#202225',
					800: '#2f3136',
					700: '#36393f',
					600: '#4f545c',
					400: '#d4d7dc',
					300: '#e3e5e8',
					200: '#ebedef',
					100: '#f2f3f5',
				},
			},
		},
	},
	plugins: [],
}
