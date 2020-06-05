/**
 * Copy Node packages.
 */


'use strict';


const {series, parallel, src, dest, watch} = require('gulp');
const mergeStream =   require('merge-stream');


/**
 * Copy FontAwesome.
 * 
 * @param {type} cb
 * @returns {unresolved}
 */
function copyFontAwesome(cb) {
    return mergeStream(
        src('node_modules/@fortawesome/fontawesome-free/css/**')
            .pipe(dest('assets/font-awesome/css/')),
        src('node_modules/@fortawesome/fontawesome-free/webfonts/**')
            .pipe(dest('assets/font-awesome/webfonts/')),
        src('node_modules/@fortawesome/fontawesome-free/LICENSE.txt')
            .pipe(dest('assets/font-awesome/')),
    );
}// copyFontAwesome


/**
 * Copy Popper.js v1
 * 
 * @param {type} cb 
 */
function copyPopper1(cb) {
    return mergeStream(
        src('./node_modules/popper.js/dist/umd/**')
            .pipe(dest('./assets/js/popper.js/umd/'))
    );
}// copyPopper1


/**
 * Copy Popper.js v2
 * 
 * @param {type} cb 
 */
function copyPopper2(cb) {
    return mergeStream(
        src('./node_modules/@popperjs/core/dist/umd/popper.*')
            .pipe(dest('./assets/js/popper.js/umd/')),
        src('node_modules/@popperjs/core/LICENSE*')
            .pipe(dest('assets/js/popper.js/'))
    );
}// copyPopper2


/**
 * Copy sanitize.css files.
 * 
 * @param {type} cb
 * @returns {unresolved}
 */
function copySanitizeCss(cb) {
    return mergeStream(
        src('node_modules/sanitize.css/LICENSE.md')
            .pipe(dest('assets/css/sanitize/')),
        src('node_modules/sanitize.css/forms.css')
            .pipe(dest('assets/css/sanitize/')),
        src('node_modules/sanitize.css/sanitize.css')
            .pipe(dest('assets/css/sanitize/')),
        src('node_modules/sanitize.css/typography.css')
            .pipe(dest('assets/css/sanitize/')),
    );
}// copySanitizeCss


/**
 * Copy smart menus.
 * 
 * @param {type} cb
 * @returns {unresolved}
 */
function copySmartMenus(cb) {
    return mergeStream(
        src('node_modules/smartmenus/dist/**.js')
            .pipe(dest('assets/js/smartmenus/')),
        src('node_modules/smartmenus/LICENSE*')
            .pipe(dest('assets/js/smartmenus/')),
        src('node_modules/smartmenus/dist/css/*.css')
            .pipe(dest('assets/css/smartmenus/')),
        src('node_modules/smartmenus/dist/css/sm-clean/**')
            .pipe(dest('assets/css/smartmenus/sm-clean/')),
        src('node_modules/smartmenus/dist/css/sm-simple/**')
            .pipe(dest('assets/css/smartmenus/sm-simple/')),
    );
}// copySmartMenus


function copyTippy(cb) {
    return src('./node_modules/tippy.js/**')
    .pipe(dest('./assets/js/tippy.js/'));
}// copyTippy


/**
 * Copy tooltip.js
 */
function copyTooltip(cb) {
    return src('./node_modules/tooltip.js/dist/umd/**')
        .pipe(dest('./assets/js/tooltip.js/umd/'));
}// copyTooltip


exports.copyPackages = parallel(
    copyFontAwesome,
    //copyPopper1,// deprecated, use with tippy v5.
    copyPopper2,// use with tippy.js v6. to install this, run `npm i @popperjs/core --save`.
    copySanitizeCss,
    copySmartMenus,
    copyTippy,
    //copyTooltip,// deprecated, use tippy.js instead
);