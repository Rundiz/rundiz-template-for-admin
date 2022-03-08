/**
 * Build HTML file(s) from PHP source.
 * 
 * Also work on watch modification.
 */


'use strict';


const {series, parallel, src, dest, watch} = require('gulp');
const mergeStream =   require('merge-stream');
const print = require('gulp-print').default;
const each = require('gulp-each');
const exec = require('child_process').exec;


/**
 * Build HTML from PHP source.
 */
function buildHTMLFiles(cb) {
    console.log('Building from main PHP files.');

    return src(['_original-source-php/*.php'], {
        cwd: '.',
        base: '.'
    })
        .pipe(
            each(function(content, file, callback) {
                //console.log('  ' + file.relative + ' > ./' + file.stem + '.html');
                //console.log(file.path);
                //console.log(file.dirname);
                //console.log(file.stem + '.html');
                exec('php -f ' + file.path + ' > ./' + file.stem + '.html');
                callback(null, content);
            })
        )
        .pipe(print((filePath) => {return `converted ${filePath} to HTML.`}))
    ;
}// buildHTMLFiles


/**
 * Build PHP only changed files.
 */
function buildPHPChanged(cb) {
    const cache = require('gulp-cached');

    return src([
        '_original-source-php/**/*.php',
    ], {
        base: './'
    })
        .pipe(cache('changedPHP'))
        .pipe(
            each(function(content, file, callback) {
                // file is the original Vinyl file object
                // @link https://gulpjs.com/docs/en/api/vinyl/

                let filterstrings = ['includes\/', 'includes\\\\'];
                let patternString = filterstrings.join("|");
                let regex = new RegExp(patternString, "i");
                if (regex.test(file.path)) {
                    // if edited php file is inside include folder.
                    // build all
                    console.log('  File changed is inside includes folder, calling to build all main PHP files.');
                    buildHTMLFiles(cb);
                    cb();
                } else {
                    //console.log('  ' + file.relative + ' > ./' + file.stem + '.html');
                    //console.log(file.path);
                    //console.log(file.dirname);
                    //console.log(file.stem + '.html');
                    exec('php -f ' + file.path + ' > ./' + file.stem + '.html');
                    callback(null, content);
                }
                //callback(null, content);
            })
        )
        .pipe(print((filePath) => {return `(watch) converted ${filePath} to HTML.`}))
    ;
}// buildPHPChanged


exports.buildPHP = parallel(
    buildHTMLFiles,
);

exports.watchBuildPHP = function() {
    console.log('Watching php.');
    watch(
        ['_original-source-php/**/*.php'], 
        {ignoreInitial: false},
        series(
            buildPHPChanged
        )
    )
};