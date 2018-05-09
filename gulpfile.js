var gulp = require('gulp');
var concat = require('gulp-concat');
var rename = require("gulp-rename");
// Sass/CSS stuff
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var minifycss = require('gulp-minify-css');
// JavaScript
var uglify = require('gulp-uglify');

var DEST = 'build/';
gulp.task('sass', function() {
    gulp.src('src/scss/*.scss')
    .pipe(sass({
        includePaths: ['./dev/sass'],
        outputStyle: 'expanded'
    }))
    .pipe(concat('custom.min.css'))
    .pipe(prefix(
        "last 1 version", "> 1%", "ie 8", "ie 7"
    ))
    .pipe(gulp.dest(DEST +'css'))
    .pipe(minifycss());
});
// Uglify JS
gulp.task('uglify', function(){
    gulp.src([
        'src/js/helpers/*.js',
        'src/js/*.js',
    ])
    .pipe(concat("custom.min.js"))
    .pipe(uglify())
    .pipe(gulp.dest(DEST+'js'));
});
// default
gulp.task('default', ['sass','uglify']);