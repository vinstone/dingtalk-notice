<?php

namespace DingTalkNotice\Messages;

abstract class Message
{
    protected $at = [];

    protected $message = [];

    public function at($mobiles)
    {
        if (is_string($mobiles) && strpos($mobiles, ',')) {
            $mobiles = explode(',', $mobiles);
        } elseif (is_string($mobiles)) {
            $mobiles = [$mobiles];
        }

        $this->message['at']['atMobiles'] = $mobiles;
    }

    public function atAll($atAll = true)
    {
        $this->message['at']['isAtAll'] = (boolean) $atAll;
    }

    public function getMessage()
    {
        return $this->message + $this->at;
    }
}
