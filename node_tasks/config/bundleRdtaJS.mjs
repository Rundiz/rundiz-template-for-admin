/**
 * Minify Rundiz Template for Admin JS.
 * 
 * Also minify them.
 */


'use strict';


import fs from 'node:fs';
import path from 'node:path';
// import this app's useful class.
import FS from "../Libraries/FS.mjs";
// import sub class.
import JsBundler from './inc/jsBundler.mjs';


let jsFiles = [
];

const destJSFolder = 'assets/js/rdta';

const headerString = '/*!\n ' +
'Rundiz template for admin v <%= pkg.version %> \n' +
'License: <%= pkg.license %>\n' +
'*/\n';


export default class BundleRdtaJS {


    static get destJSFolder() {
        return destJSFolder;
    }// destJSFolder

    
    static get headerString() {
        const packageJSON = path.resolve('package.json');
        const packageJSONObject = JSON.parse(fs.readFileSync(packageJSON));
        return headerString
        .replace('<%= pkg.version %>', packageJSONObject.version)
        .replace('<%= pkg.license %>', packageJSONObject.license);
    }// headerString
    

    /**
     * Get JS files.
     */
    static get jsFiles() {
        return jsFiles;
    }// jsFiles


    /**
     * Get JS files from Glob pattern.
     */
    static async #getJsFilesFromPattern() {
        jsFiles = await FS.glob('assets/js-src/rdta/**/*.js', {
            absolute: false,
            cwd: REPO_DIR
        });
        return jsFiles;
    }// getJsFilesFromPattern


    /**
     * Minify JS.
     */
    static async #minifyJS() {
        await this.#getJsFilesFromPattern();
        
        if (typeof(this.jsFiles) === 'object' && Array.isArray(this.jsFiles)) {
            for (const eachFile of this.jsFiles) {
                const relativeName = path.relative('assets/js-src/rdta', eachFile);
                const sourcePath = path.resolve(REPO_DIR, eachFile);

                await JsBundler.run({
                    sourcePath: sourcePath,
                    destPath: path.join(this.destJSFolder, relativeName),
                    relativeName: relativeName,
                    headerString: this.headerString,
                    destJSFolder: this.destJSFolder,
                });
            }// endfor;
        }// endif;
        return Promise.resolve();
    }// miniJS


    /**
     * Run bundle RDTA.
     * 
     * @async
     */
    static run() {
        console.log('  Bundle RDTA JS.');

        let tasks = [];
        tasks.push(
            this.#minifyJS()
        );

        return Promise.all(tasks)
        .then(() => {
            console.log('  End bundle RDTA JS.');
            return Promise.resolve();
        });// end Promise.
    }// run


}