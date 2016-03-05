var gulp = require('gulp');
var changed = require('gulp-changed');
var compass = require('gulp-compass');
var concat = require('gulp-concat');
var csscomb = require('gulp-csscomb');
var minify = require('gulp-csso');
var frep = require('gulp-frep');
var postcss = require('gulp-postcss');
var prettify = require('gulp-prettify');
var rename = require('gulp-rename');
var shell = require('gulp-shell');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');

var paths = {
  'src': 'sass/',
  'dist': './'
}

gulp.task("sass", function() {
  return gulp.src([
    paths.src + '**/*.scss',
    '!' + paths.src + '**/_*.scss',
    '!' + paths.src + '**/style.scss',
    '!' + paths.src + '**/bootstrap*.scss'
    ])
    .pipe(changed(paths.dist))
    .pipe(sass({
      outputStyle: 'expanded',
      indentType: 'tab',
      indentWidth: 1
    }))
    .pipe(gulp.dest(paths.dist))
});

gulp.task('compass', function() {
  return gulp.src([
    paths.src + '**/*.scss',
    '!' + paths.src + '**/_*.scss',
    //'!' + paths.src + '**/style.scss',
    '!' + paths.src + '**/bootstrap*.scss'
    ])
    .pipe(compass({
      style: 'expanded',
      comments: false,
      css: paths.dist,
      sass: paths.src,
      bundle_exec: true
    }))
    .pipe(csscomb())
    .pipe(frep([
        { pattern:/\n\t\/\*/g, replacement: ' /*' }
    ]))
    .pipe(gulp.dest(paths.dist))
});

gulp.task('watch', function() {
  //gulp.watch([paths.src + '**/*.scss'], ['sass']);
  gulp.watch([paths.src + '**/*.scss'], ['compass']);
});

gulp.task('default', ['watch']);
