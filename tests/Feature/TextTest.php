<?php

namespace DingNotice\Tests\Feature;

use DingTalkNotice\Messages\Text;
use DingTalkNotice\Tests\MessageTest;

class TextTest extends MessageTest
{
    public function testSendTextMessage()
    {
        $message = new Text("我就是我是不一样的烟火");

        $result = $this->dingtalk->setMessage($message)->send();

        $this->assertSame([
            'errcode' => 0,
            'errmsg' => 'ok',
        ], $result);
    }

    public function testSendTextMessageWithOther()
    {
        $message = new Text("我就是我是不一样的烟火 with other");

        $result = $this->dingtalk->other('other')->setMessage($message)->send();

        $this->assertSame([
            'errcode' => 0,
            'errmsg' => 'ok',
        ], $result);
    }

    public function testSendTextMessageWithAt()
    {
        $message = new Text("我就是我是不一样的烟火 with at");
        $message->at($this->at);

        $result = $this->dingtalk->setMessage($message)->send();

        $this->assertSame([
            'errcode' => 0,
            'errmsg' => 'ok',
        ], $result);
    }

    public function testSendTextMessageWithAtAll()
    {
        $message = new Text("我就是我是不一样的烟火 with atall");
        $message->atAll();

        $result = $this->dingtalk->setMessage($message)->send();

        $this->assertSame([
            'errcode' => 0,
            'errmsg' => 'ok',
        ], $result);
    }
}
