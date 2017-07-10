<?php
/**
 * @license http://opensource.org/licenses/MIT MIT
 */


namespace App\SubApp;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ConvertPhp
{


    /**
     * Convert
     * 
     * @param string $targetDir
     * @param string $targetConverted
     * @param ProgressBar $Progress
     * @param InputInterface $Input
     * @param OutputInterface $Output
     */
    protected function convert($targetDir, $targetConverted, ProgressBar $Progress, InputInterface $Input, OutputInterface $Output)
    {
        $Io = new SymfonyStyle($Input, $Output);

        if (false !== $dh = opendir($targetDir)) {
            while (false !== $entry = readdir($dh)) {
                if ($entry != '.' && $entry != '..' && is_file($targetDir . DIRECTORY_SEPARATOR . $entry)) {
                    $fileExp = explode('.', $entry);
                    $fileExt = $fileExp[count($fileExp) - 1];
                    unset($fileExp[count($fileExp) - 1]);
                    $fileName = implode('.', $fileExp);
                    unset($fileExp);

                    if (strtolower($fileExt) == 'php') {
                        // generate the file
                        exec('php -f '
                            . $targetDir . DIRECTORY_SEPARATOR . $entry
                            . ' > '
                            . $targetConverted . DIRECTORY_SEPARATOR . $fileName . '.html'
                        );

                        // check that converted file successfully.
                        if (!is_file($targetConverted . DIRECTORY_SEPARATOR . $fileName . '.html')) {
                            $Io->error('Unable to convert file, please make sure that the converted folder is writable.');
                            exit();
                        }

                        // replace content.
                        $this->replaceFileContent($targetConverted . DIRECTORY_SEPARATOR . $fileName . '.html');

                        $Progress->advance();
                    }

                    unset($fileExt, $fileName);
                }// endif;
            }// endwhile;
            unset($entry);
        }
        unset($dh);
    }// convert


    /**
     * Replace file content
     * 
     * @param string $filePath
     */
    private function replaceFileContent($filePath = '')
    {
        // open file for read only. prevent read error on w+, or w mode.
        $fileSize = filesize($filePath);

        if ($fileSize <= 0) {
            return;
        }

        $handle = fopen($filePath, 'r');
        $content = fread($handle, filesize($filePath));
        fclose($handle);

        // replace contents
        $content = preg_replace('/href=("|\')([^"]*).php("|\')/iu', 'href=$1$2.html$3', $content);
        $content = preg_replace('/src=("|\')([^"]*).php("|\')/iu', 'src=$1$2.html$3', $content);
        $content = preg_replace('/=("|\')([^"]*).php("|\')/iu', 'src=$1$2.html$3', $content);

        // open file for write only.
        $handle = fopen($filePath, 'w');
        fwrite($handle, $content);
        fclose($handle);

        // clean
        unset($content, $fileSize, $handle);
    }// replaceFileContent


    /**
     * Count total progress.
     * 
     * @param string $targetDir
     * @return array
     */
    private function countTotalProgress($targetDir)
    {
        $iterator = new \GlobIterator('*.php');
        $totalPhpFiles = $iterator->count();// total files that will be converted.
        $totalHtmlFiles = ($totalPhpFiles + 1);// total converted files that will be moved to main folder. +1 for delete _converted-html folder progress.
        $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($targetDir . DIRECTORY_SEPARATOR . 'includes', \RecursiveDirectoryIterator::SKIP_DOTS), 
                \RecursiveIteratorIterator::CHILD_FIRST
        );
        $totalIncludesFiles = iterator_count($files);// total includes files and sub folders.
        $totalPhpMove = (($totalPhpFiles + 1) + $totalIncludesFiles);// total source file (php) that will be moved to _original-source-php folder. +1 for includes folder.
        unset($files, $iterator, $totalIncludesFiles);

        $output['totalPhp'] = $totalPhpFiles;
        $output['totalHtml'] = $totalHtmlFiles;
        $output['totalPhpMove'] = $totalPhpMove;
        $output['total'] = ($totalPhpFiles + $totalHtmlFiles + $totalPhpMove);

        unset($totalHtmlFiles, $totalPhpFiles, $totalPhpMove);
        return $output;
    }// countTotalProgress


    /**
     * Move HTML file to main folder.
     * 
     * @param string $targetDir
     * @param string $targetConverted
     * @param ProgressBar $Progress
     */
    protected function moveHtml($targetDir, $targetConverted, ProgressBar $Progress)
    {
        if (false !== $dh = opendir($targetConverted)) {
            while (false !== $entry = readdir($dh)) {
                if ($entry != '.' && $entry != '..' && is_file($targetConverted . DIRECTORY_SEPARATOR . $entry)) {
                    $fileExp = explode('.', $entry);
                    $fileExt = $fileExp[count($fileExp) - 1];
                    unset($fileExp[count($fileExp) - 1]);
                    $fileName = implode('.', $fileExp);
                    unset($fileExp);

                    if (strtolower($fileExt) == 'html') {
                        rename($targetConverted . DIRECTORY_SEPARATOR . $entry, $targetDir . DIRECTORY_SEPARATOR . $entry);
                        $Progress->advance();
                    }// endif;

                    unset($fileExt, $fileName);
                }// endif;
            }// endwhile;
            unset($entry);
        }
        unset($dh);

        $this->recursiveDelete($targetConverted, $Progress);
    }// moveHtml


    /**
     * Move php source files into source folder.
     * 
     * @param string $targetDir
     * @param string $phpSourceFolder
     * @param ProgressBar $Progress
     */
    protected function movePhp($targetDir, $phpSourceFolder, ProgressBar $Progress)
    {
        $this->recursiveMove($targetDir . DIRECTORY_SEPARATOR . 'includes', $phpSourceFolder . DIRECTORY_SEPARATOR . 'includes', $Progress);
        $this->recursiveDelete($targetDir . DIRECTORY_SEPARATOR . 'includes', $Progress);

        if (false !== $dh = opendir($targetDir)) {
            while (false !== $entry = readdir($dh)) {
                if ($entry != '.' && $entry != '..' && is_file($targetDir . DIRECTORY_SEPARATOR . $entry)) {
                    $fileExp = explode('.', $entry);
                    $fileExt = $fileExp[count($fileExp) - 1];
                    unset($fileExp[count($fileExp) - 1]);
                    $fileName = implode('.', $fileExp);
                    unset($fileExp);

                    if (strtolower($fileExt) == 'php') {
                        rename($targetDir . DIRECTORY_SEPARATOR . $entry, $phpSourceFolder . DIRECTORY_SEPARATOR . $entry);
                        $Progress->advance();
                    }// endif;

                    unset($fileExt, $fileName);
                }// endif;
            }// endwhile;
            unset($entry);
        }
        unset($dh);
    }// movePhp


    /**
     * recursively delete file and folder including itself.
     * 
     * @param string $targetDir
     * @param ProgressBar $Progress
     */
    private function recursiveDelete($targetDir, ProgressBar $Progress)
    {
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
        $dir = opendir($src);

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
    }// recursiveMove


    /**
     * Convert PHP source files into HTML.
     * 
     * Only support .php files that are in the main folder, not included the sub folders.
     * 
     * @param string $targetDir
     * @param InputInterface $Input
     * @param OutputInterface $Output
     */
    public function run($targetDir, InputInterface $Input, OutputInterface $Output)
    {
        $Io = new SymfonyStyle($Input, $Output);

        // create folder for converted files if not exists.
        $targetConverted = $targetDir . DIRECTORY_SEPARATOR . '_converted-html';
        if (!is_dir($targetConverted)) {
            $old = umask(0);
            $mkdirResult = mkdir($targetConverted, 0777, true);
            umask($old);

            if ($mkdirResult !== true) {
                $Io->error('Unable to create folder at ' . $targetConverted);
                unset($mkdirResult, $old);
                return false;
            }
            unset($mkdirResult, $old);
        }

        // create folder for php sources file that will be moved to after success converted.
        $phpSourceFolder = $targetDir . DIRECTORY_SEPARATOR . '_original-source-php';
        if (!is_dir($phpSourceFolder)) {
            $old = umask(0);
            $mkdirResult = mkdir($phpSourceFolder, 0777, true);
            umask($old);

            if ($mkdirResult !== true) {
                $Io->error('Unable to create folder at ' . $phpSourceFolder);
                unset($mkdirResult, $old);
                return false;
            }
            unset($mkdirResult, $old);
        }

        // get total progress.
        $total = $this->countTotalProgress($targetDir);
        if (isset($total['total'])) {
            $totalProgress = $total['total'];
        } else {
            $totalProgress = 0;
        }
        unset($total);

        $Progress = new ProgressBar($Output, $totalProgress);
        unset($totalProgress);
        $Progress->start();

        // convert PHP to HTML & replace content
        $this->convert($targetDir, $targetConverted, $Progress, $Input, $Output);
        // move PHP to _original-source-php folder.
        $this->movePhp($targetDir, $phpSourceFolder, $Progress);
        // move HTML to main folder.
        $this->moveHtml($targetDir, $targetConverted, $Progress);

        $Progress->finish();
        unset($Progress);

        return true;
    }// run


}