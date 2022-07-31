/**
 * Replace CSS header.
 */


'use strict';


import fs from 'node:fs';
import path from 'node:path';
// import this app's useful class.
import FS from "../Libraries/FS.mjs";
import TextStyles from '../Libraries/TextStyles.mjs';


const cssGlob = 'assets/css/rdta/**/*.css';


export default class replaceCSSHeader {


    static get cssGlob() {
        return cssGlob;
    }// cssGlob


    /**
     * Do replace CSS header.
     */
    static async #doReplace() {
        const packageJSON = path.resolve('package.json');
        const packageJSONObject = JSON.parse(fs.readFileSync(packageJSON));
        const packageVersion = packageJSONObject?.version ?? 'unknown';

        let cssFiles = await FS.glob(
            this.cssGlob, 
            {
                absolute: true,
            }
        );

        for (const cssFile of cssFiles) {
            if (!fs.existsSync(cssFile)) {
                console.warn('    ' + TextStyles.txtWarning('The file ' + cssFile + ' is not exists.'));
                continue;
            }

            let fileContents = fs.readFileSync(cssFile, {encoding: 'utf-8'});
            fileContents = fileContents.replace('__RDTA.VERSION__', packageVersion);
            fs.writeFileSync(cssFile, fileContents);
            console.log('    Replaced: ' + cssFile);
        }// endfor;
    }// doReplace


    /**
     * Run bundle & minify assets.
     * 
     * @returns {Promise} Return `Promise` object.
     */
     static run() {
        console.log('  Replace CSS header');

        let tasks = [];
        tasks.push(
            this.#doReplace()
        );

        return Promise.all(tasks)
        .then(() => {
            console.log('  End replace CSS header.');
            return Promise.resolve();
        });// end Promise.
    }// run


}