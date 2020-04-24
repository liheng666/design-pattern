<?php

namespace Factory;

class Soldiers implements GameCharacter
{
    // 普通攻击
    function normalAttack()
    {
        return '巨剑横扫-';
    }

    // 跳跃
    function jump()
    {
        return '跳起一米高-';
    }

    // 跑
    function run()
    {
        return '拔腿就跑-';
    }

    // 大招
    function bigMove()
    {
        return '幻影剑舞~~哗哗哗-';
    }

    // 角色名
    function name()
    {
        return '狂战士-';
    }
}
