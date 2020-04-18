<?php

namespace Strategy;

/**
 * 计算税金接口
 */
interface TaxInterface
{
    public function tax(float $sum);
}
