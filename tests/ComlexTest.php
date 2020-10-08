<?php

namespace alxdeex\Math;

use DivisionByZeroError;
use PHPUnit\Framework\TestCase;

/**
 * Тесты для комплексных чисел
 * Class ComlexTest
 * @package alxdeex\Math
 */
class ComlexTest extends TestCase
{

    /**
     * Тест сложения
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expect)
    {
        $addends = $a->add($b);
        $this->assertEquals($expect, $addends);
    }

    public function additionProvider()
    {
        return [
            [
                Complex::algebraic(5, -6),
                Complex::algebraic(-3, 2),
                Complex::algebraic(2, -4),
            ],
        ];
    }

    /**
     * Тест вычитания
     * @dataProvider subtractionProvider
     */
    public function testSubtract($a, $b, $expected)
    {
        $difference = $a->subtract($b);
        $this->assertEquals($expected, $difference);
    }

    public function subtractionProvider()
    {
        return [
            [
                Complex::algebraic(5, -6),
                Complex::algebraic(-3, 2),
                Complex::algebraic(8, -8),
            ],
        ];
    }

    /**
     * Тест умножения
     * @dataProvider multiplierProvider
     */
    public function testMultiply($a, $b, $expected)
    {
        $product = $a->multiply($b);
        $this->assertEquals($expected, $product);
    }

    public function multiplierProvider()
    {
        return [
            [
                Complex::algebraic(2, 3),
                Complex::algebraic(-1, 1),
                Complex::algebraic(-5, -1),
            ],
        ];
    }

    /**
     * Тест деления
     * @dataProvider divisionProvider
     */
    public function testDivide($a, $b, $expected)
    {
        $quotient = $a->divide($b);
        $this->assertEquals($expected, $quotient);
    }

    public function divisionProvider()
    {
        return [
            [
                Complex::algebraic(-2, 1),
                Complex::algebraic(1, -1),
                Complex::algebraic(-1.5, -0.5),
            ],
        ];
    }

    /**
     * Тест преобразования к строке
     * @dataProvider stringifyProvider
     */
    public function testToString($a, $expected)
    {
        $this->assertEquals($expected, (string)$a);
    }

    public function stringifyProvider()
    {
        return [
            [Complex::algebraic(1, 2), '1 + 2i'],
            [Complex::algebraic(0, 2), '2i'],
            [Complex::algebraic(1, 0), '1'],
            [Complex::algebraic(0, 0), '0'],
        ];
    }

    /**
     * Тест деления на нуль
     */
    public function testDivideZero()
    {
        $a = Complex::algebraic(123, 123);
        $b = Complex::algebraic(0, 0);
        $this->expectException(DivisionByZeroError::class);
        $a->divide($b);
    }
}
