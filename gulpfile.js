var gulp = require('gulp');
var postcss = require('gulp-postcss');

var atImport = require('postcss-import');
var mqpacker = require('css-mqpacker');
var cssnano = require('cssnano');
var cssimport = require('gulp-cssimport');

var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass')(require('sass'));

var styleWatch = 'src/*.css';
var cssAssetWatch = 'assets/css/style.css';
var sassWatch = 'sass/**/*.scss';

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
		.pipe( sourcemaps.write('./') )
		.pipe(gulp.dest('./dist'));
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
        .pipe(sass())
		.pipe( sourcemaps.write('./') )
        .pipe(gulp.dest('./css'));
		done();
}

function watch_files() {
	gulp.watch( styleWatch , style );
	gulp.watch( cssAssetWatch , import_styles );
	gulp.watch( sassWatch , compile_sass );
}

gulp.task('default', gulp.series(style, import_styles, compile_sass));
gulp.task( 'sass', compile_sass );
gulp.task( 'watch', watch_files );