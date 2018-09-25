<?php
/**
 * @license http://opensource.org/licenses/MIT MIT
 */


namespace App\SubApp\Build;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CompileScss
{


    /**
     * Cleanup css folder that matched scss folder.
     * 
     * @param string $scssFolder
     * @param string $cssFolder
     * @return boolean
     */
    protected function cleanupCssFolder($scssFolder, $cssFolder)
    {
        $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($scssFolder, \RecursiveDirectoryIterator::SKIP_DOTS), 
                \RecursiveIteratorIterator::CHILD_FIRST
        );

        if (is_array($files) || is_object($files)) {
            foreach ($files as $fileinfo) {
                if (stristr($fileinfo->getFileName(), '_') === false && $fileinfo->isFile()) {
                    // if found scss file that is not included file.
                    $fileName = $fileinfo->getBasename('.' . $fileinfo->getExtension());
                    $relativeParentFolder = str_replace($scssFolder, '', $fileinfo->getPath());// this value always prepend with slash or back slash if there is value but not append with slash or back slash.
                    $foundFileNotCompileBySass = false;

                    if (is_dir($cssFolder . $relativeParentFolder)) {
                        if (false !== $dh = opendir($cssFolder . $relativeParentFolder)) {
                            while (false !== $entry = readdir($dh)) {
                                if ($entry != '.' && $entry != '..') {
                                    if (is_file($cssFolder . $relativeParentFolder . DIRECTORY_SEPARATOR . $entry)) {
                                        // if it is a file, not a folder.
                                        $okfiles = [
                                            $fileName . '.css',
                                            $fileName . '.css.map',
                                            $fileName . '.min.css',
                                            $fileName . '.min.css.map',
                                        ];
                                        if (!in_array($entry, $okfiles)) {
                                            $foundFileNotCompileBySass = true;
                                            unset($entry, $okfiles);
                                            break;
                                        }
                                        unset($okfiles);
                                    } else {
                                        // found subfolder in here, do not delete this folder.
                                        $foundFileNotCompileBySass = true;
                                        unset($entry);
                                        break;
                                    }
                                }// endif;
                            }// endwhile;
                            unset($entry);
                            closedir($dh);
                        } // endif;
                        unset($dh);
                    }

                    if ($foundFileNotCompileBySass === false) {
                        $this->recursiveDelete($cssFolder . $relativeParentFolder, null);
                        $this->writeLog('recursiveDelete(' . $cssFolder . $relativeParentFolder . ')');
                    }

                    unset($fileName, $foundFileNotCompileBySass, $relativeParentFolder);
                }
            }// endforeach;
            unset($fileinfo);
        }

        unset($files);

        return true;
    }// cleanupCssFolder


    /**
     * Count scss files
     * 
     * @param string $scssFolder
     * @return integer
     */
    private function countFiles($scssFolder)
    {
        if (!is_dir($scssFolder)) {
            return 0;
        }

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
     * @return integer
     */
    private function countSassCache($sassCache)
    {
        if (!is_dir($sassCache)) {
            return 0;
        }

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
    private function recursiveDelete($targetDir, ProgressBar $Progress = null)
    {
        if (!is_dir($targetDir)) {
            return;
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

                    if ($Progress != null) {
                        $Progress->advance();
                    }
                }
            }// endforeach;
        }

        rmdir($targetDir);
        if ($Progress != null) {
            $Progress->advance();
        }
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

        $cleanup = $this->cleanupCssFolder($scssFolder, $cssFolder);

        if (isset($cleanup) && $cleanup === true) {
            $files = new \RecursiveIteratorIterator(
                    new \RecursiveDirectoryIterator($scssFolder, \RecursiveDirectoryIterator::SKIP_DOTS), 
                    \RecursiveIteratorIterator::CHILD_FIRST
            );

            $Progress = new ProgressBar($Output, $this->countFiles($scssFolder));
            $Progress->start();
            $Io = new SymfonyStyle($Input, $Output);

            if (is_array($files) || is_object($files)) {
                foreach ($files as $fileinfo) {
                    if (stristr($fileinfo->getFileName(), '_') === false && $fileinfo->isFile()) {
                        // if found scss file that is not included file.
                        $fileExt = $fileinfo->getExtension();
                        $fileName = $fileinfo->getBasename('.' . $fileinfo->getExtension());

                        if (strtolower($fileExt) == 'scss' || strtolower($fileExt) == 'sass') {
                            $relativeParentFolder = str_replace($scssFolder, '', $fileinfo->getPath());// this value always prepend with slash or back slash if there is value but not append with slash or back slash.

                            if ($relativeParentFolder != null && !is_dir($cssFolder . $relativeParentFolder)) {
                                // if no target folder in css, create them.
                                $old = umask(0);
                                @mkdir($cssFolder . $relativeParentFolder, 0777, true);
                                $this->writeLog('mkdir(' . $cssFolder . $relativeParentFolder . ')');
                                umask($old);
                                unset($old);
                            }

                            // compile .scss to .css
                            exec(
                                'sass'
                                    . ' ' . $fileinfo->getRealPath() . ' ' . $cssFolder . $relativeParentFolder . DIRECTORY_SEPARATOR . $fileName . '.css'
                                    . ' --style="expanded"'
                            );
                            $this->writeLog(
                                'sass'
                                    . ' ' . $fileinfo->getRealPath() . ' ' . $cssFolder . $relativeParentFolder . DIRECTORY_SEPARATOR . $fileName . '.css'
                                    . ' --style="expanded"'
                            );

                            // also compile minified .css
                            exec(
                                'sass'
                                    . ' ' . $fileinfo->getRealPath() . ' ' . $cssFolder . $relativeParentFolder . DIRECTORY_SEPARATOR . $fileName . '.min.css'
                                    . ' --style="compressed"'
                            );

                            $Progress->advance();

                            unset($relativeParentFolder);
                        }// endif file extension is scss
                        unset($fileExt, $fileName);
                    }
                }// endforeach;
                unset($fileinfo);
            }

            $Progress->finish();
            unset($Progress);

            // delete the ".sass-cache" folder.
            $Io->block('Clearing .sass-cache folder.');
            $this->recursiveDelete($targetDir . DIRECTORY_SEPARATOR . '.sass-cache', null);
            $Io->block('Clear cache completed.');
            $this->writeLog('Finished ---------------------------');

            return true;
        }
    }// run


    /**
     * Write log for debugging.
     * 
     * @param type $content
     */
    private function writeLog($content)
    {
        //file_put_contents('build-compilescss.log', $content."\r\n", FILE_APPEND);
    }// writeLog


}