<?php

declare(strict_types=1);

namespace App\Table;

use App\Generator\NumbersGeneratorInterface;

class IntegerMultiplicationTable implements IntegerTableInterface
{
    private NumbersGeneratorInterface $primeNumbersGenerator;
    private int $limit;
    private int $startNumber;
    /**
     * @var int[]
     */
    private array $numbers;

    public function __construct(NumbersGeneratorInterface $primeNumbersGenerator, int $limit, ?int $startNumber)
    {
        $this->primeNumbersGenerator = $primeNumbersGenerator;
        $this->limit = $limit;
        $this->startNumber = $startNumber ?: 2;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getStartNumber(): int
    {
        return $this->startNumber;
    }

    /**
     * @return IntegerTableRow[]
     */
    public function getRowsIterator(): iterable
    {
        if (!isset($this->numbers)) {
            $this->numbers = $this->primeNumbersGenerator->generate($this->limit, $this->startNumber);
        }

        $tableRow = new IntegerTableRow();
        $tableRow->addCell(new IntegerTableCell());
        foreach ($this->numbers as $number) {
            $tableRow->addCell(new IntegerTableCell($number));
        }

        yield $tableRow;

        foreach ($this->numbers as $rowNumber) {
            $tableRow = new IntegerTableRow();
            $tableRow->addCell(new IntegerTableCell($rowNumber));

            foreach ($this->numbers as $colNumber) {
                $tableRow->addCell(new IntegerTableCell($rowNumber * $colNumber));
            }

            yield $tableRow;
        }
    }
}
