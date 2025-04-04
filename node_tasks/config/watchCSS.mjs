/**
 * Watch assets-src/css folder.
 */


'use strict';


import {deleteAsync} from 'del';
import path from 'node:path';
// import this app's useful class.
import FS from "../Libraries/FS.mjs";
// import based class.
import MinCSS from "../Libraries/MinCSS.mjs";


const destFolder = 'assets/css';


const relativeSrc = 'assets-src/css';


export default class WatchCSS {


    /**
     * Class constructor.
     * 
     * @param {Object} argv The CLI arguments.
     */
    constructor(argv) {
        /**
         * @type {Object} The command line argument.
         */
        this.argv = {};
        if (typeof(argv) === 'object') {
            this.argv = {
                ...this.argv,
                ...argv,
            }
        }
    }// constructor


    get destFolder() {
        return destFolder;
    }// destFolder


    get relativeSrc() {
        return relativeSrc;
    }// relativeSrc


    /**
     * Apply changes to destination.
     * 
     * @link https://www.npmjs.com/package/del The dependent Node package.
     * @async
     * @private This method was called from `watch()`.
     * @param {string} event The watcher events. See https://github.com/paulmillr/chokidar#methods--events
     * @param {string} file The changed file. Sample value: `assets-src\css\rdta\xxxx.css`
     */
    async #applyChanges(event, file) {
        let command;
        const fileRelative = path.relative(this.relativeSrc, file);
        const fullPathSource = path.resolve(REPO_DIR, file);

        if (event.toLowerCase().indexOf('unlink') !== -1) {
            // if matched unlink (file), unlinkDir (folder)
            command = 'delete';
        } else {
            // if matched add, addDir, change
            command = null;
        }

        if (command === 'delete') {
            // if command is delete (file and folder).
            const fullPathDest = path.resolve(REPO_DIR, this.destFolder, file);
            const deleteResult = await deleteAsync(fullPathDest, {force: true});
            for (const item of deleteResult) {
                console.log('    - Deleted: ' + item);
            };
        }

        if (command !== 'delete') {
            // else, it is copy command.
            // compile CSS.
            const newDestFolder = this.#updateDestFolderMatchSrc(file);
            let minCSS = new MinCSS({
                sourceFiles: file,
                options: {
                    format: 'beautify',
                    level: 0,
                    sourceMap: true,
                    rebaseTo: path.resolve(REPO_DIR, newDestFolder),
                }
            });
            await minCSS.minify(path.basename(file));
            let writeResult = await minCSS.writeFile(newDestFolder);
            console.log('    Compiled css: ' + file + ' > ' + writeResult.file);

            // minify CSS.
            let eachCssExp = file.split('.');
            eachCssExp[(eachCssExp.length - 1)] = 'min.' + eachCssExp[(eachCssExp.length - 1)];
            const minCSSPathFileName = eachCssExp.join('.');
            minCSS = new MinCSS({
                sourceFiles: file,
                options: {
                    level: 0,
                    sourceMap: true,
                    rebaseTo: path.resolve(REPO_DIR, newDestFolder),
                }
            });
            await minCSS.minify(path.basename(minCSSPathFileName));
            writeResult = await minCSS.writeFile(newDestFolder);
            console.log('    Minified css: ' + file + ' > ' + writeResult.file);
        }// endif;

        return Promise.resolve();
    }// #applyChanges


    /**
     * Display file changed.
     * 
     * @private This method was called from `run()`.
     * @param {string} event The watcher events. See https://github.com/paulmillr/chokidar#methods--events
     * @param {string} file The changed file.
     * @param {string} source The source folder full path.
     */
    #displayFileChanged(event, file, source) {
        console.log('  File changed (' + event + '): ' + path.resolve(source, file));
    }// displayFileChanged


    /**
     * Update destination folder to contain additional sub folder matched source file.
     */
    #updateDestFolderMatchSrc(sourceFile) {
        sourceFile = sourceFile.replaceAll('\\', '/');// replace all directory separator to use slash because we will split using slash.

        const sourceFileOnly = path.basename(sourceFile);
        const sourceFolder = path.dirname(sourceFile);
        const sourceFolderArray = sourceFolder.split('/');
        const destCSSFolderArray = this.destFolder.split('/');

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

        return this.destFolder;
    }// #updateDestFolderMatchSrc


    /**
     * Run watch
     */
    async run() {
        const options = {
            cwd: REPO_DIR,
            ignored: function (path, stats) {
                // watch only file extension.
                return stats?.isFile() && !path.endsWith('.css');
            },
        };
        const watcher = FS.watch('./assets-src/css', options);

        watcher.on('all', async (event, file, stats) => {
            await this.#displayFileChanged(event, file, REPO_DIR);
            await this.#applyChanges(event, file);
            console.log('  Finish task for file changed (' + event + ').');
        });
    }// run


}// WatchCSS