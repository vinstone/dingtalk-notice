<?php

namespace DingTalkNotice\Messages;

class FeedCard extends Message
{
    public function __construct()
    {
        $this->setMessage();
    }

    public function setMessage()
    {
        $this->message = [
            'msgtype' => 'feedCard',
            'feedCard' => [
                'links' => [],
            ],
        ];
    }

    public function addLink(string $title, string $messageURL, string $picURL, bool $pc_slide = true)
    {
        $this->message['feedCard']['links'][] = [
            'title' => $title,
            'messageURL' => 'dingtalk://dingtalkclient/page/link?url=' . urlencode($messageURL) . '&pc_slide=' . $pc_slide,
            'picURL' => $picURL,
        ];
        return $this;
    }
}
