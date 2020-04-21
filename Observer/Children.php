<?php

namespace Observer;

// 小孩子被观察对象
class Children implements SubjectInterface
{
    protected array $observers = [];

    protected float $score = 0;

    public function registerObserver(ObserverInterface $observer)
    {
        array_push($this->observers, $observer);
    }

    public function removeObserver(ObserverInterface $observer)
    {
        if (false === $k = array_search($observer, $this->observers)) {
            unset($this->observers[$k]);
        }
    }

    public function notifyObserver()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->score);
        }
    }

    public function setScore(float $score)
    {
        $this->score = $score;
        $this->notifyObserver();
    }
}
