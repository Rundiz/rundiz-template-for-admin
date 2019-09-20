/**
 * RDTA Sass compiler.
 */


'use strict';


const {dest, parallel, series, src} = require('gulp');


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
 * Compile SASS (scss files).
 * 
 * This method was called from `compileAndMinifyRDTA()` function.<br>
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
 * Cleanup .min.css and .min.css.map.
 * 
 * This method was called from `compileAndMinifyRDTA()` function.<br>
 * This will be called after compiled Sass and before minify them.
 */
async function cleanMinCss(cb) {
    const del = require('del');

    await del(['assets/css/rdta/**/*.min.*']);
    await del(['assets/css/smartmenus/sm-rdta/**/*.min.*']);

    await Promise.resolve();
}// cleanMinCss


/**
 * Minify RDTA css files.
 * 
 * This method was called from `compileAndMinifyRDTA()` function.<br>
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


exports.compileRdtaSass = series(
    compileAndMinifyRDTA
);