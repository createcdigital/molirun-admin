var elixir = require('laravel-elixir');

require('laravel-elixir-imagemin');

elixir.config.sourcemaps = true;

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //mix.copy(['resources/assets/'], 'public/assets/');
    //mix.copy('resources/assets/admin/css/', 'public/assets/admin/css/');
    //mix.copy('resources/assets/admin/js/', 'public/assets/admin/js/');

    //mix.imagemin();
});
