<?php

namespace DingNotice\Tests\Feature;

use DingTalkNotice\Messages\FeedCard;
use DingTalkNotice\Tests\MessageTest;

class FeedCardTest extends MessageTest
{
    public function testSendFeedCardMessage()
    {
        $message = new FeedCard();
        $message->addLink('时代的火车向前开1', 'https://www.dingtalk.com/', 'https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png', true);
        $message->addLink('时代的火车向前开2', 'https://www.dingtalk.com/', 'https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png', true);
        $result = $this->dingtalk->setMessage($message)->send();
        $this->assertSame([
            'errcode' => 0,
            'errmsg' => 'ok',
        ], $result);
    }
}
