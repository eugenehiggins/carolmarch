var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('styles', function() {
    gulp.src('wp-content/themes/bootstrapjumbotron/sass/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('wp-content/themes/bootstrapjumbotron/css/'))
});

//Watch task
gulp.task('default',function() {
    gulp.watch('wp-content/themes/bootstrapjumbotron/sass/*.scss',['styles']);
});