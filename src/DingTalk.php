<?php

namespace DingTalkNotice;

use DingTalkNotice\HttpClient;
use DingTalkNotice\Messages\Message;

class DingTalk
{
    public $config;

    protected $name = 'default';

    protected $message;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function other($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setMessage(Message $message)
    {
        $this->message = $message;
        return $this;
    }

    public function send()
    {
        if (!$this->config[$this->name]['enabled']) {
            throw new \Exception("The {$this->name} Configuration not enabled");
        }

        $client = new HttpClient($this->config[$this->name]);
        return $client->request($this->message->getMessage());
    }
}
