<?php

declare(strict_types=1);

use App\Application;
use App\Generator\PrimeNumbersGenerator;
use App\Output\ConsoleOutput;
use App\Table\PrimeNumbersMultiplicationTable;
use function DI\create;
use function DI\get;

return [
    // Prime numbers generator
    'app.prime_numbers.generator' => create(PrimeNumbersGenerator::class),

    // Multiplication table
    'app.prime_numbers.multiplication_table' => create(PrimeNumbersMultiplicationTable::class)
        ->constructor(
            get('app.prime_numbers.generator'),
            get('parameters.multiplication_table.numbers_count'),
            get('parameters.multiplication_table.start_number'),
        )
    ,

    // Output
    'app.output.console' => create(ConsoleOutput::class),

    // Application
    'app.application' => create(Application::class)
        ->constructor(
            get('app.prime_numbers.multiplication_table'),
            get('app.output.console'),
        )
    ,
];
