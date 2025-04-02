/**
 * yargs command: build.
 * 
 * Tasks for this command:
 * 1. Delete assets folders.
 * 2. Delete HTML files.
 * 3. Copy Node packages.
 * 4. Bundle source JS.
 * 5. Compile SCSS.
 * 6. Replace CSS header.
 * 7. Build HTML from PHP.
 */


'use strict';


// import this app's useful class.
import TextStyles from '../Libraries/TextStyles.mjs';
// import tasks for this command.
import {bundler} from './Tasks/Build/bundler.mjs';
import {deleter} from './Tasks/Build/deleter.mjs';
import {npCopier} from './Tasks/Build/npCopier.mjs';
import {phpBuilder} from './Tasks/Build/phpBuilder.mjs';


export const command = 'build';
export const describe = 'Build asset files such as CSS, JS, including HTML.';
export const builder = (yargs) => {
    return yargs.options({
        'skip-html': {
            alias: 's',
            demandOption: false,
            describe: 'Set this option to skip build HTML.',
            type: 'boolean',
        },
    })
    .example('$0 build')
    .example('$0 build --skip-html')
    ;
};
export const handler = async (argv) => {
    console.log(TextStyles.programHeader());
    console.log(TextStyles.commandHeader(' Command: ' + argv._ + ' '));

    // 1. & 2. Delete target folders.
    await deleter.clean(argv);
    // 3. Copy Node packages.
    await npCopier.copy(argv);
    // 4. Bundle source JS.
    // 5. Compile SCSS.
    // 6. Replace CSS header.
    await bundler.run(argv);
    // 7. Build HTML from PHP.
    await phpBuilder.run(argv);

    console.log(TextStyles.txtSuccess(TextStyles.taskHeader('End command.')));
};