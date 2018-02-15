var gulp = require('gulp');
var concat = require('gulp-concat');
var minify = require('gulp-minify');
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
var minifyCss = require("gulp-minify-css");
var SASS = require('gulp-sass');
var rename = require('gulp-rename');

gulp.task('default', ['js', 'sass', 'css']);
gulp.task('style', ['sass', 'css']);

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

gulp.task('css', function() {

    gulp.src([
        'css/lib/animate.css',
        'css/lib/bootstrap.css',
        'css/lib/yamm.css',
        'css/lib/slider-pro.css',
        'css/app/main.min.css'
    ])
        .pipe(concat('styles.css'))
        .pipe(sourcemaps.init())
        .pipe(cleanCSS())
        .pipe(sourcemaps.write())
        .pipe(minifyCss())
        .pipe(gulp.dest('css/build'));

});

gulp.task('sass', function() {
    gulp.src([
        'css/app/priority/global.scss',
        'css/app/priority/variables.scss',
        'css/app/priority/default-typography.scss',
        'css/app/body/*.scss'
    ])
        .pipe(concat('compiled.css'))
        .pipe(SASS({outputStyle: 'compressed'}))
        .pipe(rename('main.min.css'))
        .pipe(gulp.dest('css/app/'));
});