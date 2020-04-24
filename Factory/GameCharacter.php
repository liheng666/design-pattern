<?php

namespace Factory;

// 游戏角色抽象类
interface GameCharacter
{
    // 普通攻击
    function normalAttack();

    // 跳跃
    function jump();

    // 跑
    function run();

    // 大招
    function bigMove();

    // 角色名
    function name();
}
