<?php


namespace alxdeex\Math;


class AlgebraicComplex extends Complex
{

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
}