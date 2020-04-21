<?php
namespace Decorator;

// 使用装饰器模式实现一个web中间件demo

// 装饰器接口
interface DecoratorInterface
{
    public function operation();
}