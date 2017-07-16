<?php
/**
 * @license http://opensource.org/licenses/MIT MIT
 */


namespace App\SubApp\Modify;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RestorePhp
{


    /**
     * Count total progress.
     * 
     * @param string $targetDir
     * @return array
     */
    private function countTotalProgress($targetDir)
    {
        if (is_dir($targetDir)) {
            $files = new \RecursiveIteratorIterator(
                    new \RecursiveDirectoryIterator($targetDir, \RecursiveDirectoryIterator::SKIP_DOTS), 
                    \RecursiveIteratorIterator::CHILD_FIRST
            );
            $totalPhp = iterator_count($files);// total includes files and sub folders.
            unset($files);
        } else {
            $totalPhp = 0;
        }

        return ($totalPhp + 1);// +1 for delete php source folder.
    }// countTotalProgress


    /**
     * recursively delete file and folder including itself.
     * 
     * @param string $targetDir
     * @param ProgressBar $Progress
     */
    private function recursiveDelete($targetDir, ProgressBar $Progress)
    {
        if (!file_exists($targetDir)) {
            return ;
        }

        $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($targetDir, \RecursiveDirectoryIterator::SKIP_DOTS), 
                \RecursiveIteratorIterator::CHILD_FIRST
        );

        
        if (is_array($files) || is_object($files)) {
            foreach ($files as $fileinfo) {
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

        rmdir($targetDir);
        $Progress->advance();
    }// recursiveDelete


    /**
     * Recursively move the whole folder.
     * 
     * @param string $src
     * @param string $dst
     * @param ProgressBar $Progress
     */
    private function recursiveMove($src, $dst, ProgressBar $Progress)
    {
        if (!is_dir($src)) {
            return ;
        }

        if (false !== $dir = opendir($src)) {
            $old = umask(0);
            @mkdir($dst, 0777, true);
            umask($old);
            $Progress->advance();

            while (false !== ( $file = readdir($dir))) {
                if (( $file != '.' ) && ( $file != '..' )) {
                    if (is_dir($src . '/' . $file)) {
                        $this->recursiveMove($src . '/' . $file, $dst . '/' . $file, $Progress);
                    } else {
                        rename($src . '/' . $file, $dst . '/' . $file);
                        $Progress->advance();
                    }
                }
            }

            closedir($dir);
        }
    }// recursiveMove


    /**
     * Restore PHP files from sub folder into project's root folder.
     * 
     * @param string $targetDir
     * @param InputInterface $Input
     * @param OutputInterface $Output
     */
    public function run($targetDir, InputInterface $Input, OutputInterface $Output)
    {
        if (!is_dir($targetDir)) {
            return false;
        }

        $phpSourceFolder = $targetDir . DIRECTORY_SEPARATOR . '_original-source-php';

        $Progress = new ProgressBar($Output, $this->countTotalProgress($phpSourceFolder));
        $Progress->start();

        // move the php source from subfolder to project's root.
        $this->recursiveMove($phpSourceFolder, $targetDir, $Progress);

        // delete the php source folder itself.
        $this->recursiveDelete($phpSourceFolder, $Progress);

        $Progress->finish();
        unset($phpSourceFolder, $Progress);

        return true;
    }// run


}