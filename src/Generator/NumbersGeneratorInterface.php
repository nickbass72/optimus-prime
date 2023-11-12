<?php

declare(strict_types=1);

namespace App\Generator;

interface NumbersGeneratorInterface
{
    public function generate(int $limit, ?int $startNumber): array;
}
