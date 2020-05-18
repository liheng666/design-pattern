<?php

namespace State;

class BreakUp implements ActionInterface
{

    public function sayHi()
    {
        echo '........(无话可说)';
    }

    public function handle()
    {
        echo '你干嘛~ 别拉我';
    }

    public function kiss()
    {
        echo '一把推开~ 『你有病吧』';
    }
}