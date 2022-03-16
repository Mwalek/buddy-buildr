var gulp = require('gulp');
var postcss = require('gulp-postcss');

var atImport = require('postcss-import');
var mqpacker = require('css-mqpacker');
var cssnano = require('cssnano');
var cssimport = require('gulp-cssimport');

var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');

var styleWatch = 'src/*.css';

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
    gulp.src('dist/style.css')
        .pipe(cssimport([]))
        .pipe(gulp.dest('./fontawesome'));
		done();
}


gulp.task('default', gulp.series(style, import_styles));

function watch_files() {
	gulp.watch( styleWatch , style );
	gulp.watch( styleWatch , import_styles );
}

gulp.task( "watch", watch_files );

/*gulp.task('watch', function() {
    //gulp.watch('*.scss', ['sass']);
	gulp.watch( styleWatch , ['style']);
	gulp.watch( styleWatch , ['import'])
})

gulp.task('default', function(done) { // <--- Insert `done` as a parameter here...
    gulp.series('style','import', 'watch')
    done(); // <--- ...and call it here.
})*/

/*gulp.task('watch', gulp.series('default', function() {
	gulp.watch( styleWatch , ['style']);
	gulp.watch( styleWatch , ['import']);
}));*/