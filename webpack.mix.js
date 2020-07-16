const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js');
mix.postCss('resources/css/main.css', 'public/css', [
    require('tailwindcss'),
    require('autoprefixer'),
])
// const tailwindcss = require('tailwindcss')
//
// mix.less('resources/css/main.css', 'public/css')
//     .options({
//         postCss: [
//             tailwindcss('tailwindcss-config.js'),
//         ]
//     });

const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin')

var webpackConfig = {
    plugins: [
        new VuetifyLoaderPlugin()
    ]
}
mix.webpackConfig(webpackConfig)

// webpack.config.js
//
// const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin')
//
// module.exports = {
//     plugins: [
//         new VuetifyLoaderPlugin()
//     ],
// }
