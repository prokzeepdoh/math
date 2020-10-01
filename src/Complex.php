<?php

namespace alxdeex\Math;

use DivisionByZeroError;

/**
 * Комплексные числа
 * Class Comlex
 * @package alxdeex\Math
 */
class Complex
{
    /**
     * @var float
     */
    private float $real;

    /**
     * @var float
     */
    private float $imaginary;

    /**
     * Comlex constructor.
     * @param float $real
     * @param float $imaginary
     */
    public function __construct(float $real, float $imaginary)
    {
        $this->real = $real;
        $this->imaginary = $imaginary;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        if ($this->real) {
            $result = (string)$this->real;
        } else {
            $result = '';
        }

        if ($this->imaginary) {
            if ($this->real) {
                $result .= ($this->imaginary > 0 ? ' + ' : ' - ');
            }
            $result .= abs($this->imaginary) . 'i';
        }

        if (!$this->real && !$this->imaginary) {
            $result = '0';
        }

        return $result;

    }

    /**
     * Сложение
     * @param Complex $b
     * @return Complex
     */
    public function add(Complex $b): Complex
    {
        $new_real = $this->real + $b->getReal();
        $new_imaginary = $this->imaginary + $b->getImaginary();

        return new self($new_real, $new_imaginary);
    }

    /**
     * Вычитание
     * @param Complex $b
     * @return Complex
     */
    public function subtract(Complex $b): Complex
    {
        $new_real = $this->real - $b->getReal();
        $new_imaginary = $this->imaginary - $b->getImaginary();

        return new self($new_real, $new_imaginary);
    }

    /**
     * Умножение
     * @param Complex $b
     * @return Complex
     */
    public function multiply(Complex $b): Complex
    {
        $new_real = $this->real * $b->getReal() - $this->imaginary * $b->imaginary;
        $new_imaginary = $this->imaginary * $b->getReal() + $this->real * $b->getImaginary();

        return new self($new_real, $new_imaginary);
    }

    /**
     * Деление
     * @param Complex $b
     * @return Complex
     */
    public function divide(Complex $b): Complex
    {
        if ($b->getReal() == 0 && $b->getImaginary() == 0) {
            throw new DivisionByZeroError('Division by zero');

        }

        $bottom = $b->getReal() ** 2 + $b->getImaginary() ** 2;
        $new_real = ($this->real * $b->getReal() + $this->imaginary * $b->getImaginary()) / $bottom;
        $new_imaginary = ($this->imaginary * $b->getReal() - $this->real * $b->getImaginary()) / $bottom;

        return new self($new_real, $new_imaginary);
    }

    /**
     * @return float
     */
    public function getReal(): float
    {
        return $this->real;
    }

    /**
     * @return float
     */
    public function getImaginary(): float
    {
        return $this->imaginary;
    }
}