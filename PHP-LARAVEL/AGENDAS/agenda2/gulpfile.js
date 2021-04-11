var gulp = require('gulp'),
    sass = require('gulp-sass'),
    uglify = require('gulp-uglify'),
    cssnano = require('gulp-cssnano'),
    jshint = require('gulp-jshint'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat');

//Style
gulp.task('style', function() {
    return gulp.src('public/assets/sass/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('public/assets/css/'))
        .pipe(rename({suffix:'.min'}))
        .pipe(cssnano())
        .pipe(gulp.dest('public/assets/css/'))
});

//Watch task
gulp.task('watch',function() {
    gulp.watch('public/assets/sass/**/*.scss',['style']);
});

gulp.task('default', ['watch']);
