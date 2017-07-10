<?php
/**
 * @license http://opensource.org/licenses/MIT MIT
 */


namespace App\SubApp;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CompileScss
{


    /**
     * Count files
     * 
     * @param string $scssFolder
     */
    private function countFiles($scssFolder)
    {
        $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($scssFolder, \RecursiveDirectoryIterator::SKIP_DOTS), 
                \RecursiveIteratorIterator::CHILD_FIRST
        );
        $count = 0;

        if (is_array($files) || is_object($files)) {
            foreach ($files as $fileinfo) {
                if (stristr($fileinfo->getFileName(), '_') === false && $fileinfo->isFile()) {
                    $count++;
                }
            }// endforeach;
        }

        unset($files);
        return $count;
    }// countFiles


    /**
     * Count sass cache.
     * 
     * @param string $sassCache
     */
    private function countSassCache($sassCache)
    {
        $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($sassCache, \RecursiveDirectoryIterator::SKIP_DOTS), 
                \RecursiveIteratorIterator::CHILD_FIRST
        );

        return iterator_count($files);
    }// countSassCache


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
     * Compile scss to css files.
     * 
     * @param string $targetDir
     * @param InputInterface $Input
     * @param OutputInterface $Output
     * @return boolean Return true on success.
     */
    public function run($targetDir, InputInterface $Input, OutputInterface $Output)
    {
        $scssFolder = $targetDir . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'scss';
        $cssFolder = $targetDir . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'css';

        $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($scssFolder, \RecursiveDirectoryIterator::SKIP_DOTS), 
                \RecursiveIteratorIterator::CHILD_FIRST
        );

        $Progress = new ProgressBar($Output, ($this->countFiles($scssFolder) + $this->countSassCache($targetDir . DIRECTORY_SEPARATOR . '.sass-cache')));
        $Progress->start();

        if (is_array($files) || is_object($files)) {
            foreach ($files as $fileinfo) {
                if (stristr($fileinfo->getFileName(), '_') === false && $fileinfo->isFile()) {
                    $fileExt = $fileinfo->getExtension();
                    $fileName = $fileinfo->getBasename('.' . $fileinfo->getExtension());

                    $relativeParentFolder = str_replace($scssFolder, '', $fileinfo->getPath());// always prepend with slash or back slash if there is value but not append with slash or back slash.

                    if ($relativeParentFolder != null && !is_dir($cssFolder . $relativeParentFolder)) {
                        // if no target folder in css, create them.
                        $old = umask(0);
                        @mkdir($cssFolder . $relativeParentFolder, 0777, true);
                        umask($old);
                        unset($old);
                    }

                    // compile .scss to .css
                    exec(
                        'sass'
                            . ' ' . $fileinfo->getRealPath() . ' ' . $cssFolder . $relativeParentFolder . DIRECTORY_SEPARATOR . $fileName . '.css'
                            . ' --style="expanded"'
                            . ' --force'
                    );

                    // also compile minified .css
                    exec(
                        'sass'
                            . ' ' . $fileinfo->getRealPath() . ' ' . $cssFolder . $relativeParentFolder . DIRECTORY_SEPARATOR . $fileName . '.min.css'
                            . ' --style="compressed"'
                            . ' --force'
                    );

                    $Progress->advance();

                    unset($fileExt, $fileName);
                }
            }// endforeach;
        }

        // delete the ".sass-cache" folder.
        $this->recursiveDelete($targetDir . DIRECTORY_SEPARATOR . '.sass-cache', $Progress);

        $Progress->finish();
        unset($Progress);

        return true;
    }// run


}