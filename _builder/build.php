<?php
/** 
 * Build the repository source.
 * 
 * This will convert any .php original source into .html for easily open in web browser, and then compile any .scss into .css files.
 * 
 * @license http://opensource.org/licenses/MIT MIT
 */


if (php_sapi_name() !== 'cli') {
    echo 'This app is for running via command line only.';
    exit();
}


if (version_compare(phpversion(), '5.5', '>=') == false) {
    echo 'You are running PHP version older than required.';
    exit();
}


require __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'index.php';