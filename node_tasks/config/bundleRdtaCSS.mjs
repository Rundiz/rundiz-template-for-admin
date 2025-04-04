/**
 * Compile source CSS.
 */


'use strict';


import path from 'node:path';
// import this app's useful class.
import FS from "../Libraries/FS.mjs";
// import based class.
import MinCSS from "../Libraries/MinCSS.mjs";


const cssGlob = 'assets-src/css/**/*.css';

const destCSSFolder = 'assets/css';


export default class BundleRdtaCSS {


    static get cssGlob() {
        return cssGlob;
    }// cssGlob


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
        const destCSSFolderArray = BundleRdtaCSS.destCSSFolder.split('/');

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

        return BundleRdtaCSS.destCSSFolder;
    }// #updateDestFolderMatchSrc


    /**
     * Compile CSS.
     */
    static async #compileCSS() {
        const thisClass = new this;

        let cssFiles = await FS.glob(
            this.cssGlob, 
            {
                absolute: false,
            }
        );

        const minifyLevel = 0;

        for (const cssFile of cssFiles) {
            // value of `cssFile` is `assets-src/css/rdta/xxxx.css`.
            if (path.basename(cssFile).startsWith('_')) {
                continue;
            }

            const newDestFolder = thisClass.#updateDestFolderMatchSrc(cssFile);
            const minCSS = new MinCSS({
                sourceFiles: cssFile,
                options: {
                    format: {
                        breaks: {
                            afterAtRule: true,
                            afterBlockBegins: true,
                            afterBlockEnds: true,
                            afterComment: true,
                            afterProperty: true,
                            afterRuleBegins: true,
                            afterRuleEnds: true,
                            beforeBlockEnds: true,
                            betweenSelectors: true
                        },
                        indentBy: 2,
                        spaces: {
                            aroundSelectorRelation: true,
                            beforeBlockBegins: true,
                            beforeValue: true,
                        },
                        semicolonAfterLastProperty: true,
                    },
                    level: minifyLevel,
                    sourceMap: true,
                    rebaseTo: path.resolve(REPO_DIR, newDestFolder),
                }
            });
            await minCSS.minify(path.basename(cssFile));
            const result = await minCSS.writeFile(newDestFolder);

            console.log('    Compiled file: ' + result.file);
            if (result.sourceMap) {
                console.log('    Compiled source map: ' + result.sourceMap);
            }
        }// endfor;
    }// compileCSS


    /**
     * Compile CSS.
     */
    static async #minifyCSS() {
        const thisClass = new this;

        let cssFiles = await FS.glob(
            this.cssGlob, 
            {
                absolute: false,
            }
        );

        const minifyLevel = 2;

        for (const cssFile of cssFiles) {
            if (path.basename(cssFile).startsWith('_')) {
                continue;
            }

            let eachCssExp = cssFile.split('.');
            eachCssExp[(eachCssExp.length - 1)] = 'min.' + eachCssExp[(eachCssExp.length - 1)];
            const minCSSPathFileName = eachCssExp.join('.');

            const newDestFolder = thisClass.#updateDestFolderMatchSrc(cssFile);
            const minCSS = new MinCSS({
                sourceFiles: cssFile,
                options: {
                    level: minifyLevel,
                    sourceMap: true,
                    rebaseTo: path.resolve(REPO_DIR, newDestFolder),
                }
            });
            await minCSS.minify(path.basename(minCSSPathFileName));
            const result = await minCSS.writeFile(newDestFolder)

            console.log('    Minified file: ' + result.file);
            if (result.sourceMap) {
                console.log('    Minified source map: ' + result.sourceMap);
            }
        }// endfor;
    }// minifyCSS


    /**
     * Run bundle & minify assets.
     * 
     * @param {Object} argv The CLI arguments.
     * @returns {Promise} Return `Promise` object.
     */
    static run(argv) {
        console.log('  Compile CSS');

        let tasks = [];
        tasks.push(
            this.#compileCSS()
        );
        tasks.push(
            this.#minifyCSS()
        );

        return Promise.all(tasks)
        .then(() => {
            console.log('  End compile CSS.');
            return Promise.resolve();
        });// end Promise.
    }// run


}// BundleRdtaCSS