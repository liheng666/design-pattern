<?php

use Command\FileCache;
use Command\Queue;
use Command\SendEmail;

require './Autoload.php';

$file_cache = new FileCache(__DIR__ . '/readfile', __DIR__ . '/writefile');
$queue = new Queue($file_cache);

echo "开始自动添加任务";
while (true) {
    $queue->addJob(new SendEmail());
    echo time() . '添加队列'."\n";
    sleep(2);
}

//$queue->run();
