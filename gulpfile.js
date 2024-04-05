const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const cleanCSS = require('gulp-clean-css');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');

function styles() {
  return gulp.src([
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'css/**/*.css',
    'css/**/*.scss',
    'node_modules/lightgallery/css/lightgallery.css',
    ])
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(concat('all.min.css'))
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest('build'));
}

function scripts() {
  return gulp.src([
    'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
    'node_modules/lightgallery/lightgallery.min.js',
    'js/**/*.js'
    ])
    .pipe(sourcemaps.init())
    .pipe(concat('all.min.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest('build'));
}

exports.styles = styles;
exports.scripts = scripts;
exports.default = gulp.parallel(styles, scripts);
