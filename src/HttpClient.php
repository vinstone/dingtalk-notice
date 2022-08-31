<?php

namespace DingTalkNotice;

use GuzzleHttp\Client;

class HttpClient
{
    protected $baseUri = 'https://oapi.dingtalk.com/robot/send';

    protected $config;

    protected $client;

    public function __construct($config)
    {
        $this->config = $config;
        $this->client = $this->createClient();
    }

    protected function createClient()
    {
        return new Client([
            'timeout' => $this->config['timeout'] ?? 2.0,
            'verify' => $this->config['ssl_verify'] ?? true,
        ]);
    }

    protected function getQueryUrl()
    {
        $query['access_token'] = $this->config['access_token'];

        if (!empty($this->config['secret']) && $secret = $this->config['secret']) {
            $query['timestamp'] = floor(microtime(true) * 1000);
            $query['sign'] = base64_encode(hash_hmac('sha256', $query['timestamp'] . "\n" . $secret, $secret, true));
        }

        return $this->baseUri . '?' . http_build_query($query);
    }

    public function request($params)
    {
        $result = $this->client->request('POST', $this->getQueryUrl(), [
            'json' => $params,
            'headers' => ['Content-Type: application/json;charset=utf-8'],
        ]);
        return json_decode($result->getBody()->getContents(), true) ?? [];
    }
}
