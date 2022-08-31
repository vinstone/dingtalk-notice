<?php

namespace DingTalkNotice\Messages;

class ActionCard extends Message
{
    public function __construct(string $title, string $text, string $btnOrientation = '0')
    {
        $this->setMessage($title, $text, $btnOrientation);
    }

    public function setMessage(string $title, string $text, string $btnOrientation)
    {
        $this->message = [
            'msgtype' => 'actionCard',
            'actionCard' => [
                'title' => $title,
                'text' => $text,
                'btnOrientation' => $btnOrientation,
            ],
        ];
        return $this;
    }

    public function single(string $singleTitle, string $singleURL, bool $pc_slide = true)
    {
        $this->message['actionCard']['singleTitle'] = $singleTitle;
        $this->message['actionCard']['singleURL'] = 'dingtalk://dingtalkclient/page/link?url=' . urlencode($singleURL) . '&pc_slide=' . $pc_slide;
        return $this;
    }

    public function addButton(string $title, string $actionURL, bool $pc_slide = true)
    {
        $this->message['actionCard']['btns'][] = [
            'title' => $title,
            'actionURL' => 'dingtalk://dingtalkclient/page/link?url=' . urlencode($actionURL) . '&pc_slide=' . $pc_slide,
        ];
        return $this;
    }
}
