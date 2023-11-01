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
            '--format' => 'json',
        ];
        $showOutput = new BufferedOutput();
        $this->getApplication()->doRun(new ArrayInput($args), $showOutput);
        $packages = [];
        foreach (json_decode($showOutput->fetch(), true)['installed'] as $package) {
            if ($package['latest-status'] === 'update-possible') {
                $packages[] = $package['name'] . ':~' . $package['latest'];
            }
        }
        if ($packages) {
            $args = [
                'command' => 'require',
                'packages' => $packages,
                '--no-update' => true,
            ];
            $this->getApplication()->run(new ArrayInput($args), $output);
        }
        return 0;
    }
}
