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
        $a  = new Comlex(5, -6);
        $b  = new Comlex(-3, 2);
        $addends = $a->add($b);
        $this->assertEquals(new Comlex(2, -4), $addends);
    }

    /**
     * Тест вычитания
     */
    public function testSubtract()
    {
        $a  = new Comlex(5, -6);
        $b  = new Comlex(-3, 2);
        $difference = $a->subtract($b);
        $this->assertEquals(new Comlex(8, -8), $difference);
    }

    /**
     * Тест умножения
     */
    public function testMultiply()
    {
        $a  = new Comlex(2, 3);
        $b  = new Comlex(-1, 1);
        $product = $a->multiply($b);
        $this->assertEquals(new Comlex(-5, -1), $product);
    }

    /**
     * Тест деления
     */
    public function testDivide()
    {
        $a  = new Comlex(-2, 1);
        $b  = new Comlex(1, -1);
        $quotient = $a->divide($b);
        $this->assertEquals(new Comlex(-1.5, -0.5), $quotient);
    }

    /**
     * Тест преобразования к строке
     */
    public function testToString()
    {
        $this->assertEquals('1 + 2i', (string)new Comlex(1, 2));
        $this->assertEquals('2i', (string)new Comlex(0, 2));
        $this->assertEquals('1', (string)new Comlex(1, 0));
        $this->assertEquals('0', (string)new Comlex(0, 0));
    }

    /**
     * Тест деления на нуль
     */
    public function testDivideZero()
    {
        $a = new Comlex(123, 123);
        $b = new Comlex(0, 0);
        $this->expectException(DivisionByZeroError::class);
        $a->divide($b);
    }
}
