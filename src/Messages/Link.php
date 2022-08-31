<?php

namespace DingTalkNotice\Messages;

class Link extends Message
{
    public function __construct(string $title, string $text, string $messageUrl, string $picUrl, bool $pc_slide)
    {
        $this->setMessage($title, $text, $messageUrl, $picUrl, $pc_slide);
    }

    public function setMessage(string $title, string $text, string $messageUrl, string $picUrl, bool $pc_slide)
    {
        $this->message = [
            'msgtype' => 'link',
            'link' => [
                'text' => $text,
                'title' => $title,
                'picUrl' => $picUrl,
                'messageUrl' => 'dingtalk://dingtalkclient/page/link?url=' . urlencode($messageUrl) . '&pc_slide=' . $pc_slide,
            ],
        ];
    }
}
