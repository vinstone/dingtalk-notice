<?php

namespace DingTalkNotice\Messages;

class Text extends Message
{
    public function __construct(string $content)
    {
        $this->setMessage($content);
    }

    public function setMessage(string $content)
    {
        $this->message = [
            'msgtype' => 'text',
            'text' => [
                'content' => $content,
            ],
        ];
    }
}
