var gulp = require('gulp'),
    rename = require('gulp-rename'),
    replace = require('gulp-replace'),
    minifyCSS = require('gulp-minify-css');

gulp.task('css', function() {
    gulp.src('./vendor/entypo/font/entypo.css')
        .pipe(replace('icon-', 'xn-'))
        .pipe(replace('.icon', '.xn'))
        .pipe(replace('.xn-right-open-big:before', '.xn-nav:before, .xn-right-open-big:before'))
        .pipe(replace('url(\'', 'url(\'../fonts/'))
        .pipe(rename("jacket-awesome.css"))
        .pipe(gulp.dest('dist/css'));

    gulp.src('./vendor/entypo/font/entypo.css')
        .pipe(replace('icon-', 'xn-'))
        .pipe(replace('.icon', '.xn'))
        .pipe(replace('.xn-right-open-big:before', '.xn-nav:before, .xn-right-open-big:before'))
        .pipe(replace('url(\'', 'url(\'../fonts'))
        .pipe(minifyCSS())
        .pipe(rename("jacket-awesome.min.css"))
        .pipe(gulp.dest('dist/css'));
});

gulp.task('fonts', function() {
    gulp.src(['./vendor/entypo/font/entypo.svg',
             './vendor/entypo/font/entypo.ttf',
             './vendor/entypo/font/entypo.eot',
             './vendor/entypo/font/entypo.woff'])
        .pipe(gulp.dest('dist/fonts'));
});

gulp.task('default', ['css', 'fonts']);
