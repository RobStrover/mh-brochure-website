var gulp = require('gulp');
var concat = require('gulp-concat');
var minify = require('gulp-minify');
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
var minifyCss = require("gulp-minify-css");
var sass = require('gulp-sass');
var rename = require('gulp-rename');

gulp.task('default', ['js', 'sass']);
gulp.task('style', ['sass']);

gulp.task('js', function() {
    gulp.src([
        'js/lib/jquery.js',
        'js/lib/bootstrap.js',
        'js/lib/sliderpro.js',
        'js/lib/masonry.js',
        'js/app/*.js'
    ])
        .pipe(concat('script.js'))
        .pipe(minify({
            ext:{
                src:'.js',
                min:'-min.js'
            }
        }))
        .pipe(gulp.dest('js/build'))

});

gulp.task('sass', function() {
    gulp.src([
        'css/sass/theme-megan-hill.scss'
    ])
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'})
            .on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(rename('styles.css'))
        .pipe(gulp.dest('css/build'));
});