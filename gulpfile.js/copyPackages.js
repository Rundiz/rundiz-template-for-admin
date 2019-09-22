/**
 * Copy Node packages.
 */


'use strict';


const {series, parallel, src, dest, watch} = require('gulp');


/**
 * Copy tooltip.js
 */
function copyTooltip(cb) {
    return src('./node_modules/tooltip.js/dist/umd/**')
        .pipe(dest('./assets/js/tooltip.js/umd/'));
}// copyTooltip


exports.copyPackages = parallel(
    copyTooltip
);