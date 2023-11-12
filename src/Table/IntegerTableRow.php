<?php

declare(strict_types=1);

namespace App\Table;

class IntegerTableRow
{
    /**
     * @var IntegerTableCell[]
     */
    private array $cells;

    public function __construct()
    {
        $this->cells = [];
    }

    /**
     * @return IntegerTableCell[]
     */
    public function getCells(): array
    {
        return $this->cells;
    }

    public function addCell(IntegerTableCell $cell): self
    {
        $this->cells[] = $cell;

        return $this;
    }

    public function getFormatted(int $paddingLength = 10): string
    {
        $text = '';

        foreach ($this->cells as $cell) {
            $text .= str_pad((string)$cell->getValue(), $paddingLength, ' ', STR_PAD_LEFT);
        }

        return $text;
    }
}
