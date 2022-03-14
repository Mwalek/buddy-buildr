var gulp = require('gulp');
var postcss = require('gulp-postcss');

var atImport = require('postcss-import');
var mqpacker = require('css-mqpacker');
var cssnano = require('cssnano');
var cssimport = require('gulp-cssimport');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');

gulp.task('css', function () {
	var processors = [
		atImport,
		mqpacker,
		cssnano({
			calc: {precision: 2}
		})
	];
	return gulp.src('./src/*.css')
		.pipe( sourcemaps.init() )
		.pipe(autoprefixer({
			browsers: ['last 2 versions'],
			cascade: false
		}))
		.pipe(postcss(processors))
		.pipe( sourcemaps.write('./') )
		.pipe(gulp.dest('./dist'));
});

gulp.task('import', function() {
    gulp.src('dest/style.css')
        .pipe(cssimport([]))
        .pipe(gulp.dest('./fontawesome'));
}); 