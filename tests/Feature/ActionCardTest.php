<?php

namespace DingNotice\Tests\Feature;

use DingTalkNotice\Messages\ActionCard;
use DingTalkNotice\Tests\MessageTest;

class ActionCardTest extends MessageTest
{
    protected $message;

    public function __construct()
    {
        parent::__construct();

        $this->message = new ActionCard('乔布斯 20 年前想打造一间苹果咖啡厅，而它正是 Apple Store 的前身', "![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png) \n\n #### 乔布斯 20 年前想打造的苹果咖啡厅 \n\n Apple Store 的设计正从原来满满的科技感走向生活化，而其生活化的走向其实可以追溯到 20 年前苹果一个建立咖啡馆的计划");
    }

    public function testSendActionSingleMessage()
    {
        $this->message->single('阅读全文', 'https://open.dingtalk.com/document/group/custom-robot-access');

        $result = $this->dingtalk->setMessage($this->message)->send();

        $this->assertSame([
            'errcode' => 0,
            'errmsg' => 'ok',
        ], $result);
    }

    public function testSendActionBtnsMessage()
    {
        $this->message->addButton('阅读全文', 'https://www.dingtalk.com/');

        $result = $this->dingtalk->setMessage($this->message)->send();

        $this->assertSame([
            'errcode' => 0,
            'errmsg' => 'ok',
        ], $result);
    }
}
