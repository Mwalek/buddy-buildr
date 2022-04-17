var gulp = require('gulp');
var postcss = require('gulp-postcss');

var atImport = require('postcss-import');
var mqpacker = require('css-mqpacker');
var cssnano = require('cssnano');
var cssimport = require('gulp-cssimport');

var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass')(require('sass'));
var rename = require("gulp-rename");

var styleWatch = 'src/*.css';
var cssAssetWatch = 'assets/css/style.css';
var sassWatch = 'sass/**/*.scss';
var webFonts = 'assets/css/webfonts/all.css';

function style() {
	var processors = [
		atImport,
		mqpacker,
		cssnano({
			calc: {precision: 2}
		})
	];
	return gulp.src('src/*.css')
		.pipe( sourcemaps.init() )
		.pipe(autoprefixer())
		.pipe(postcss(processors))
		.pipe(gulp.dest('./dist'))
		.pipe( sourcemaps.write('./') );
}

function import_styles(done){
    gulp.src('assets/css/style.css')
		.pipe( sourcemaps.init() )
        .pipe(cssimport([]))
		.pipe( sourcemaps.write('./') )
        .pipe(gulp.dest('./'));
		done();
}

function compile_sass(done){
    gulp.src('sass/*.scss')
		.pipe( sourcemaps.init() )
        .pipe(sass().on('error', sass.logError))
		.pipe( sourcemaps.write('./') )
        .pipe(gulp.dest('./css'));
		done();
}

function process_fonts(){
    var processors = [
		atImport,
		mqpacker,
		cssnano({
			calc: {precision: 2}
		})
	];
	return gulp.src('assets/css/webfonts/all.css')
		.pipe( sourcemaps.init() )
		.pipe(autoprefixer())
		.pipe(postcss(processors))
		.pipe(rename({
            suffix: '.min'
        }))
		.pipe( sourcemaps.write('./') )
		.pipe(gulp.dest(function(file) {
			return file.base;
		  }));
}

function watch_files() {
	gulp.watch( styleWatch , style );
	gulp.watch( cssAssetWatch , import_styles );
	gulp.watch( sassWatch , compile_sass );
	gulp.watch( webFonts , process_fonts );
}

gulp.task('default', gulp.series(style, import_styles, compile_sass, process_fonts));
gulp.task( 'sass', compile_sass );
gulp.task( 'webfonts', process_fonts );
gulp.task( 'watch', watch_files );
gulp.task( 'style', style );