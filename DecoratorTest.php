<?php

use Decorator\CrossMiddleware;
use Decorator\LoginMiddleware;
use Decorator\Request;

require './Autoload.php';

$r = new Request();

// 登录前置中间件
$lm = new LoginMiddleware();
$lm->setDecorator($r);

// 允许跨域后置中间件
$cm = new CrossMiddleware();
$cm->setDecorator($lm);

$cm->operation();