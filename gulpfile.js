"use strict"


const {series, parallel, src, dest, watch} = require('gulp');


/**
 * Cleanup files and folders.
 */
async function clean(cb) {
    const del = require('del');

    await del(['assets/js/rdta/**', '!assets/js/rdta', '!assets/js/rdta/rundiz-template-admin.js']);
    await del(['assets/css/rdta']);
    await del(['assets/css/smartmenus/sm-rdta']);

    await Promise.resolve();
}// clean


/**
 * Cleanup .min.css and .min.css.map.
 * 
 * This will be called during build minify CSS.
 */
async function cleanMinCss(cb) {
    const del = require('del');

    await del(['assets/css/rdta/**/*.min.*']);
    await del(['assets/css/smartmenus/sm-rdta/**/*.min.*']);

    await Promise.resolve();
}// cleanMinCss


/**
 * Uglify JS.
 */
function uglifyJs(cb) {
    const rename = require("gulp-rename");
    const uglify = require('gulp-uglify-es').default;
    const sourcemaps = require('gulp-sourcemaps');
    const header = require('gulp-header');
    const pkg = require('./package.json');

    var comment = '/*! Rundiz template for admin v <%= pkg.version %> \n' +
                            'License: <%= pkg.license %>*/';

    return src('assets/js/rdta/rundiz-template-admin.js')
        .pipe(header(comment, {pkg : pkg}))
        .pipe(rename('rundiz-template-admin.min.js'))
        .pipe(sourcemaps.init())
        .pipe(uglify({
            output: {
                comments: '/^!/'
            }
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(dest('assets/js/rdta/'));
}// uglifyJs


/**
 * Compile SASS (scss files).
 */
function compileSass(cb) {
    const rename = require("gulp-rename");
    const sass = require('gulp-sass');
    const Fiber = require('fibers');
    const sourcemaps = require('gulp-sourcemaps');
    const cleanCSS = require('gulp-clean-css');

    sass.compiler = require('sass');

    console.log('Compiling RDTA scss.');

    // just compile .scss -> .css
    return src('assets/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            fiber: Fiber,
            outputStyle: 'expanded'
        }).on('error', sass.logError))
        .pipe(sourcemaps.write('.', {sourceRoot: '../../assets/scss'}))
        .pipe(dest('assets/css/'));
        // minify version (only work without sourcemaps).
        //.pipe(sourcemaps.init())
        //.pipe(cleanCSS())
        //.pipe(rename({extname: '.min.css'}))
        //.pipe(sourcemaps.write('.', {sourceRoot: '../../assets/scss'}))
        //.pipe(dest('assets/css'));
}// compileSass


/**
 * Minify RDTA css files.
 */
function minRDTACss(cb) {
    const rename = require("gulp-rename");
    const cleanCSS = require('gulp-clean-css');
    const sourcemaps = require('gulp-sourcemaps');
    const mergeStream =   require('merge-stream');
    let folders = ['rdta', 'smartmenus/sm-rdta'];

    console.log('Minifying RDTA css.');

    let tasks = folders.map(function(element) {
        return src('assets/css/' + element + '/**/*.css')
            .pipe(sourcemaps.init({loadMaps: true}))
            .pipe(cleanCSS())
            .pipe(rename({extname: '.min.css'}))
            .pipe(sourcemaps.write('.'))
            .pipe(dest('assets/css/' + element + '/'));
    });

    return mergeStream(tasks);
}// minRDTACss


/**
 * Compile and then minify RDTA CSS files.
 */
async function compileAndMinifyRDTA(cb) {
    const timeout = ms => new Promise(res => setTimeout(res, ms))
    await compileSass();
    await timeout(500);
    await cleanMinCss();
    await minRDTACss();
    await Promise.resolve();
}// compileAndMinifyRDTA


/**
 * Replace CSS headers.
 */
function replaceHeaders(cb) {
    const replace = require('gulp-replace');
    const pkg = require('./package.json');

    return src('assets/css/rdta/**/*.css')
        .pipe(replace('__RDTA.VERSION__', pkg.version))
        .pipe(dest('assets/css/rdta/'));
}// replaceHeaders


exports.default = series(
    clean,
    uglifyJs,
    compileAndMinifyRDTA,
    replaceHeaders
);


exports.watch = function() {
    watch('assets/scss/**/*.scss', compileAndMinifyRDTA);
};