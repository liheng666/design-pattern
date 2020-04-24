<?php

// 命名空间和基础文件目录映射配置
$namespace = [
    'Strategy' => '/Strategy',
    'Observer' => '/Observer',
    'Decorator' => '/Decorator',
    'Factory' => '/Factory',
];

$autoload = new Autoload();
foreach ($namespace as $k => $v) {
    $autoload->addNameSpace($k, __DIR__ . $v);
}

$autoload->register();


// 自动加载类
class Autoload
{
    // 命名空间前缀
    protected $prefix = [];

    /**
     * 给命名空间添加基本目录
     *
     * @param string $prefix
     * @param string $base_dir
     * @return void
     */
    public function addNameSpace(string $prefix, string $base_dir)
    {
        // 规范命名空间文件
        $prefix = trim($prefix, '\\') . '\\';

        // 类文件基本目录
        $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR) . '/';

        if (isset($this->prefix[$prefix]) === false) {
            $this->prefix[$prefix] = [];
        }
        array_push($this->prefix[$prefix], $base_dir);
    }

    // 注册调用
    public function register()
    {
        echo "自动加载注册\n";
        spl_autoload_register([$this, 'loadClass']);
    }

    /**
     * 加载类文件
     *
     * @param string $class 类名
     * @return void
     */
    public function loadClass($class)
    {
        // 命名空间前缀
        $prefix = $class;

        while (false !== $pos = strrpos($prefix, '\\')) {
            $prefix = substr($prefix, 0, $pos + 1);

            $relative_class = substr($class, $pos + 1);
            $mapped_file = $this->loadFile($prefix, $relative_class);
            if ($mapped_file) {
                return $mapped_file;
            }

            $prefix = rtrim($prefix, '\\');
        }

        return false;
    }

    protected function loadFile(string $prefix, string $relative_class)
    {
        if (isset($this->prefix[$prefix]) === false) {
            return false;
        }

        foreach ($this->prefix[$prefix] as $base_dir) {
            $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
            if (file_exists($file)) {
                // echo '自动加载:' . $prefix . $relative_class . "\n" .
                //     $file . "\n";
                require $file;
                return $file;
            }
        }
        return false;
    }
}
