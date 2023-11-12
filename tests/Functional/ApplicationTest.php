<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use App\Application;
use App\Exception\ApplicationException;
use App\Kernel;
use Exception;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    private Application $application;

    /**
     * @return void
     * @throws Exception
     */
    public function setUp(): void
    {
        parent::setUp();

        $container = Kernel::createContainer();
        $container->set('parameters.multiplication_table.numbers_count', 3);
        $container->set('parameters.multiplication_table.start_number', 2);

        $this->application = $container->get('app.application');
    }

    /**
     * @return void
     * @throws ApplicationException
     */
    public function testRun(): void
    {
        $expectedOutput = file_get_contents(__DIR__ . '/Resources/app_test_expected_output.txt');
        $this->expectOutputString($expectedOutput);
        $this->application->run();
    }
}
