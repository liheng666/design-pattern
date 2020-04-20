<?php

namespace Observer;

class ParentsObserver implements ObserverInterface
{
    public function update(float $score)
    {
        if ($score > 90) {
            echo '家长：闺女真棒，考了：' . $score . "分\n";
        } elseif ($score > 60) {
            echo '家长：退步了呀，才：' . $score . "分\n";
        } else {
            echo '家长：你是不谈恋爱了：' . $score . "分\n";
        }
    }
}