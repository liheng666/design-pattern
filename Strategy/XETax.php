<?php

namespace Strategy;

class XETax implements TaxInterface
{
    public function Tax(float $sum)
    {
        return 0.03 * $sum;
    }
}
