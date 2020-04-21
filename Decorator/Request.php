<?php

namespace Decorator;

class Request implements DecoratorInterface
{
    public function operation()
    {
        echo '收到一个请求、返回处理结果' . PHP_EOL;
    }
}
