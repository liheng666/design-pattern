<?php

namespace Command;

interface FileCacheInterface
{
    public function writeFile(string $str): bool;

    public function readFile();
}