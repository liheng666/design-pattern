<?php

namespace Command;

class SendEmail implements CommandInterface
{

    public function command()
    {
        echo time() . "发送邮件....\n";
        sleep(1);
        // 模拟失败
        if (rand(0, 2) == 1) {
            throw new \Exception("邮件发送失败");
        }
        echo "邮件发送成功\n";
    }

    public function exceptionHandling()
    {
        echo "记录日志邮件发送失败\n";
    }
}