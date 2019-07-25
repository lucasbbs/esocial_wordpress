// Load Gulp...of course
var gulp         = require( 'gulp' );

// CSS related plugins
var sass         = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );
var minifycss    = require( 'gulp-uglifycss' );

// JS related plugins
var concat       = require( 'gulp-concat' );
var uglify       = require( 'gulp-uglify' );
var babelify     = require( 'babelify' );
var browserify   = require( 'browserify' );
var source       = require( 'vinyl-source-stream' );
var buffer       = require( 'vinyl-buffer' );
var stripDebug   = require( 'gulp-strip-debug' );

// Utility plugins
var rename       = require( 'gulp-rename' );
var sourcemaps   = require( 'gulp-sourcemaps' );
var notify       = require( 'gulp-notify' );
var plumber      = require( 'gulp-plumber' );
var options      = require( 'gulp-options' );
var gulpif       = require( 'gulp-if' );

// Browers related plugins
var browserSync  = require( 'browser-sync' ).create();
var reload       = browserSync.reload;

// Project related variables
const cPP = '/development/wp-content/plugins/lucas-plugin';   //current project path
var projectURL   = 'development.test';

var styleSRC     = '.' + cPP + '/src/scss/mystyle.scss';
var styleFront     = '.' + cPP + '/src/scss/form.scss';
var styleAdminSRC = '.' + cPP + '/src/scss/admin.scss';
var styleSlider = '.' + cPP + '/src/scss/slider.scss';


var styleURL     = '.' + cPP + '/assets/css/';
var mapURL       = './';

var jsSRC        = '.' + cPP + '/src/js/';
var jsFront      = 'main.js';
var jsForm      = 'form.js';
var jsAdmin      = 'myscript.js';
var jsSlider      = 'slider.js';



var jsFiles      = [ jsFront, jsForm, jsAdmin, jsSlider];
var jsURL        = '.' + cPP + '/assets/js/';

var imgSRC       = '.' + cPP + '/src/images/**/*';
var imgURL       = '.' + cPP + '/assets/images/';

var fontsSRC     = '.' + cPP + '/src/fonts/**/*';
var fontsURL     = '.' + cPP + '/assets/fonts/';

var styleWatch   = '.' + cPP + '/src/scss/**/*.scss';
var jsWatch      = '.' + cPP + '/src/js/**/*.js';
var imgWatch     = '.' + cPP + '/src/images/**/*.*';
var fontsWatch   = '.' + cPP + '/src/fonts/**/*.*';
var phpWatch     = '.' + cPP + '/**/*.php';
var htmlWatch     = '.' + cPP + '/**/*.html';

var project = {
	folder: "",
	jsPath: "/src/js/" ,
	cssPath:  "/src/scss/",
};
var fs = require( 'fs' );
var readLine = require( 'readline' );



// Tasks
gulp.task( 'browser-sync', function() {
	browserSync.init({
		// server:{
		// 	baseDir:  "./development"
		// },
		// tunnel: true,
		host: projectURL,
		proxy: projectURL,
		browser: ["chrome.exe"], // ["google chrome"]
		// https: {
		// 	key: '/Users/your-user-name/path/to/your/key/test.dev.key',
		// 	cert: '/Users/your-user-name/path/to/your/cert/test.dev.crt'
		// },
		injectChanges: true,
		open: "external",

	});
});

gulp.task( 'styles', function() {
	gulp.src( [ styleSRC, styleFront, styleAdminSRC, styleSlider ] )
		.pipe( sourcemaps.init() )
		.pipe( sass({
			errLogToConsole: true,
			outputStyle: 'compressed'
		}) )
		.on( 'error', console.error.bind( console ) )
		.pipe( autoprefixer({ browsers: [ 'last 2 versions', '> 5%', 'Firefox ESR' ] }) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( sourcemaps.write( mapURL ) )
		.pipe( gulp.dest( styleURL ) )
		.pipe( browserSync.stream() );
});

gulp.task( 'js', function() {
	// return gulp.src([jsSRC + jsFront, jsSRC + jsAdmin, jsSRC +jsWidget])
 //    .pipe(concat('all.js'))
	jsFiles.map( function( entry ) {
	return browserify({
	entries: [jsSRC + entry]
		})
		.transform( babelify, { presets: [ 'env' ] } )
		.bundle()
		.pipe( source( entry ) )
		.pipe( rename( {
			extname: '.min.js'
        } ) )
		.pipe( buffer() )
		.pipe( gulpif( options.has( 'production' ), stripDebug() ) )
		.pipe( sourcemaps.init({ loadMaps: true }) )
		.pipe( uglify() )
		.pipe( sourcemaps.write( '.' ) )
		.pipe( gulp.dest( jsURL ) )
		.pipe( browserSync.stream() );
	});
 });

gulp.task( 'images', function() {
	triggerPlumber( imgSRC, imgURL );
});

gulp.task( 'fonts', function() {
	triggerPlumber( fontsSRC, fontsURL );
});

function triggerPlumber( src, url ) {
	return gulp.src( src )
	.pipe( plumber() )
	.pipe( gulp.dest( url ) );
}

 gulp.task( 'default', ['styles', 'js', 'images', 'fonts'], function() {
	gulp.src( jsURL+'myscript.min.js' )
		.pipe( notify({ message: 'Assets Compiled!' }) );
 });

 gulp.task( 'watch', ['default', 'browser-sync'], function() {
	gulp.watch( phpWatch, reload );
	gulp.watch( htmlWatch, reload );
	gulp.watch( styleWatch, [ 'styles', reload ] );
	gulp.watch( jsWatch, [ 'js', reload ] );
	gulp.watch( imgWatch, [ 'images' ] );
	gulp.watch( fontsWatch, [ 'fonts' ] );
	gulp.src( jsURL + 'myscript.min.js' )
		.pipe( notify({ message: 'Gulp is Watching , Happy Coding!' }) );
 });
