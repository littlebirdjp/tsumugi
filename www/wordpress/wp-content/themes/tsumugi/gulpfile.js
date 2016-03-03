var concat = require('gulp-concat');
var changed = require('gulp-changed');
var gulp = require('gulp');
var minify = require('gulp-csso');
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

gulp.task("css", function() {
  return gulp.src([
    paths.src + '**/*.scss',
    '!' + paths.src + '**/_*.scss',
    '!' + paths.src + '**/bootstrap*.scss',
    '!' + paths.src + '**/style.scss'
    ])
    .pipe(changed(paths.dist))
    .pipe(sass({
      outputStyle: 'expanded',
      indentType: 'tab',
      indentWidth: 1
    }))
    .pipe(gulp.dest(paths.dist))
});

gulp.task('watch', function() {
  gulp.watch([paths.src + '**/*.scss'], ['css']);
});

gulp.task('default', ['watch']);
