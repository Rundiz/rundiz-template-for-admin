<?php
/** 
 * The main application.
 * 
 * @license http://opensource.org/licenses/MIT MIT
 */


if (php_sapi_name() !== 'cli') {
    echo 'This app is for running via command line only.';
    exit();
}


require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';


use Symfony\Component\Console\Application;


$Application = new Application('Repo Builder');
$Application->add(new \App\MainApp());
$Application->run();
unset($Application);