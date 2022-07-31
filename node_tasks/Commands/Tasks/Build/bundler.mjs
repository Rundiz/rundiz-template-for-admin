/**
 * Bundle, compile, minify::
 *  1. Bundle source JS
 * 
 * config.json example:
 ```
    "bundleAssets": [
        "config/bundleMoment.mjs"
    ]
 ```
 */


'use strict';


import fs from 'node:fs';
import path from 'node:path';
import url from 'node:url';
// import this app's useful class.
import NtConfig from "../../../Libraries/NtConfig.mjs";
import TextStyles from '../../../Libraries/TextStyles.mjs';


export const bundler = class Bundler {


    /**
     * Run bundle asset files that are specified in config.
     * 
     * @link https://stackoverflow.com/questions/37576685/using-async-await-with-a-foreach-loop Original source of sequence promise, await/async.
     * @param {Object} argv The CLI arguments.
     * @returns {Promise} Return `Promise` object.
     */
    static async run(argv) {
        const bundleObj = NtConfig.getValue('bundleAssets', {});

        if (!bundleObj || typeof(bundleObj) !== 'object' || Object.keys(bundleObj).length <= 0) {
            // if config has no `bundleAssets` property.
            return Promise.resolve();
        }

        console.log(TextStyles.taskHeader('Bundler tasks.'));

        // load files and run in sequence.
        for (const configJS of bundleObj) {
            const fullPathConfigJS = path.resolve(NODETASKS_DIR, configJS);
            if (fs.existsSync(fullPathConfigJS)) {
                const {default: bundlerClass} = await import(url.pathToFileURL(fullPathConfigJS));
                await bundlerClass.run();
            } else {
                console.warn('  ' + TextStyles.txtWarning('The file ' + fullPathConfigJS + ' was not found.'));
            }
        }// endfor;

        console.log('End bundler tasks.');
        return Promise.resolve();
    }// run

    
}