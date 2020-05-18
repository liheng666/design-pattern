<?php

namespace State;

interface ActionInterface
{
    public function sayHi();

    public function handle();

    public function kiss();
}