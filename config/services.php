<?php

declare(strict_types=1);

use App\Application;
use App\Generator\PrimeNumbersGenerator;
use App\Output\ConsoleOutput;
use App\Table\IntegerMultiplicationTable;
use function DI\create;
use function DI\get;

return [
    // Prime numbers generator
    'app.generator.prime_numbers' => create(PrimeNumbersGenerator::class),

    // Prime numbers multiplication table
    'app.table.prime_numbers_multiplication_table' => create(IntegerMultiplicationTable::class)
        ->constructor(
            get('app.generator.prime_numbers'),
            get('parameters.prime_numbers_multiplication_table.limit'),
            get('parameters.prime_numbers_multiplication_table.start_number'),
        )
    ,

    // Output
    'app.output.console' => create(ConsoleOutput::class),

    // Application
    'app.application' => create(Application::class)
        ->constructor(
            get('app.table.prime_numbers_multiplication_table'),
            get('app.output.console'),
        )
    ,
];
