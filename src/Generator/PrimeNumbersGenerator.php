<?php

declare(strict_types=1);

namespace App\Generator;

use App\Exception\PrimeNumbersGeneratorException;

class PrimeNumbersGenerator implements NumbersGeneratorInterface
{
    /**
     * @param int $limit
     * @param int|null $startNumber
     * @return array
     * @throws PrimeNumbersGeneratorException
     */
    public function generate(int $limit, ?int $startNumber = 2): array
    {
        if ($startNumber < 0) {
            throw new PrimeNumbersGeneratorException('Starting number cannot be negative number');
        }

        $count = 0;
        $number = $startNumber >= 2 ? $startNumber : 2;
        $result = [];

        while ($count < $limit)
        {
            $div_count = 0;

            for ($i = 1; $i <= $number; $i++) {
                if (($number % $i) === 0) {
                    $div_count++;
                }

                if ($div_count > 2) {
                    break;
                }
            }

            if ($div_count < 3) {
                $result[] = $number;
                $count++;
            }

            $number++;
        }

        return $result;
    }
}
