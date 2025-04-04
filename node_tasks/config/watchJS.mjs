/**
 * Watch assets-src/js/rdta folder.
 */


'use strict';


import {deleteAsync} from 'del';
import path from 'node:path';
// import this app's useful class.
import FS from "../Libraries/FS.mjs";
// import sub class.
import JsBundler from './inc/jsBundler.mjs';


/**
 * @type {String} destFolder Destination folder where source will be compiled to.
 */
const destFolder = 'assets/js/rdta';


const relativeSrc = 'assets-src/js/rdta';


export default class WatchJS {


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
     * @param {string} file The changed file.
     */
    async #applyChanges(event, file) {
        let command;
        const fileRelative = path.relative(this.relativeSrc, file);

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
            await JsBundler.run({
                sourcePath: path.resolve(REPO_DIR, file),
                destPath: path.resolve(REPO_DIR, this.destFolder, fileRelative),
                relativeName: fileRelative,
                headerString: '/* watching process */\n',
                destJSFolder: this.destFolder,
            });
        }// endif;

        return Promise.resolve();
    }// applyChanges


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
     * Run watch
     */
    async run() {
        const options = {
            cwd: REPO_DIR,
            ignored: function (path, stats) {
                // watch only file extension.
                return stats?.isFile() && !path.endsWith('.js');
            },
        };
        const watcher = FS.watch('./assets-src/js', options);

        watcher.on('all', async (event, file, stats) => {
            await this.#displayFileChanged(event, file, REPO_DIR);
            await this.#applyChanges(event, file);
            console.log('  Finish task for file changed (' + event + ').');
        });
    }// run


}