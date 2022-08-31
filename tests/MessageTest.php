<?php

namespace DingTalkNotice\Tests;

use DingTalkNotice\DingTalk;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    public $config = [];

    public $dingtalk;

    public $at;

    protected function setUp(): void
    {
        $this->config = [
            'default' => [
                'enabled' => true,
                'access_token' => '',
                'timeout' => 2.0,
                'ssl_verify' => true,
                'secret' => '',
            ],
            'other' => [
                'enabled' => true,
                'access_token' => '',
                'timeout' => 2.0,
                'ssl_verify' => true,
                'secret' => '',
            ],
        ];

        $this->dingtalk = new DingTalk($this->config);

        $this->at = '13888888888';
    }
}
