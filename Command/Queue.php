<?php
/**
 * Created by PhpStorm.
 * User: llh
 * Date: 2020/5/18
 * Time: 21:46
 */

namespace Command;

class Queue
{
    protected FileCacheInterface $fileCache;

    public function __construct(FileCacheInterface $fileCache)
    {
        $this->fileCache = $fileCache;
    }

    public function addJob(CommandInterface $command)
    {
        $this->fileCache->writeFile(serialize($command));
    }

    public function popJob()
    {
        $str = $this->fileCache->readFile();
        if ($str) {
            return unserialize($str);
        }
        return null;
    }

    public function run()
    {
        while (true) {
            $lines = $this->fileCache->readFile();
            foreach ($lines as $line) {
                if (!empty($line)) {
                    $job = unserialize($line);
                    try {
                        $job->command();
                    } catch (\Throwable $t) {
                        $job->exceptionHandling();
                        echo $t->getMessage() . "\n";
                    }
                }

            }
            $this->fileCache->writeCopyToRead();
            echo "休眠一秒\n";
            sleep(1);
        }
    }
}