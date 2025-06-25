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

mix.styles([
    'public/admin-assets/css/bootstrap.min.css',
    'public/admin-assets/css/app.css',
    'public/admin-assets/css/custom.css',
    'public/admin-assets/css/icons.css',
    'public/admin-assets/plugins/tabulator/bootstrap/tabulator_bootstrap4.css',
    'public/admin-assets/plugins/sweet-alert2/sweetalert2.min.css',
], 'public/css/app.css');

mix.combine([
    'public/admin-assets/js/custom.js',
    'public/admin-assets/plugins/apexcharts/apexcharts.min.js',
    'public/admin-assets/js/feather.min.js',
    'public/admin-assets/js/bootstrap.bundle.min.js',
    'public/admin-assets/js/simplebar.min.js',
    'public/admin-assets/plugins/tabulator/tabulator.min.js',
    'public/admin-assets/plugins/sweet-alert2/sweetalert2.min.js',
    'public/admin-assets/pages/form-validation.js',
    'public/admin-assets/js/app.js',
], 'public/js/app.js', true);

// In production environtment use versioning
if (mix.inProduction()) {                       
    mix.version();
}