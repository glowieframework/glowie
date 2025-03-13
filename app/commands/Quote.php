<?php

namespace Glowie\Commands;

use Glowie\Core\CLI\Command;

/**
 * Inspirational CLI command for Glowie application.
 * @category Command
 * @package glowieframework/glowie
 * @author Glowie
 * @copyright Copyright (c) Glowie
 * @license MIT
 * @link https://glowie.gabrielsilva.dev.br
 */
class Quote extends Command
{

    /**
     * The command script.
     */
    public function run()
    {
        // Gets a random quote
        $quote = collect([
            '"Computers are fast; programmers keep it slow."',
            '"Programming can be fun, and so can cryptography; however, they should not be combined."',
            '"When we had no computers, we had no programming problems either."',
            '"There is no Ctrl-Z in life."',
            '"Whitespace is never white."',
            '"When all else fails... reboot."',
            '"The computer was born to solve problems that did not exist before."',
            '"There\'s no place like 127.0.0.1."',
            '"It works on my machine."',
            '"A good programmer is someone who always looks both ways before crossing a one-way street."',
            '"Software and cathedrals are much the same — first we build them, then we pray."',
            '"It\'s not a bug – it\'s an undocumented feature."'
        ])->random();

        // Prints the quote in the console
        $this->info($quote);
    }
}
