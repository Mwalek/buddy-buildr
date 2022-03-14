var gulp = require('gulp');
var postcss = require('gulp-postcss');

var atImport = require('postcss-import');
var mqpacker = require('css-mqpacker');
var cssnano = require('cssnano');
var cssimport = require('gulp-cssimport');

gulp.task('css', function () {
	var processors = [
		atImport,
		mqpacker,
		cssnano({
			calc: {precision: 2}
		})
	];
	return gulp.src('./src/*.css')
		.pipe(postcss(processors))
		.pipe(gulp.dest('./dest'));
});

gulp.task('import', function() {
    gulp.src('dest/style.css')
        .pipe(cssimport([]))
        .pipe(gulp.dest('./fontawesome'));
}); 