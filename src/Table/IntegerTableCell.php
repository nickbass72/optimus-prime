<?php

declare(strict_types=1);

namespace App\Table;

class IntegerTableCell
{
    private ?int $value;

    public  function __construct(?int $value = null)
    {
        $this->value = $value;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }
}
