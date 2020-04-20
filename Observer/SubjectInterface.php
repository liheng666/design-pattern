<?php

namespace Observer;

/**
 * 被观察对象接口
 */
interface SubjectInterface
{
    // 注册观察者
    public function registerObserver(ObserverInterface $observer);

    // 移除观察者
    public function removeObserver(ObserverInterface $observer);

    // 消息通知
    public function notifyObserver();
}
