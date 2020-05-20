<?php

namespace Command;
interface CommandInterface
{
    // 命令方法
    public function command();

    public function exceptionHandling();
}

