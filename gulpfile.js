var gulp        = require('gulp'),
    sass        = require('gulp-sass'),
    sourcemaps  = require('gulp-sourcemaps'),
    prefix      = require('gulp-autoprefixer'),
    minify      = require('gulp-minify-css'),
    rename      = require('gulp-rename'),
    imagemin    = require('gulp-imagemin'),
    
    input       = {
      'sassAll': 'dev/sass/**/*.sass',
      'sassMaster' : 'dev/sass/master.sass',
      'images' : 'dev/img/*'
    },
    output      = {
      'css' : '',
      'images' : 'public/img'
    };
    
gulp.task('default', ['build-css','images','watch']);

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

gulp.task('watch', function() {
  gulp.watch(input.sassAll, ['build-css']);
  gulp.watch(input.images, ['images']);
});