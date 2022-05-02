const gulp = require("gulp");
const postcss = require("gulp-postcss");
const atImport = require("postcss-import");
const mqpacker = require("css-mqpacker");
const cssnano = require("cssnano");
// const cssimport = require("gulp-cssimport");
const autoprefixer = require("gulp-autoprefixer");
const sourcemaps = require("gulp-sourcemaps");
const sass = require("gulp-sass")(require("sass"));
const rename = require("gulp-rename");
const browserSync = require("browser-sync").create();
const styleWatch = "src/*.css";
// const cssAssetWatch = "assets/css/style.css";
const sassWatch = "sass/**/*.scss";
const webFonts = "assets/css/webfonts/all.css";
const eslint = require("gulp-eslint");

function style() {
  const processors = [
    atImport,
    mqpacker,
    cssnano({
      calc: {precision: 2}
    })
  ];
  return gulp.src("src/style.css")
      .pipe( sourcemaps.init() )
      .pipe(autoprefixer())
      .pipe(postcss(processors))
      .pipe(gulp.dest("./"))
      .pipe( sourcemaps.write("./") )
      .pipe(browserSync.stream());
}

/* function import_styles(done){
  gulp.src("assets/css/style.css")
      .pipe( sourcemaps.init() )
      .pipe(cssimport([]))
      .pipe( sourcemaps.write("./") )
      .pipe(gulp.dest("./"));
  done();
} */

function compileSass(done) {
  gulp.src("sass/*.scss")
      .pipe( sourcemaps.init() )
      .pipe(sass().on("error", sass.logError))
      .pipe( sourcemaps.write("./") )
      .pipe(gulp.dest("./css"))
      .pipe(browserSync.stream());
  done();
}

function processFonts() {
  const processors = [
    atImport,
    mqpacker,
    cssnano({
      calc: {precision: 2}
    })
  ];
  return gulp.src("assets/css/webfonts/all.css")
      .pipe( sourcemaps.init() )
      .pipe(autoprefixer())
      .pipe(postcss(processors))
      .pipe(rename({
        suffix: ".min"
      }))
      .pipe( sourcemaps.write("./") )
      .pipe(gulp.dest(function(file) {
        return file.base;
      }))
      .pipe(browserSync.stream());
}

function watchFiles() {
  gulp.watch( styleWatch, style );
  // gulp.watch( cssAssetWatch , import_styles );
  gulp.watch( sassWatch, compileSass );
  gulp.watch( webFonts, processFonts );
  gulp.watch( "scripts/*.js", lintJS );
  browserSync.init({
    proxy: "https://localhost/dev/",
    https: {
      key: "W:/xampp/htdocs/mkcert/localhost/localhost-key.pem",
      cert: "W:/xampp/htdocs/mkcert/localhost/localhost.pem"
    }
  });
}

function lintJS() {
  gulp.src(["scripts/*.js"])
  // eslint() attaches the lint output to the "eslint" property
  // of the file object so it can be used by other modules.
      .pipe(eslint())
  // eslint.format() outputs the lint results to the console.
  // Alternatively use eslint.formatEach() (see Docs).
      .pipe(eslint.format())
  // To have the process exit with an error code (1) on
  // lint error, return the stream and pipe to failAfterError last.
      .pipe(eslint.failAfterError());
}

gulp.task("default", gulp.series(style, compileSass, processFonts, lintJS));
gulp.task( "sass", compileSass );
gulp.task( "webfonts", processFonts );
gulp.task( "watch", watchFiles );
gulp.task( "style", style );
