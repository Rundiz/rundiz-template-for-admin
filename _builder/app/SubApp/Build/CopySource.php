<?php
/**
 * @license http://opensource.org/licenses/MIT MIT
 */


namespace App\SubApp\Build;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CopySource
{


    /**
     * Recursively copy the whole folder.
     * 
     * @param string $src
     * @param string $dst
     * @param ProgressBar $Progress
     */
    private function recursiveCopy($src, $dst, ProgressBar $Progress)
    {
        $dir = opendir($src);

        $old = umask(0);
        @mkdir($dst, 0777, true);
        umask($old);
        $Progress->advance();

        while (false !== ( $file = readdir($dir))) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if (is_dir($src . '/' . $file)) {
                    $this->recursiveCopy($src . '/' . $file, $dst . '/' . $file, $Progress);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                    $Progress->advance();
                }
            }
        }

        closedir($dir);
    }// recursiveCopy


    /**
     * Copy source folder to target folder.
     * 
     * @param string $targetDir Target folder.
     * @param InputInterface $Input
     * @param OutputInterface $Output
     * @return boolean Return true on success.
     */
    public function run($targetDir, InputInterface $Input, OutputInterface $Output)
    {
        $sourceDir = dirname(dirname(dirname(dirname(__DIR__))));

        $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($sourceDir, \RecursiveDirectoryIterator::SKIP_DOTS), 
                \RecursiveIteratorIterator::CHILD_FIRST
        );

        $Progress = new ProgressBar($Output, iterator_count($files));
        unset($files);
        $Progress->start();

        $this->recursiveCopy($sourceDir, $targetDir, $Progress);

        $Progress->finish();
        unset($Progress);

        return true;
    }// run


}