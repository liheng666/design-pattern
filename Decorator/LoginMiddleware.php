<?php

namespace Decorator;

class LoginMiddleware extends Middleware
{
    public function operation()
    {
        echo '检查登录状态' . PHP_EOL;
        $this->decorator->operation();
    }
}
