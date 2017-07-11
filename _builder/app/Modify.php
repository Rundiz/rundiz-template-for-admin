<?php
/**
 * @license http://opensource.org/licenses/MIT MIT
 */


namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class Modify extends Command
{


    protected function configure()
    {
        $this->setName('modify')
            ->setDescription('Make current project folder for ready to modify.')
            ->setHelp(
                'Run this command will make project folder ready for modification. If you are just clone this repository and want to start modify the code then use this command.'."\n".
                'Example: php _builder/build.php modify'
            );
    }// configure


    protected function execute(InputInterface $Input, OutputInterface $Output)
    {
        $Io = new SymfonyStyle($Input, $Output);
        $targetDir = dirname(dirname(__DIR__));

        // delete all .html files except xhr-page.html file.
        $Io->title('Delete built HTML files');
        $DeleteHtml = new SubApp\Modify\DeleteHtml();
        $result = $DeleteHtml->run($targetDir, $Input, $Output, ['xhr-page.html']);
        unset($DeleteHtml);
        $Output->writeln('');
        $Output->writeln('');

        if (isset($result) && $result === true) {
            // move everything inside _original-source-php folder into project's root folder.
            $Io->title('Restore PHP to project\'s root folder');
            $RestorePhp = new SubApp\Modify\RestorePhp();
            $result2 = $RestorePhp->run($targetDir, $Input, $Output);
            unset($RestorePhp);
        } else {
            $Io->error('Failed to delete built HTML files.');
        }
        unset($result);
        $Output->writeln('');
        $Output->writeln('');

        if (isset($result2) && $result2 === true) {
            $Io->success('Completed, you are ready to make changes to the project.');
        } else {
            $Io->error('Failed to restore PHP files.');
        }

        unset($result2, $targetDir);
    }// execute


}