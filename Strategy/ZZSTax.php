<?php

namespace Strategy;

/**
 * 增值税计算类
 */
class ZZSTax implements TaxInterface
{
    public function tax(float $sum)
    {
        return 0.06 * $sum;
    }
}
