/**
 * Watch assets-src/css folder.
 */


'use strict';


import { deleteAsync } from 'del';
import path from 'node:path';
import fs from 'node:fs/promises';
// import this app's useful class.
import FS from "../Libraries/FS.mjs";
import TextStyles from "../Libraries/TextStyles.mjs";
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


    /**
     * Destination folder of built CSS but use relative path from root folder.
     * 
     * @return {String} The destination folder of built CSS.
     */
    get destFolder() {
        return destFolder;
    }// destFolder


    /**
     * Relative source folder of assets-src/css
     * 
     * @returns {String} The source folder of CSS.
     */
    get relativeSrc() {
        return relativeSrc;
    }// relativeSrc


    get watchFolder() {
        return './' + this.relativeSrc;
    }// watchFolder


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
     * Detect parent file that it is `@import` current changed file. If found, then use parent file instead.
     * 
     * @param {string} file The changed file. Sample value: `assets-src\css\rdta\xxxx.css`
     * @return {string} Return parent file if found, or return current file if not found the parent file.
     */
    async #detectParentFile(file) {
        // read each CSS file that is not named start with underscore (_) and find out that they imported current changed file.
        const regexFile = /^_(.*)?$/;// file name start with `_`.
        const regexImportCode = /^@import\s*('|")(?<import_file>.+)('|");?$/;
        if (regexFile.test(path.basename(file))) {
            // if current changed file name is start with underscore. this means it must be imported by other file(s).
            const cssFiles = await FS.glob(this.watchFolder + '/**/*.css', 
                {
                    'cwd': REPO_DIR,
                }
            );
            loopCssFiles: for (const cssFile of cssFiles) {
                if (regexFile.test(path.basename(cssFile)) === true) {
                    // if file name start with `_`, don't work here.
                    continue;
                }
                const stat = await fs.stat(cssFile);
                if (!stat.isFile()) {
                    continue;
                }

                const fileReader = await fs.open(cssFile);
                loopCssLines: for await (const line of fileReader.readLines()) {
                    const importRegex = line.match(regexImportCode);
                    if (importRegex?.groups?.import_file) {
                        // if found `@import`.
                        if (path.resolve(file) === path.resolve(path.dirname(cssFile), importRegex.groups.import_file)) {
                            // if found `@import` of current changed file.
                            const returnFile = path.relative(REPO_DIR, cssFile);
                            console.log('    ' + TextStyles.txtInfo('This file was found in `@import` on the file ' + cssFile + '.'));
                            console.log('    ' + TextStyles.txtInfo('Use this file instead: ' + returnFile + '.'));
                            return returnFile;
                        }// endif;
                    }// endif; found regex `@import 'file.css';`.
                }// endfor; read file line by line.
            }// endfor; list css files.
        }// endif;

        return file;
    }// #detectParentFile


    /**
     * Display file changed.
     * 
     * @private This method was called from `run()`.
     * @param {string} event The watcher events. See https://github.com/paulmillr/chokidar#methods--events
     * @param {string} file The changed file.
     */
    #displayFileChanged(event, file) {
        console.log('  File changed (' + event + '): ' + path.resolve(REPO_DIR, file));
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
        const watcher = FS.watch(this.watchFolder, options);

        watcher.on('all', async (event, file, stats) => {
            await this.#displayFileChanged(event, file);
            try {
                file = await this.#detectParentFile(file);
                await this.#applyChanges(event, file);
            } catch (err) {
                console.error(TextStyles.txtError('Error! '), err);
            }
            console.log('  Finish task for file changed (' + event + ').');
        });
    }// run


}// WatchCSS