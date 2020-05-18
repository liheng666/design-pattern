<?php

namespace State;
/**
 * 初识状态类
 * Class FirstAcquaintance
 */
class FirstAcquaintance implements ActionInterface
{

    public function sayHi()
    {
        echo 'hi~ 很高兴见到你';
    }

    public function handle()
    {
        echo '你干嘛呀~是不是太快了';
    }

    public function kiss()
    {
        echo '流氓 ！！！';
    }
}