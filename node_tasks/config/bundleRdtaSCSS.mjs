/**
 * Compile SCSS
 * 
 * Also minify them.
 */


'use strict';


import path from 'node:path';
// import this app's useful class.
import FS from "../Libraries/FS.mjs";
// import based class.
import Sass from '../Libraries/Sass.mjs';


const scssGlob = 'assets/scss/**/*.scss';

const destCSSFolder = 'assets/css';


export default class bundleRdtaSCSS {


    static get scssGlob() {
        return scssGlob;
    }// scssGlob


    static get destCSSFolder() {
        return destCSSFolder;
    }// destCSSFolder


    /**
     * Compile SCSS.
     */
    static async #compileSCSS() {
        let scssFiles = await FS.glob(
            this.scssGlob, 
            {
                absolute: false,
            }
        );

        for (const scssFile of scssFiles) {
            if (path.basename(scssFile).startsWith('_')) {
                continue;
            }
            const sassObj = new Sass({
                sourceFile: scssFile,
                options: {
                    sourceMap: true,
                }
            });
            let compileResult = sassObj.compile();
            let writeResult = await sassObj.writeFile(this.destCSSFolder);

            console.log('    Compiled: ' + scssFile + ' > ' + writeResult.file);
        }// endfor;
    }// compileSCSS


    /**
     * Minify SCSS.
     */
    static async #minifySCSS() {
        let scssFiles = await FS.glob(
            this.scssGlob, 
            {
                absolute: false,
            }
        );

        for (const scssFile of scssFiles) {
            if (path.basename(scssFile).startsWith('_')) {
                continue;
            }
            const sassObj = new Sass({
                sourceFile: scssFile,
                options: {
                    sourceMap: true,
                    style: 'compressed',
                }
            });
            let compileResult = sassObj.compile({suffix: '.min.css'});
            let writeResult = await sassObj.writeFile(this.destCSSFolder);

            console.log('    Minified: ' + scssFile + ' > ' + writeResult.file);
        }// endfor;
    }// minifySCSS


    /**
     * Run bundle & minify assets.
     * 
     * @returns {Promise} Return `Promise` object.
     */
    static run() {
        console.log('  Compile SCSS');

        let tasks = [];
        tasks.push(
            this.#compileSCSS()
        );
        tasks.push(
            this.#minifySCSS()
        );

        return Promise.all(tasks)
        .then(() => {
            console.log('  End compile SCSS.');
            return Promise.resolve();
        });// end Promise.
    }// run


}