<?php

namespace Observer;

class TeacherObserver implements ObserverInterface
{
    public function update(float $score)
    {
        if ($score > 90) {
            echo '老师：小朋友真棒，考了：' . $score . "分\n";
        } elseif ($score > 60) {
            echo '老师：还行，及格了：' . $score . "分\n";
        } else {
            echo '老师：把你家长叫来：' . $score . "分\n";
        }
    }

}
