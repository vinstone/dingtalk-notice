<?php

namespace DingNotice\Tests\Feature;

use DingTalkNotice\Messages\Markdown;
use DingTalkNotice\Tests\MessageTest;

class MarkDownTest extends MessageTest
{
    public function testSendMarkdownMessage()
    {
        $message = new Markdown('杭州天气', "#### 杭州天气\n > 9度，西北风1级，空气良89，相对温度73%\n > ![screenshot](https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png)\n > ###### 10点20分发布 [天气](https://www.dingtalk.com) \n");

        $result = $this->dingtalk->setMessage($message)->send();

        $this->assertSame([
            'errcode' => 0,
            'errmsg' => 'ok',
        ], $result);
    }
}
