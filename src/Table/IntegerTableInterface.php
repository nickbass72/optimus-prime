<?php

declare(strict_types=1);

namespace App\Table;

interface IntegerTableInterface
{
    public function getLimit(): int;
    public function getStartNumber(): int;
    public function getRowsIterator(): iterable;
}
