/**
 * Gulp main file.
 */


'use strict';


const {series, parallel, src, dest, watch} = require('gulp');
const copyPackages = require('./copyPackages');
const phpSrc = require('./phpSrc');
const rdtaSass = require('./rdtaSass');
const rdtaJs = require('./rdtaJs');


/**
 * Cleanup files and folders.
 */
async function clean(cb) {
    const del = require('del');

    await del(['assets/js/rdta']);
    await del(['assets/js/smartmenus']);
    await del(['assets/js/sticky-sidebar']);
    await del(['assets/js/popper.js']);
    await del(['assets/js/tippy.js']);
    await del(['assets/css/rdta']);
    await del(['assets/css/sanitize']);
    await del(['assets/css/smartmenus']);
    await del(['assets/font-awesome']);
    await del(['*.html', '!xhr-page.html']);

    await Promise.resolve();
}// clean


/**
 * Replace CSS headers.
 */
function replaceHeaders(cb) {
    const replace = require('gulp-replace');
    const pkg = require('../package.json');

    return src('assets/css/rdta/**/*.css')
        .pipe(replace('__RDTA.VERSION__', pkg.version))
        .pipe(dest('assets/css/rdta/'));
}// replaceHeaders


exports.default = series(
    clean,
    copyPackages.copyPackages,
    rdtaJs.bundleJs,
    rdtaSass.compileRdtaSass,
    replaceHeaders,
    phpSrc.buildPHP,
);


exports.watch = function() {
    watch('assets/scss/**/*.scss', rdtaSass.compileRdtaSass);
    watch('assets/js-src/**/*.js', rdtaJs.bundleJs);
    phpSrc.watchBuildPHP();
};