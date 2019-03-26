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

mix.sass('resources/scss/admin/main.scss', 'public/css/admin/compiled.min.css');
mix.sass('resources/scss/admin/vendor.scss', 'public/css/admin/vendor.min.css');

mix.sass('resources/scss/frontend/main.scss', 'public/css/frontend/compiled.min.css');
mix.sass('resources/scss/frontend/vendor.scss', 'public/css/frontend/vendor.min.css');

mix.scripts('resources/js/frontend/app.js', 'public/js/frontend/app.min.js');
mix.scripts('resources/js/admin/app.js', 'public/js/admin/app.min.js');