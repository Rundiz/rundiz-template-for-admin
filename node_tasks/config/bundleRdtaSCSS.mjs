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


const scssGlob = 'assets-src/scss/**/*.scss';

const destCSSFolder = 'assets-src/css';


export default class bundleRdtaSCSS {


    static get scssGlob() {
        return scssGlob;
    }// scssGlob


    static get destCSSFolder() {
        return destCSSFolder;
    }// destCSSFolder


    /**
     * Update destination folder to contain additional sub folder matched source file.
     */
    #updateDestFolderMatchSrc(sourceFile) {
        const sourceFileOnly = path.basename(sourceFile);
        const sourceFolder = path.dirname(sourceFile);
        const sourceFolderArray = sourceFolder.split('/');
        const destCSSFolderArray = bundleRdtaSCSS.destCSSFolder.split('/');

        if (destCSSFolderArray.length <= sourceFolderArray.length) {
            let i = 1;
            for (const eachSrcSegment of sourceFolderArray) {
                if (i <= destCSSFolderArray.length) {
                    ++i;
                    continue;
                }
                destCSSFolderArray.push(eachSrcSegment);
                ++i;
            }// endfor;
            
            return destCSSFolderArray.join('/');
        }

        return bundleRdtaSCSS.destCSSFolder;
    }// #updateDestFolderMatchSrc


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
            if (path.basename(scssFile).startsWith('.')) {
                continue;
            }
            const sassObj = new Sass({
                sourceFile: scssFile,
                options: {
                    sourceMap: false,
                }
            });
            let compileResult = sassObj.compile({destFolder: this.destCSSFolder});
            let writeResult = await sassObj.writeFile(this.destCSSFolder);

            console.log('    Compiled scss: ' + scssFile + ' > ' + writeResult.file);
        }// endfor;
    }// compileSCSS


    /**
     * Run bundle & minify assets.
     * 
     * @param {Object} argv The CLI arguments.
     * @returns {Promise} Return `Promise` object.
     */
    static run(argv) {
        console.log('  Compile SCSS');

        let tasks = [];
        tasks.push(
            this.#compileSCSS()
        );

        return Promise.all(tasks)
        .then(() => {
            console.log('  End compile SCSS.');
            return Promise.resolve();
        });// end Promise.
    }// run


}