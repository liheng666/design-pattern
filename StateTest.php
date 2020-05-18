<?php
/**
 * Created by PhpStorm.
 * User: llh
 * Date: 2020/5/18
 * Time: 21:08
 */

use State\BreakUp;
use State\FirstAcquaintance;
use State\Girl;
use State\Passionate;

require './Autoload.php';

// 先new一个要追求的女孩子👧
$girl = new Girl(new FirstAcquaintance(), new Passionate(), new BreakUp());

$girl->sayHi();
$girl->handle();
$girl->kiss();

$girl->startFallingInLove();
$girl->sayHi();
$girl->handle();
$girl->kiss();

$girl->justBrokeUp();
$girl->sayHi();
$girl->handle();
$girl->kiss();