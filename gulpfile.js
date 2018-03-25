var gulp = require('gulp'),
    minifyCSS = require('gulp-minify-css'),
    concat = require('gulp-concat')
    uglify = require('gulp-uglify')
    prefix = require('gulp-autoprefixer')
    sass = require('gulp-sass');

// Minifies JS
gulp.task('js', function(){
    return gulp.src('assets/js/*.js')
    .pipe(uglify())
    .pipe(concat('app.js'))
    .pipe(gulp.dest('webroot/js'))
});

gulp.task('styles', function(){
    return gulp.src('assets/scss/*.scss')
    .pipe(sass())
    .pipe(prefix('last 2 versions'))
    .pipe(concat('app.css'))
    .pipe(minifyCSS())
    .pipe(gulp.dest('webroot/css'))
});

gulp.task('default', function() {
    gulp.run('styles')
    gulp.run('js')
    gulp.watch('assets/scss/*.scss', function(){
        gulp.run('styles')
    })
    gulp.watch('assets/js/*.js', function(){
        gulp.run('js')
    })
});