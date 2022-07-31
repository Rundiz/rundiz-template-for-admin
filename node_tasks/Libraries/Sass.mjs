/**
 * SASS compiler.
 */


'use strict';


import fs from 'node:fs';
import path from 'node:path';
import sass from 'sass';
// import class that extends from.
import BasedBundler from './BasedBundler.mjs';


export default class Sass extends BasedBundler {


    /**
     * @type {Object} Sass options. See https://sass-lang.com/documentation/js-api/
     */
    options = {};

    
    /**
     * @type {string} The source file.
     */
    sourceFile = '';


    /**
     * SASS/SCSS folder.
     */
    sourceFolder = '';


    /**
     * Class constructor.
     * 
     * @link https://www.npmjs.com/package/sass This class is depend on sass package.
     * @link https://sass-lang.com/documentation/js-api/ Document.
     * @param {Object} Object Accept arguments
     * @param {string} Object.sourceFile A source file. Relative from this repository folder.
     * @param {sass.Options} Object.options Accept options
     */
    constructor({sourceFile, options = {}} = {}) {
        if (typeof(sourceFile) !== 'string') {
            throw new Error('The `sourceFile` argument must be string.');
        }

        super();

        if (sourceFile) {
            this.sourceFile = sourceFile;
        } else {
            throw new Error('The `sourceFile` argument is required.');
        }

        const defaults = {
            charset: true,
            sourceFolder: 'assets/scss',
            sourceMap: false,
            style: 'expanded',
        };
        if (typeof(options) === 'object') {
            this.options = {
                ...defaults,
                ...options
            };
        }

        this.sourceFolder = this.options.sourceFolder;
        delete this.options.sourceFolder;
    }// constructor


    /**
     * Compile SCSS/SASS.
     * 
     * @param {Object} Object Accept arguments
     * @param {string} Object.suffix Rename suffix file. Default is `'.css'`.
     * @return {Promise} Return Promise object with `sass.compile()` result.
     */
    compile({suffix = '.css'} = {}) {
        const sourceFullPath = path.resolve(REPO_DIR, this.sourceFile);
        if (!fs.existsSync(sourceFullPath)) {
            console.warn('    ' + TextStyles.txtWarning('Warning: ' + sourceFullPath + ' is not found.'));
            return Promise.reject();
        } else {
            const relativeName = path.relative(this.sourceFolder, this.sourceFile);
            this._destinationFile = relativeName.replace('.scss', suffix);

            const sassResult = sass.compile(this.sourceFile, this.options);
            this._content = new Buffer.from(sassResult.css);
            this._sourceMapContent = (sassResult?.sourceMap ? sassResult.sourceMap.toString() : '');
            this._processed = true;

            return Promise.resolve(sassResult);
        }// endif;
    }// compile


}