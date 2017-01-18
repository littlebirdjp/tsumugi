var gulp = require('gulp');
var pug = require('gulp-pug');
var prettify = require('gulp-prettify');
var browserSync = require('browser-sync');
var postcss = require('gulp-postcss');
var cssnext = require('postcss-cssnext');
var PostcssSimpleVars = require('postcss-simple-vars');
var PostcssNested = require('postcss-nested');
var PostcssMixins = require('postcss-mixins');
var PostcssImport = require('postcss-import');
var csscomb = require('gulp-csscomb');

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

gulp.task('css', function() {
  var processors = [
      cssnext({browsers: ['last 2 version']}),
      PostcssMixins(),
      PostcssSimpleVars(),
      PostcssNested(),
      PostcssImport(),
  ];
  return gulp.src([
    paths.src + '**/*.css',
    '!' + paths.src + '**/_*.css'
    ])
    .pipe(postcss(processors))
    .pipe(csscomb())
    .pipe(gulp.dest(paths.dist))
    .pipe(browserSync.reload({
      stream: true
    }));
});

gulp.task('watch', function() {
  gulp.watch([paths.src + '**/*.pug'], ['prettify']);
  gulp.watch([paths.src + '**/*.css'], ['css']);
});

gulp.task('default', ['bs', 'prettify', 'css', 'watch']);
