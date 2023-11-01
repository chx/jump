<?php

namespace chx\Composer;

use Composer\Plugin\Capability\CommandProvider;

class JumpCommandProvider implements CommandProvider
{

    public function getCommands()
    {
        return [new JumpCommand()];
    }

}
