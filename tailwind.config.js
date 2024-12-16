import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		 './storage/framework/views/*.php',
		 './resources/**/*.blade.php',
		 './resources/**/*.js',
		 './resources/**/*.vue',
		 "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
	],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "primary-purple": '#AD1FEA',
                "royal-blue": '#4661E6',
                "dark-blue": '#373E96', // 深蓝色稍调和后
                "ghost": '#F2F4FF',
                "alice-blue": '#F7F8FD',
                gunmetal: '#3A4374',
                slate: '#647196',
                "salmon-pink": '#F49F85',
                "sky-blue": '#62BCFA',
                "warning-red": "#D73737"
            },
            backgroundImage: {
                "desktop-header": "url('/public/images/suggestions/desktop/background-header.png')",
                "mobile-header": "url('/images/suggestions/mobile/background-header.png')",
                "tablet-header": "url('/images/suggestions/tablet/background-header.png')",
            }
        },
    },
    plugins: [
		require("daisyui")
	]
};
