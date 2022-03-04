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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.styles(
    [
        "node_modules/smartwizard/dist/css/smart_wizard.min.css",
        "node_modules/smartwizard/dist/css/smart_wizard_theme_arrows.css",
        "node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css",
        "node_modules/sweetalert2/dist/sweetalert2.min.css",
        "node_modules/select2/dist/css/select2.min.css",
        "node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css",
        "node_modules/toastr/build/toastr.min.css",
        "node_modules/highcharts/css/highcharts.css",
        "node_modules/mapbox-gl/dist/mapbox-gl.css"
    ],
    "public/css/costumestyle.css"
);

mix.scripts(
    [
        "node_modules/smartwizard/dist/js/jquery.smartWizard.min.js",
        "node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",
        "node_modules/sweetalert2/dist/sweetalert2.min.js",
        "node_modules/select2/dist/js/select2.full.min.js",
        "node_modules/datatables.net/js/jquery.dataTables.min.js",
        "node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js",
        "node_modules/bootstrap/dist/js/bootstrap.min.js",
        "node_modules/toastr/build/toastr.min.js",
        "node_modules/highcharts/highcharts.js",
        "node_modules/highcharts/highcharts-3d.js",
        "node_modules/highcharts/modules/map.js",
        "node_modules/highcharts/modules/data.js",
        "node_modules/mapbox-gl/dist/mapbox-gl.js"
    ],
    "public/js/costumescript.js"
);