<?php

namespace Decorator;

class CrossMiddleware extends Middleware
{
    public function operation()
    {
        $this->decorator->operation();
        echo '请求处理完毕允许跨域' . PHP_EOL;
    }
}
