/**
 * yargs command: watch.
 * 
 * Tasks for this command:
 * 1. Delete HTML files.
 * 2. Start watching::
 *  2.1. assets/js-src
 *  2.2. assets/scss
 */


'use strict';


// import this app's useful class.
import TextStyles from '../Libraries/TextStyles.mjs';
// import tasks for this command.
import {deleter} from './Tasks/Watch/deleter.mjs';
import {watcher} from './Tasks/Watch/watcher.mjs';


export const command = 'watch';
export const describe = 'Watch asset files such as CSS, JS, images changed and apply changes.';
export const builder = (yargs) => {

};
export const handler = async (argv) => {
    console.log(TextStyles.programHeader());
    console.log(TextStyles.commandHeader(' Command: ' + argv._ + ' '));

    // 1. Get and set framework's public path to `rdbPublicModuleAssetsDir` global variable.
    await deleter.clean(argv);
    // 2. Start watching.
    const watcherObj = new watcher(argv);
    watcherObj.watch();
};