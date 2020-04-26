<?php

use Factory\RoleOperationOne;

require './Autoload.php';

// 不同角色放连招
$ro = new RoleOperationOne();
$ro->continuousSkillOne('mage');
$ro->continuousSkillOne('soldiers');

// 输出：
// 法师-加持疾驰咒快跑-奥数飞弹-闪现1米到空中-暴风雪~~~
// 狂战士-拔腿就跑-巨剑横扫-跳起一米高-幻影剑舞~~哗哗哗-