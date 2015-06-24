var gulp        = require('gulp'),
    jshint      = require('gulp-jshint'),
    sass        = require('gulp-sass'),
    sourcemaps  = require('gulp-sourcemaps'),
    concat      = require('gulp-concat'),
    uglify      = require('gulp-uglify'),
    prefix      = require('gulp-autoprefixer'),
    minify      = require('gulp-minify-css'),
    rename      = require('gulp-rename'),
    imagemin    = require('gulp-imagemin'),
    
    input       = {
      'sassAll': 'dev/sass/**/*.sass',
      'sassMaster' : 'dev/sass/master.sass',
      'jsCustom': 'dev/js/custom/*.js',
      'jsVendor' : 'dev/js/vendor/*.js',
      'jsAll' : 'dev/js/**/*.js',
      'images' : 'dev/img/*'
    },
    output      = {
      'css' : '',
      'js' : 'public/js',
      'images' : 'public/img'
    };
    
gulp.task('default', ['jshint','build-js-vendor','build-js-custom','build-css','images','watch']);

gulp.task('build-css', function() {
  return gulp.src(input.sassMaster)
    .pipe(sourcemaps.init())
      .pipe(sass())
      .pipe(prefix("last 3 versions", "> 1%", "ie 8", "ie 7", "ie 6"))
      .pipe(minify())
      .pipe(rename('style.css'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(output.css));
});

gulp.task('images', function() {
  return gulp.src(input.images)
    .pipe(imagemin({progressive: true}))
    .pipe(gulp.dest(output.images));
});

gulp.task('jshint', function() {
  return gulp.src(input.jsCustom)
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'));
});

gulp.task('build-js-vendor', function() {
  return gulp.src(input.jsVendor)
    .pipe(sourcemaps.init())
      .pipe(concat('vendor.js'))
      .pipe(uglify())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(output.js));
});

gulp.task('build-js-custom', function() {
  return gulp.src(input.jsCustom)
    .pipe(sourcemaps.init())
      .pipe(concat('mike.js')) // change the text 'custom.js' if you want your JS file branded
      .pipe(uglify())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(output.js));
});



gulp.task('watch', function() {
  gulp.watch(input.jsCustom, ['jshint', 'build-js-custom']);
  gulp.watch(input.jsVendor, ['build-js-vendor']);
  gulp.watch(input.sassAll, ['build-css']);
  gulp.watch(input.images, ['images']);
});