<?php

namespace Command;

// 文件缓存
class FileCache implements FileCacheInterface
{

    // 读取文件路径
    protected string $fileRead;

    // 写入文件路径
    protected string $fileWrite;

    public function __construct(string $fileRead, string $fileWrite)
    {
        $this->fileRead = $fileRead;
        $this->fileWrite = $fileWrite;
    }

    public function writeFile(string $str): bool
    {
        $f = fopen($this->fileWrite, 'a');
        if (flock($f, LOCK_EX)) {
            fputs($f, $str . "\n");
            flock($f, LOCK_UN);
            fclose($f);
            return true;
        } else {
            return false;
        }

    }

    public function readFile()
    {
        if (!is_file($this->fileRead)) {
            touch($this->fileRead);
        }
        $f = fopen($this->fileRead, 'r+');
        if (flock($f, LOCK_EX)) {
            while ($line = fgets($f)) {
                yield trim($line);
            }
            rewind($f);
            ftruncate($f, 0);
            fwrite($f, '');

            flock($f, LOCK_UN);
            fclose($f);
        }
        return;
    }

    public function writeCopyToRead()
    {
        if (!is_file($this->fileWrite)) {
            return false;
        }
        try {

            $w = fopen($this->fileWrite, 'r+');
            $r = fopen($this->fileRead, 'w');
            if (flock($w, LOCK_EX) && flock($r, LOCK_EX)) {
                if ($w_size = filesize($this->fileWrite)) {
                    $w_str = fread($w, filesize($this->fileWrite));
                    fputs($r, $w_str);
                }
                rewind($w);
                ftruncate($w, 0);
                fwrite($w, '');
                return true;
            }
        } finally {
            flock($w, LOCK_UN);
            flock($r, LOCK_UN);
            fclose($w);
            fclose($r);
        }

        return false;
    }

}