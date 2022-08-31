<?php

use DingTalkNotice\DingTalk;

if (!function_exists('dingtalk')) {
    /**
     * Get DingTalk Instance
     *
     * @return DingTalk
     */
    function dingtalk(): DingTalk
    {
        return app(DingTalk::class);
    }
}
