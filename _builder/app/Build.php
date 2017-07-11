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

class Build extends Command
{


    protected $confirmed = false;


    protected $fullTargetPath;


    protected $isSelf = false;


    protected function configure()
    {
        $this->setName('build')
            ->setDescription('Build the source files for ready to commit.')
            ->setHelp(
                'Run this command to copy and build source files into exists repository folder where it is ready to commit.'."\n".
                'Example: php _builder/build.php build ../your-repo-folder'."\n".
                'php _builder/builder.php build self'
            );

        $this->addArgument('target', InputArgument::REQUIRED, 'Set the target repository folder that files will be copied to. Use full path or relative path. You can set this argument to "self" for build the source files here.');
    }// configure


    protected function interact(InputInterface $Input, OutputInterface $Output)
    {
        if ($Input->getArgument('target') === 'self') {
            $this->fullTargetPath = realpath(dirname(dirname(__DIR__)));
            $this->isSelf = true;
            $this->confirmed = true;
            return;
        }

        $this->fullTargetPath = realpath($Input->getArgument('target'));

        $Io = new SymfonyStyle($Input, $Output);

        if (empty($Input->getArgument('target')) || $this->fullTargetPath === false) {
            $Io->error('Unable to locate target folder, please check your target argument and try again.');
            unset($Io);
            return;
        }

        $Io->block('Target: ' . $this->fullTargetPath);
        $answer = $Io->confirm('Is this the correct target location?', false);

        if ($answer !== true) {
            return;
        } else {
            $this->confirmed = true;
        }
    }// interact


    protected function execute(InputInterface $Input, OutputInterface $Output)
    {
        if ($this->confirmed !== true) {
            return;
        }

        $Io = new SymfonyStyle($Input, $Output);

        if ($this->isSelf === false) {
            // clear target folder. --------------------------------------------
            $Io->title('Clear target folder');
            $ClearTarget = new SubApp\ClearTarget();
            $result = $ClearTarget->run($this->fullTargetPath, $Input, $Output);
            unset($ClearTarget);
            $Output->writeln('');
            $Output->writeln('');

            if (isset($result) && $result === true) {
                // copy source to target. -------------------------------------
                $Io->title('Copy source folder to target');
                $CopySource = new SubApp\CopySource();
                $result2 = $CopySource->run($this->fullTargetPath, $Input, $Output);
                unset($CopySource);
            } else {
                $Io->error('Failed to clear target folder.');
            }
            unset($result);
            $Output->writeln('');
            $Output->writeln('');
        } else {
            $result2 = true;
        }

        if (isset($result2) && $result2 === true) {
            // convert php source file to html ---------------------------
            $Io->title('Convert PHP source files to HTML');
            $ConvertPhp = new SubApp\ConvertPhp();
            $result3 = $ConvertPhp->run($this->fullTargetPath, $Input, $Output);
            unset($ConvertPhp);
        } elseif (isset($result2)) {
            $Io->error('Failed to copy source folder.');
        }
        unset($result2);
        $Output->writeln('');
        $Output->writeln('');

        if (isset($result3) && $result3 === true) {
            // compile scss to css ----------------------------------------
            $Io->title('Compile SCSS files to CSS');
            $CompileScss = new SubApp\CompileScss();
            $result4 = $CompileScss->run($this->fullTargetPath, $Input, $Output);
            unset($CompileScss);
        } elseif (isset($result3)) {
            $Io->error('Failed to convert PHP to HTML files.');
        }
        unset($result3);
        $Output->writeln('');
        $Output->writeln('');

        if (isset($result4) && $result4 === true) {
            $Io->success('Completed, you are ready to commit the repository.');
        } else {
            $Io->error('Failed to compile SCSS.');
        }
        unset($result4);
    }// execute


}