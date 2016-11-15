const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

/* app.css is default in public and app.scss default in resources/assets/sass
 * app.js is default in resources/assets/js directory
 */

elixir(mix => {

    //laravel defauls
    mix.sass('app.scss')
        .webpack('app.js');
    //laravel defauls end

    mix.copy('resources/assets/vendor/bootstrap/fonts', 'public/build/fonts');
    mix.copy('resources/assets/vendor/font-awesome/fonts', 'public/build/fonts');
    mix.copy('public/css/patterns', 'public/build/css/patterns');

    mix.styles([
        'vendor/bootstrap/css/bootstrap.css',
        'vendor/animate/animate.css',
        'vendor/font-awesome/css/font-awesome.css',
    ], 'public/css/vendor.css');

    mix.scripts([
        'vendor/jquery/jquery-2.1.1.js',
        'vendor/bootstrap/js/bootstrap.js',
        'vendor/metisMenu/jquery.metisMenu.js',
        'vendor/slimscroll/jquery.slimscroll.min.js',
        'vendor/pace/pace.min.js'
    ], 'public/js/vendor.js');

    mix.sass('inspinia.scss');

    mix.scripts('inspinia.js');

    /* version works only once so we have to use array for all files */
    mix.version([
        'public/css/vendor.css',
        'public/css/inspinia.css',
        'public/js/vendor.js',
        'public/js/inspinia.js'
    ]);


});
