'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
 
sass.compiler = require('node-sass');
 
gulp.task('sass', function () {
  return gulp.src('./static/scss/master.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./static/css'));
});
 
gulp.task('sass:watch', function () {
  gulp.watch('./static/scss/**/*.scss', gulp.series('sass'));
});