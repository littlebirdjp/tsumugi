var gulp = require('gulp');
var pug = require('gulp-pug');
var prettify = require('gulp-prettify');
var browserSync = require('browser-sync');
var sass = require('gulp-sass');

var paths = {
  'src': 'src/',
  'dist': '../'
}

gulp.task('bs', function() {
  browserSync.init({
    server: {
      baseDir: paths.dist,
      index: 'index.html'
    },
    notify: true
  });
});

gulp.task('html', function() {
  return gulp.src([
    paths.src + '**/*.pug',
    '!' + paths.src + '**/_*.pug'
    ])
    .pipe(pug())
    .pipe(gulp.dest(paths.dist));
});

gulp.task('prettify', ['html'], function() {
  return gulp.src([
    paths.dist + '**/*.html',
    '!' + paths.dist +'_work/**/*.html'
    ])
    .pipe(prettify({
      brace_style: 'collapse',
      indent_size: 2,
      indent_char: ' ',
      unformatted: ['a'],
      indent_inner_html: false
    }))
    .pipe(gulp.dest(paths.dist))
    .pipe(browserSync.reload({
      stream: true
    }));
});

gulp.task('sass', function () {
 return gulp.src([
    paths.src + '**/*.scss'
  ])
   .pipe(sass({
     outputStyle: 'expanded',
     precision: 6
   }).on('error', sass.logError))
   .pipe(gulp.dest(paths.dist));
});

gulp.task('watch', function() {
  gulp.watch([paths.src + '**/*.pug'], ['prettify']);
  gulp.watch([paths.src + '**/*.scss'], ['sass']);
});

gulp.task('default', ['bs', 'prettify', 'sass', 'watch']);
