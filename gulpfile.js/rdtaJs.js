/**
 * Bundle/concat RDTA JS files.
 */


'use strict';


const {dest, parallel, series, src} = require('gulp');


/**
 * Uglify JS.
 */
function uglifyJs(cb) {
    const rename = require("gulp-rename");
    const uglify = require('gulp-uglify-es').default;
    const sourcemaps = require('gulp-sourcemaps');
    const header = require('gulp-header');
    const pkg = require('../package.json');
    const mergeStream =   require('merge-stream');

    var comment = '/*! Rundiz template for admin v <%= pkg.version %> \n' +
        'License: <%= pkg.license %>*/';

    return mergeStream(
        src('assets/js-src/rdta/**/*.js')
            .pipe(header(comment, {pkg : pkg}))
            // copy
            .pipe(dest('assets/js/rdta/'))
            // then minify.
            .pipe(rename({extname: '.min.js'}))
            .pipe(sourcemaps.init())
            .pipe(uglify({
                output: {
                    comments: '/^!/'
                }
            }))
            .pipe(sourcemaps.write('.'))
            .pipe(dest('assets/js/rdta/'))
    );
}// uglifyJs


exports.bundleJs = series(
    uglifyJs
);