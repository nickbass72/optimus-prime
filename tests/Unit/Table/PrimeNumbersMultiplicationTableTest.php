<?php

declare(strict_types=1);

namespace App\Tests\Unit\Table;

use App\Generator\NumbersGeneratorInterface;
use App\Table\IntegerTableCell;
use App\Table\IntegerTableRow;
use App\Table\PrimeNumbersMultiplicationTable;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class PrimeNumbersMultiplicationTableTest extends TestCase
{
    /**
     * @dataProvider getRowsProvider
     * @param array $primeNumbers
     * @param array $expectedResult
     * @return void
     * @throws Exception
     */
    public function testGetRows(array $primeNumbers, array $expectedResult): void
    {
        $generator = $this->createMock(NumbersGeneratorInterface::class);
        $generator
            ->method('generate')
            ->willReturn($primeNumbers)
        ;

        $startNumber = reset($primeNumbers);
        $table = new PrimeNumbersMultiplicationTable(
            $generator,
            count($primeNumbers),
            $startNumber !== false ? $startNumber : null
        );

        $result = [];
        foreach ($table->getRowsIterator() as $row) {
            $result[] = $row;
        }

        $this->assertEquals($expectedResult, $result);
    }

    public static function getRowsProvider(): array
    {
        return [
            'test without data' => [
                'primeNumbers' => [],
                'expectedResult' => [
                    (new IntegerTableRow())
                        ->addCell(new IntegerTableCell(null))
                    ,
                ],
            ],
            'test with data' => [
                'primeNumbers' => [2, 3, 5],
                'expectedResult' => [
                    (new IntegerTableRow())
                        ->addCell(new IntegerTableCell(null))
                        ->addCell(new IntegerTableCell(2))
                        ->addCell(new IntegerTableCell(3))
                        ->addCell(new IntegerTableCell(5))
                    ,
                    (new IntegerTableRow())
                        ->addCell(new IntegerTableCell(2))
                        ->addCell(new IntegerTableCell(4))
                        ->addCell(new IntegerTableCell(6))
                        ->addCell(new IntegerTableCell(10))
                    ,
                    (new IntegerTableRow())
                        ->addCell(new IntegerTableCell(3))
                        ->addCell(new IntegerTableCell(6))
                        ->addCell(new IntegerTableCell(9))
                        ->addCell(new IntegerTableCell(15))
                    ,
                    (new IntegerTableRow())
                        ->addCell(new IntegerTableCell(5))
                        ->addCell(new IntegerTableCell(10))
                        ->addCell(new IntegerTableCell(15))
                        ->addCell(new IntegerTableCell(25))
                    ,
                ],
            ],
        ];
    }
}
