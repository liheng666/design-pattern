<?php

namespace State;

class Passionate implements ActionInterface
{

    public function sayHi()
    {
        echo '几天没见想死你了~';
    }

    public function handle()
    {
        echo '拉拉手~ 一起走~';
    }

    public function kiss()
    {
        echo 'kiss~~~~~~';
    }
}