<?php

namespace chx\Composer;

use Composer\Command\BaseCommand;
use Composer\Factory;
use Composer\Package\Version\VersionParser;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\OutputInterface;

class JumpCommand extends BaseCommand
{

    protected function configure()
    {
        $this->setName('jump');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $args = [
            'command' => 'show',
            '--latest' => true,
            '--major-only' => true,
        '--direct' => true,
        '--format' => 'json'
        ];
        $input = new ArrayInput($args);
        $output = new BufferedOutput();
        $this->getApplication()->run($input, $output);
        $this->getIO()->write($output->fetch());

    }


}
