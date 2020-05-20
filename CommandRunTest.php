<?php

use Command\FileCache;
use Command\Queue;

require './Autoload.php';

$file_cache = new FileCache(__DIR__ . '/readfile', __DIR__ . '/writefile');
$queue = new Queue($file_cache);
$queue->run();
