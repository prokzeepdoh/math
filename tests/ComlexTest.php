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
     */
    public function testAdd()
    {
        $a  = new Complex(5, -6);
        $b  = new Complex(-3, 2);
        $addends = $a->add($b);
        $this->assertEquals(new Complex(2, -4), $addends);
    }

    /**
     * Тест вычитания
     */
    public function testSubtract()
    {
        $a  = new Complex(5, -6);
        $b  = new Complex(-3, 2);
        $difference = $a->subtract($b);
        $this->assertEquals(new Complex(8, -8), $difference);
    }

    /**
     * Тест умножения
     */
    public function testMultiply()
    {
        $a  = new Complex(2, 3);
        $b  = new Complex(-1, 1);
        $product = $a->multiply($b);
        $this->assertEquals(new Complex(-5, -1), $product);
    }

    /**
     * Тест деления
     */
    public function testDivide()
    {
        $a  = new Complex(-2, 1);
        $b  = new Complex(1, -1);
        $quotient = $a->divide($b);
        $this->assertEquals(new Complex(-1.5, -0.5), $quotient);
    }

    /**
     * Тест преобразования к строке
     */
    public function testToString()
    {
        $this->assertEquals('1 + 2i', (string)new Complex(1, 2));
        $this->assertEquals('2i', (string)new Complex(0, 2));
        $this->assertEquals('1', (string)new Complex(1, 0));
        $this->assertEquals('0', (string)new Complex(0, 0));
    }

    /**
     * Тест деления на нуль
     */
    public function testDivideZero()
    {
        $a = new Complex(123, 123);
        $b = new Complex(0, 0);
        $this->expectException(DivisionByZeroError::class);
        $a->divide($b);
    }
}
