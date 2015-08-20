var elixir = require('laravel-elixir');

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

// elixir(function(mix) {
//     mix.sass('app.scss', './public/css/elixir/app.css');
// });


// elixir(function(mix) {

//     mix.sass('app.scss', './public/css/elixir/app.css')

//     	.version('public/css/elixir/app.css');


// });


elixir(function(mix) {
    mix.styles([
    	'resources/assets/css/bootstrap.css',
    	'resources/assets/css/dataTables.bootstrap.css',
    	'resources/assets/css/font-awesome.css',
    	'resources/assets/css/dataTables.fontAwesome.css',
    	'resources/assets/css/dataTables.tableTools.css',
    	'resources/assets/css/dataTables.responsive.css',
    	'resources/assets/css/custom.css'
    	], 'public/css/app.css');


    mix.scripts([
    	'resources/assets/js/jquery-2.1.4.js',
    	'resources/assets/js/bootstrap.js',
    	'resources/assets/js/typeahead.bundle.js',
    	'resources/assets/js/jquery.dataTables.js',
    	'resources/assets/js/dataTables.bootstrap.js',
    	'resources/assets/js/dataTables.responsive.js'
    	], 'public/js/app.js');


    mix.version(['public/js/app.js', 'public/css/app.css']);


    // TODO
    // copy the font to build dir
    // mix.copy('public/assets/global/plugins/font-awesome/fonts', 'public/fonts');

});