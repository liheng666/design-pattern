<?php

use Observer\Children;
use Observer\ParentsObserver;
use Observer\TeacherObserver;

require './Autoload.php';

$children = new Children(); // 被观察者-小朋友

$teacher = new TeacherObserver(); //观察者老师
$parents = new ParentsObserver(); // 观察者父母

$children->registerObserver($teacher);
$children->registerObserver($parents);
for ($i=0; $i < 10; $i++) {
    echo "考试成绩下来啦\n";
    $children->setScore(random_int(40,100));
    sleep(2);
}

echo '移除观察者'."\n";
$children->removeObserver($teacher);
$children->removeObserver($parents);
$children->setScore(65);
echo "end\n";