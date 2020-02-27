const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath('public/')
    .setResourceRoot('/')
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .js('resources/js/models/apiSelect.js', 'public/js')
    .js('resources/js/models/equipmentSelect.js', 'public/js')
    .js('resources/js/models/owlCarousel.js', 'public/js')
    .js('resources/js/models/translatable.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/auth.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .sass('resources/sass/frontend.scss', 'public/css')
    .sass('resources/sass/owlCarousel.scss', 'public/css');
