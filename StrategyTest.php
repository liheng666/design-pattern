<?php

use Strategy\Quotation;
use Strategy\XETax;
use Strategy\ZZSTax;

// 引入自动加载文件
require('./Autoload.php');

$q = new Quotation(10000, new ZZSTax());
$tax = $q->getTax();
echo $tax;

$q->setTaxCalculate(new XETax());
echo $q->getTax();

