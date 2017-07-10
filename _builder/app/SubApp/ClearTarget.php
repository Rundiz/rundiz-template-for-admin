<?php
/**
 * @license http://opensource.org/licenses/MIT MIT
 */


namespace App\SubApp;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearTarget
{


    /**
     * Clear the target folder except some folder or file.
     * 
     * @param string $targetDir Target folder.
     * @param InputInterface $Input
     * @param OutputInterface $Output
     * @return boolean Return true on success.
     */
    public function run($targetDir, InputInterface $Input, OutputInterface $Output)
    {
        $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($targetDir, \RecursiveDirectoryIterator::SKIP_DOTS), 
                \RecursiveIteratorIterator::CHILD_FIRST
        );

        $success = true;

        $Progress = new ProgressBar($Output, iterator_count($files));
        $Progress->start();

        if (is_array($files) || is_object($files)) {
            foreach ($files as $fileinfo) {
                if (stristr($fileinfo->getRealPath(), '.git/') !== false || stristr($fileinfo->getRealPath(), '.git\\') !== false) {
                    continue;
                } elseif ($fileinfo->getFilename() == '.git') {
                    continue;
                }

                if ($fileinfo->isWritable()) {
                    if ($fileinfo->isDir()) {
                        $result = rmdir($fileinfo->getRealPath());
                        if ($result !== true) {
                            $success = false;
                        }
                        unset($result);
                    } else {
                        $result = unlink($fileinfo->getRealPath());
                        if ($result !== true) {
                            $success = false;
                        }
                        unset($result);
                    }
                    $Progress->advance();
                }
            }// endforeach;
        }

        unset($files);
        $Progress->finish();
        unset($Progress);

        return $success;
    }// run


}