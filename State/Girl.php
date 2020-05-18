<?php

namespace State;
// 使用状态模式 new个女朋友 （：
class Girl
{
    // 初识
    protected FirstAcquaintance $FirstAcquaintance;

    // 热恋
    protected Passionate $Passionate;

    // 分手
    protected BreakUp $BreakUp;

    // 当前状态
    protected ActionInterface $state;

    public function __construct(
        FirstAcquaintance $FirstAcquaintance,
        Passionate $Passionate,
        BreakUp $BreakUp
    )
    {
        $this->FirstAcquaintance = $FirstAcquaintance;
        $this->Passionate = $Passionate;
        $this->BreakUp = $BreakUp;

        $this->state = $this->FirstAcquaintance;
    }

    public function sayHi()
    {
        $this->state->sayHi();
        echo "\n";
    }

    public function handle()
    {
        $this->state->handle();
        echo "\n";
    }

    public function kiss()
    {
        $this->state->kiss();
        echo "\n";
    }

    public function startFallingInLove()
    {
        $this->state = $this->Passionate;
        echo '------开始恋爱------';
        echo "\n";
    }

    public function justBrokeUp()
    {
        $this->state = $this->BreakUp;
        echo '------刚刚分手------';
        echo "\n";
    }
}