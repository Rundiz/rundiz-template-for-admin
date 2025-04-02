/**
 * Build PHP files into HTML files.
 * 
 * config.json example:
 ```
    "phpBuilder": {
        "patterns": ["_original-source-php/*.php"],
        "relativeFrom": "_original-source-php",// will be strip "_original-source-php" folder from result path and create HTML outside "_original-source-php" folder.
    }
 ```
 */


'use strict';


import {execSync} from 'node:child_process';
import path from 'node:path';
// import this app's useful class.
import FS from '../../../Libraries/FS.mjs';
import NtConfig from "../../../Libraries/NtConfig.mjs";
import TextStyles from '../../../Libraries/TextStyles.mjs';


export const phpBuilder = class PhpBuilder {


    /**
     * Run PHP builder.
     * 
     * @link https://stackoverflow.com/questions/37576685/using-async-await-with-a-foreach-loop Original source of sequence promise, await/async.
     * @param {Object} argv The CLI arguments.
     * @returns {Promise} Return `Promise` object.
     */
    static async run(argv) {
        if (true === argv['skip-html']) {
            console.log(TextStyles.txtInfo('Skip build HTML from PHP builder task.'));
            return Promise.resolve();
        }

        const phpBuilderObj = NtConfig.getValue('phpBuilder', {});

        if (
            !phpBuilderObj || 
            typeof(phpBuilderObj) !== 'object' || 
            !phpBuilderObj.patterns || 
            (
                typeof(phpBuilderObj.patterns) !== 'object' && 
                typeof(phpBuilderObj.patterns) !== 'string'
            )
        ) {
            // if config has no `phpBuilder`, `phpBuilder.patterns` property.
            return Promise.resolve();
        }

        console.log(TextStyles.taskHeader('PHP builder task.'));

        if (!phpBuilderObj?.relativeFrom) {
            let patterns = phpBuilderObj.patterns;
            if (Array.isArray(patterns)) {
                patterns = patterns[0];
            }
            phpBuilderObj.relativeFrom = path.dirname(patterns);
        }

        const phpFiles = await FS.glob(phpBuilderObj.patterns, {
            absolute: false,
        });
        for (const phpFile of phpFiles) {
            const phpExt = path.extname(phpFile);
            if (phpExt.toLowerCase() !== '.php') {
                continue;
            }
            const htmlFile = path.relative(phpBuilderObj.relativeFrom, phpFile.replace(phpExt, '.html'));
            try {
                execSync('php -f ' + phpFile + ' > ./' + htmlFile, {
                    cwd: REPO_DIR,
                });
                console.log('  Built: ' + phpFile + ' > ' + htmlFile);
            } catch (ex) {
                console.error('  ' + TextStyles.txtError(ex.message));
            }
        }// endfor;

        console.log('End PHP builder task.');
        return Promise.resolve();
    }// run


}