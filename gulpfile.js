var gulp = require('gulp');
var postcss = require('gulp-postcss');

var atImport = require('postcss-import');
var mqpacker = require('css-mqpacker');
var cssnano = require('cssnano');
var cssimport = require('gulp-cssimport');

var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');

var styleWatch = 'src/*.css';

gulp.task('style', function () {
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
});

gulp.task('import', function(){
    gulp.src('dist/style.css')
        .pipe(cssimport([]))
        .pipe(gulp.dest('./fontawesome'));
});

gulp.task('watch', function() {
    gulp.watch('*.scss', ['sass']);
})

gulp.task('default', function(done) { // <--- Insert `done` as a parameter here...
    gulp.series('style','import', 'watch')
    done(); // <--- ...and call it here.
})

/*gulp.task('watch', gulp.series('default', function() {
	gulp.watch( styleWatch , ['style']);
	//gulp.watch( styleWatch , ['import']);
}));*/