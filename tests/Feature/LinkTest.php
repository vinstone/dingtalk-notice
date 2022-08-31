<?php

namespace DingNotice\Tests\Feature;

use DingTalkNotice\Messages\Link;
use DingTalkNotice\Tests\MessageTest;

class LinkTest extends MessageTest
{
    public function testSendLinkMessage()
    {
        $message = new Link('时代的火车向前开', '每当面临重大升级，产品经理们都会取一个应景的代号', 'https://open.dingtalk.com/document/group/custom-robot-access', 'https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png');

        $result = $this->dingtalk->setMessage($message)->send();

        $this->assertSame([
            'errcode' => 0,
            'errmsg' => 'ok',
        ], $result);
    }
}
