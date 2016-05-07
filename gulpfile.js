var gulp = require('gulp');
var changed = require('gulp-changed');
var compass = require('gulp-compass');
var concat = require('gulp-concat');
var csscomb = require('gulp-csscomb');
var frep = require('gulp-frep');
var ignore = require('gulp-ignore');
var minify = require('gulp-csso');
var postcss = require('gulp-postcss');
var prettify = require('gulp-prettify');
var rename = require('gulp-rename');
var rimraf = require('gulp-rimraf');
var shell = require('gulp-shell');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var zip = require('gulp-zip');

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

gulp.task('build', function() {
  return gulp.src(paths.dist, {read: false})
    .pipe(shell(['bash bin/zip.sh']));
});

gulp.task('watch', function() {
  //gulp.watch([paths.src + '**/*.scss'], ['sass']);
  gulp.watch([paths.src + '**/*.scss'], ['compass']);
});

gulp.task('default', ['watch']);
