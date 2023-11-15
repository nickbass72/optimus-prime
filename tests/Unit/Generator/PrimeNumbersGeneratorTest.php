<?php

declare(strict_types=1);

namespace App\Tests\Unit\Generator;

use App\Exception\NumbersGeneratorException;
use App\Generator\PrimeNumbersGenerator;
use App\Generator\NumbersGeneratorInterface;
use PHPUnit\Framework\TestCase;

class PrimeNumbersGeneratorTest extends TestCase
{
    private NumbersGeneratorInterface $generator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->generator = new PrimeNumbersGenerator();
    }

    /**
     * @dataProvider generateProvider
     * @param int $startNumber
     * @param int[] $expectedResult
     * @return void
     */
    public function testGenerate(int $startNumber, array $expectedResult): void
    {
        $result = $this->generator->generate(10, $startNumber);
        $this->assertEquals($expectedResult, $result);
    }

    public static function generateProvider(): array
    {
        return [
            'test first 10 starting at 1' => [
                'startFrom' => 1,
                'expectedResult' => [2, 3, 5, 7, 11, 13, 17, 19, 23, 29],
            ],
            'test first 10 starting at 5' => [
                'startFrom' => 5,
                'expectedResult' => [5, 7, 11, 13, 17, 19, 23, 29, 31, 37],
            ],
            'test first 10 starting at 100' => [
                'startFrom' => 100,
                'expectedResult' => [101, 103, 107, 109, 113, 127, 131, 137, 139, 149],
            ],
        ];
    }

    public function testGenerateError(): void
    {
        $this->expectException(NumbersGeneratorException::class);
        $this->generator->generate(10, -1);
    }
}
