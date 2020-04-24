<?php

use Decorator\CrossMiddleware;
use Decorator\DecoratorInterface;
use Decorator\LoginMiddleware;
use Decorator\Request;

require './Autoload.php';


/**
 * 使用装饰器模式构架web中间件
 *
 * @param DecoratorInterface $request 请求对象
 * @param array $middleware 中间件数组
 * @return void
 */
function decorator(DecoratorInterface $request, array $middleware)
{
    // 构建执行管道
    $pipeline = array_reduce(array_reverse($middleware), function ($init, $item) {
        $object = new $item;
        $object->setDecorator($init);
        return $object;
    }, $request);

    $pipeline->operation();
}


$r = new Request();
// 配置中间件
$all = [
    // 登录前置中间件
    LoginMiddleware::class,
    // 允许跨域后置中间件
    CrossMiddleware::class,
];
// 构建执行管道
decorator($r, $all);



// 和上面的调用执行流程是一致的比较好理解
// // 允许跨域后置中间件
// $cm = new CrossMiddleware();
// $cm->setDecorator($lm);
// // 登录前置中间件
// $lm = new LoginMiddleware();
// $lm->setDecorator($r);
// $cm->operation();
