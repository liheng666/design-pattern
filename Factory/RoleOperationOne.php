<?php

namespace Factory;

class RoleOperationOne extends RoleOperation
{
    protected function createGameCharacter($role): GameCharacter
    {
        if ($role === 'mage') {
            return new Mage();
        }
        if ($role === 'soldiers') {
            return new Soldiers();
        }
    }
}
