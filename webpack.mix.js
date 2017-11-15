let mix = require('laravel-mix');

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

/*
 |--------------------------------------------------------------------------
 | Core
 |--------------------------------------------------------------------------
 |
*/
mix.scripts([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/bootstrap/dist/js/bootstrap.min.js',
], 'public/assets/app/js/app.js').version();

mix.styles([
	'node_modules/bootstrap/dist/css/bootstrap.min.css',
    'node_modules/font-awesome/css/font-awesome.min.css',
    'node_modules/Ionicons/css/ionicons.min.css',
    'node_modules/adminlte/css/AdminLTE.min.css'
], 'public/assets/app/css/app.css').version();
mix.copy([
    'node_modules/bootstrap/dist/fonts',
    'node_modules/font-awesome/fonts',
    'node_modules/ionicons/fonts',
], 'public/assets/app/fonts');

/*
 |--------------------------------------------------------------------------
 | Auth
 |--------------------------------------------------------------------------
 |
*/
mix.styles([
	'node_modules/iCheck/square/blue.css',
],'public/assets/auth/css/auth.css').version();

mix.scripts([
	'node_modules/iCheck/icheck.min.js',
	'resources/assets/auth/js/auth.js',
],'public/assets/auth/js/auth.js').version();
/*
 |--------------------------------------------------------------------------
 | User
 |--------------------------------------------------------------------------
 |
*/
 mix.scripts([
    'node_modules/jquery-slimscroll/jquery.slimscroll.min.js',
    'node_modules/fastclick/lib/fastclick.js',
    'node_modules/adminlte/js/adminlte.min.js',
    'node_modules/adminlte/js/demo.js',
],'public/assets/user/js/user.js').version();
 mix.styles([
    'node_modules/adminlte/css/skins/all-skins.min.css',
],'public/assets/user/css/user.css').version();

/*
 |--------------------------------------------------------------------------
 | Request
 |--------------------------------------------------------------------------
 |
*/ 
mix.scripts([
    'node_modules/baguetteBox/dist/baguetteBox.min.js',
    'node_modules/baguetteBox/dist/gallery-grid.js',
],'public/assets/user/self_service/js/gallery.js').version();
mix.styles([
    'node_modules/baguetteBox/dist/baguetteBox.min.css',
    'node_modules/baguetteBox/dist/gallery-grid.css',
],'public/assets/user/self_service/css/gallery.css').version();
/*
 |--------------------------------------------------------------------------
 | Kacamata
 |--------------------------------------------------------------------------
 |
*/ 
mix.scripts([
    'node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
    'resources/assets/self_service/js/datepicker.js'
],'public/assets/user/self_service/js/datepicker.js').version();
mix.styles([
    'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
],'public/assets/user/self_service/css/datepicker.css').version();