<?php
/**
 * @license http://opensource.org/licenses/MIT MIT
 */


namespace App\SubApp\Modify;

use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DeleteHtml
{


    /**
     * Count total progress.
     * 
     * @param string $targetDir
     * @param array $exceptFileNames
     * @return integer
     */
    private function countTotalProgress($targetDir, array $exceptFileNames = [])
    {
        $searchArray = array_combine(array_map('strtolower', $exceptFileNames), $exceptFileNames);
        $countHtml = 0;

        if (false !== $dh = opendir($targetDir)) {
            while (false !== $entry = readdir($dh)) {
                if (strtolower(substr($entry, -5)) === '.html' && !isset($searchArray[strtolower($entry)])) {
                    if (is_writable($targetDir . DIRECTORY_SEPARATOR . $entry)) {
                        $countHtml++;
                    }
                }
            }// endwhile;
            unset($entry);
            closedir($dh);
        }

        unset($searchArray);
        return $countHtml;
    }// countTotalProgress


    /**
     * Delete all .html files except the exception list.
     * 
     * @param type $targetDir
     * @param \App\SubApp\Modify\InputInterface $Input
     * @param \App\SubApp\Modify\OutputInterface $Output
     * @param array $exceptFileNames
     * @return boolean Return true on success, false for otherwise.
     */
    public function run($targetDir, InputInterface $Input, OutputInterface $Output, array $exceptFileNames = [])
    {
        if (!is_dir($targetDir)) {
            return false;
        }

        // in array case insensitive
        // https://stackoverflow.com/a/2166522/128761
        $searchArray = array_combine(array_map('strtolower', $exceptFileNames), $exceptFileNames);

        
        $Progress = new ProgressBar($Output, $this->countTotalProgress($targetDir, $exceptFileNames));
        $Progress->start();

        if (false !== $dh = opendir($targetDir)) {
            while (false !== $entry = readdir($dh)) {
                if (strtolower(substr($entry, -5)) === '.html' && !isset($searchArray[strtolower($entry)])) {
                    if (is_writable($targetDir . DIRECTORY_SEPARATOR . $entry)) {
                        unlink($targetDir . DIRECTORY_SEPARATOR . $entry);
                        $Progress->advance();
                    }
                }
            }// endwhile;
            unset($entry);
            closedir($dh);
        }

        unset($dh, $searchArray);

        $Progress->finish();
        unset($Progress);

        return true;
    }// run


}