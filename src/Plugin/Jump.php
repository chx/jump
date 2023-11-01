<?php

namespace chx\Composer\Plugin;

use chx\Composer\JumpCommandProvider;
use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\Capability\CommandProvider;
use Composer\Plugin\PluginInterface;

class Jump implements PluginInterface
{

    public function activate(Composer $composer, IOInterface $io)
    {
    }

    public function deactivate(Composer $composer, IOInterface $io)
    {
    }

    public function uninstall(Composer $composer, IOInterface $io)
    {
    }

    public function getCapabilities()
    {
        return [
        CommandProvider::class => JumpCommandProvider::class,
        ];
    }

}
