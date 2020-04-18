<?php

namespace Strategy;

// 报价单类
class Quotation
{
    // 报价单总金额
    protected $sum;

    // 交税计算的对象
    protected $tax_calculate;

    public function __construct(float $sum, TaxInterface $tax)
    {
        $this->sum = $sum;
        $this->tax_calculate = $tax;
    }

    /**
     * 设置使用的计算方式
     *
     * @param TaxInterface $tax
     * @return void
     */
    public function setTaxCalculate(TaxInterface $tax)
    {
        $this->tax_calculate = $tax;
    }

    /**
     * 获取交税金额
     *
     * @return void
     */
    public function getTax()
    {
        return $this->tax_calculate->tax($this->sum);
    }
}
