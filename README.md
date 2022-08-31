# 钉钉群自定义机器人消息通知laravel扩展包

### 机器人接入方式请先阅读 [钉钉官方文档](https://open.dingtalk.com/document/group/custom-robot-access)
<br>

# 介绍
dingtalk-notie 是钉钉群自定义机器人消息通知的Laravel扩展包，您可以通过集成此扩展包到项目里实现快捷的消息通知

# 要求
- php版本:>=7.0
- laravel版本: Laravel5.5+


# 安装
#### 推荐使用 composer 进行安装：

```php
composer require vinstone/dingtalk-notice
```

# Laravel
#### Laravel 5.5+ 已经实现了扩展包发现机制，您不需要进行额外的加载操作，执行以下命令会自动发布配置文件`dingtalk.php`到您项目的配置文件当中

```php
php artisan vendor:publish --provider="DingTalkNotice\Providers\DingTalkNoticeProvider"
```

# Lumen
#### Lumen 并未移植扩展包自动发现机制，所以需要手动加载扩展包并复制配置文件。
#### 打开配置文件 bootstrap/app.php 并在大约 81 行左右添加如下内容：

```php
$app->register(DingTalkNotice\Providers\DingTalkNoticeProvider::class);
```
#### 将 vendor/vinstone/dingtalk-notice/config/dingtalk.php 复制到您项目配置文件目录config下
<br>

# 非 Laravel/Lumen 框架
#### 无需考虑加载问题，请使用全局函数 \dingtalk() 或直接创建 \DingTalkNotice\Dingtalk 实例来发送消息
<br>

# 配置

打开配置文件 config/dingtalk.php，按如下格式进行配置

```php
return [
    // 默认配置
    'default' => [
        // 机器人启用开关
        'enabled' => env('DINGTALK_ENABLED',true),
        // 创建机器人时获取的access_token
        'access_token' => env('DINGTALK_ACCESS_TOKEN',''),
        // 超时时间
        'timeout' => env('DINGTALK_TIMEOUT',2.0),
        // 是否启用SSL验证
        'ssl_verify' => env('DINGTALK_SSL_VERIFY',true),
        // 加签密钥
        'secret' => env('DINGTALK_SECRET',true),
    ],

    // 多机器人配置
    'log' => [
        // 机器人启用开关
        'enabled' => env('LOG_DINGTALK_ENABLED',true),
        // 创建机器人时获取的access_token
        'access_token' => env('LOG_DINGTALK_ACCESS_TOKEN',''),
        // 超时时间
        'timeout' => env('LOG_DINGTALK_TIMEOUT',2.0),
        // 是否启用SSL验证
        'ssl_verify' => env('LOG_DINGTALK_SSL_VERIFY',true),
        // 加签密钥
        'secret' => env('LOG_DINGTALK_SECRET',true),
    ]
];
```

# 使用方法
## 文本类型消息
```php
use DingTalkNotice\Messages\Text;

$message = new Text('我就是我, @XXX 是不一样的烟火');
```

## Link类型消息
```php
use DingTalkNotice\Messages\Link;

$message = new Link('时代的火车向前开', '每当面临重大升级，产品经理们都会取一个应景的代号', 'https://open.dingtalk.com/document/group/custom-robot-access', 'https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png', true);

// 重点：点击消息跳转的URL，PC端默认在侧边栏打开，如需在浏览器打开，请设置第 5 个参数为 false
```

## Markdown类型消息
```php
use DingTalkNotice\Messages\Markdown;

$message = new Markdown('杭州天气', '"#### 杭州天气 @150XXXXXXXX \n > 9度，西北风1级，空气良89，相对温度73%\n');
```

## ActionCard类型消息
```php
use DingTalkNotice\Messages\ActionCard;

$message = new ActionCard('乔布斯20年前想打造一间苹果咖啡厅', '![screenshot](https://gw.alicdn.com/tfs/TB1ut3xxbsrBKNjSZFpXXcXhFXa-846-786.png)
 ### 乔布斯 20 年前想打造的苹果咖啡厅');
```

### 整体跳转类型
```php
$message->single('阅读全文', 'https://open.dingtalk.com/document/group/custom-robot-access', true);

// 重点：点击按钮触发的URL，PC端默认在侧边栏打开，如需在浏览器打开，请设置第 3 个参数为 false
```

### 独立跳转类型
```php
$message->addButton('内容不错', 'https://www.dingtalk.com/', true);

// 重点：点击按钮触发的URL，PC端默认在侧边栏打开，如需在浏览器打开，请设置第 3 个参数为 false
```



## FeedCard类型消息
```php
use DingTalkNotice\Messages\FeedCard;

$message = new FeedCard();
$message->addLink('时代的火车向前开', 'https://www.dingtalk.com/', 'https://img.alicdn.com/tfs/TB1NwmBEL9TBuNjy1zbXXXpepXa-2400-1218.png', true);

// 重点：点击单条信息到跳转URL，PC端默认在侧边栏打开，如需在浏览器打开，请设置第 4 个参数为 false
```

# 消息接收人
### @其他人
```php
$message->at(['138xxxxxxx']);
```
### or
```php
$message->at('138xxxxxxxx,139xxxxxxxx');
```
### or
```php
$message->at('138xxxxxxxx');
```

### @所有人
```php
$message->atAll();
```
# 消息发送
### 容器解析
```php
app(DingTalk::class)->setMessage($message)->send();
```
### 辅助函数 dingtalk
```php
dingtalk()->setMessage($message)->send();
```

# 多机器人消息发送
### 容器解析
```php
app(DingTalk::class)->other('log')->setMessage($message)->send();
```
### 辅助函数 dingtalk
```php
dingtalk()->other('log')->setMessage($message)->send();
```




