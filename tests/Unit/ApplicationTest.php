<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Application;
use App\Exception\ApplicationException;
use App\Exception\NumbersGeneratorException;
use App\Output\OutputInterface;
use App\Table\IntegerTableInterface;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    private IntegerTableInterface|MockObject $table;
    private Application $application;

    /**
     * @return void
     * @throws Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->table = $this->createMock(IntegerTableInterface::class);
        $this->application = new Application($this->table, $this->createMock(OutputInterface::class));
    }

    /**
     * @return void
     * @throws ApplicationException
     */
    public function testRun(): void
    {
        $this->expectNotToPerformAssertions();
        $this->application->run();
    }

    /**
     * @return void
     * @throws ApplicationException
     */
    public function testRunError(): void
    {
        $this->table
            ->method('getRowsIterator')
            ->willThrowException(new NumbersGeneratorException())
        ;

        $this->expectException(ApplicationException::class);
        $this->application->run();
    }
}
