<?php


namespace alxdeex\Math;

use Phospr\Fraction;

class TrigonometryComplex extends Complex
{
    public function __toString(): string
    {
        $module = sqrt($this->real ** 2 + $this->imaginary ** 2);
        $factor_pi = Fraction::fromFloat(atan2($this->imaginary, $this->real) / pi());

        $fi = $factor_pi->getNumerator() < 0 ? '-' : '';
        $fi .= (abs($factor_pi->getNumerator()) != 1 ? $factor_pi->getNumerator() : '') . 'PI';
        $fi = $factor_pi->getDenominator() > 1 ? $fi . '/' . $factor_pi->getDenominator() : $fi;

        if ($module != 1) {
            return "$module(cos($fi) + i*sin($fi))";
        } else {
            return "cos($fi) + i*sin($fi)";
        }
    }
}