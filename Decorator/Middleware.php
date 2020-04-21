<?php
namespace Decorator;

abstract class Middleware implements DecoratorInterface{

    protected  DecoratorInterface $decorator;

    // 处理函数
    abstract public function operation();

    // 添加需要装饰的对象
    public function setDecorator(DecoratorInterface $decorator)
    {
        $this->decorator = $decorator;
    }

}