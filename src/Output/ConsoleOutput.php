<?php

declare(strict_types=1);

namespace App\Output;

use App\Table\IntegerTableRow;

class ConsoleOutput implements OutputInterface
{
    public function outputLine(string $content): void
    {
        echo $content . PHP_EOL;
    }
}
