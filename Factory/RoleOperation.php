<?php

namespace Factory;

// 角色操作类
abstract class RoleOperation
{

    // 工厂方法
    abstract protected function createGameCharacter($role): GameCharacter;

    // 必杀连招1
    public function continuousSkillOne($role)
    {
        $gameCharacter = $this->createGameCharacter($role);
        echo $gameCharacter->name();
        echo $gameCharacter->run();
        echo $gameCharacter->normalAttack();
        echo $gameCharacter->jump();
        echo $gameCharacter->bigMove();
        echo "\n";
    }
}
