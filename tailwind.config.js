const {fill} = require('tailwindcss/defaultTheme')

module.exports = {
    purge: [],
    theme: {
        extend: {
            colors: {
                'cream': '#FAF7F5',
                'black': '#3C4041',
                'ocean': '#9FD4DA',
                'salmon': '#F46F60'
            },
            fill: theme => ({
                'salmon': theme('colors.salmon')
            }),
            borderRadius: {
                'medium': '15px',
                'large': '20px'
            },
            flexGrow: {
                '1': 1,
                '2': 2
            }
        },
    },
    variants: {},
    plugins: [],
}
