<?php

namespace Factory;

class Mage implements GameCharacter
{
    // 普通攻击
    function normalAttack()
    {
        return '奥数飞弹-';
    }

    // 跳跃
    function jump()
    {
        return '闪现1米到空中-';
    }

    // 跑
    function run()
    {
        return '加持疾驰咒快跑-';
    }

    // 大招
    function bigMove()
    {
        return '暴风雪~~~';
    }

    // 角色名
    function name()
    {
        return '法师-';
    }
}
