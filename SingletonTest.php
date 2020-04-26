<?php

/**
 * 单例模式
 */
class Singleton
{
    private static  $s = null;

    private $time = null;

    private function __construct()
    {
        $this->time = time();
    }

    public static function getSingleton()
    {
        if(null === Singleton::$s){
            Singleton::$s = new Singleton();
        }
        return Singleton::$s;
    }

    public function getTime()
    {
        return $this->time;
    }
}

$s = Singleton::getSingleton();

echo $s->getTime()."\n";
sleep(3);
$s = Singleton::getSingleton();
echo $s->getTime()."\n";
