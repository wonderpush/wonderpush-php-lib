## Getting Started

Simple usage looks like:

```php
$wonderpush = new \WonderPush\WonderPush(WONDERPUSH_ACCESS_TOKEN, WONDERPUSH_APPLICATION_ID);
$response = $this->api->create(
    \WonderPush\Params\DeliveriesCreateParams::_new()
        ->setTargetSegmentIds('@ALL')
        ->setNotification(\WonderPush\Notification::_new()
            ->setAlert(\WonderPush\NotificationAlert::_new()
                ->setTitle('Using the PHP library')
                ->setText('Hello, WonderPush!')
            ))
);
echo $response->getNotificationId();
```


### Configuring a Logger

The library does minimal logging, but it can be configured with a [`PSR-3` compatible logger](http://www.php-fig.org/psr/psr-3/) so that messages end up there instead of `error_log`:

```php
$wonderpush->setLogger($logger);
```

## API Reference

Take a look at the methods exposed by the [\WonderPush\WonderPush](class-WonderPush.WonderPush.html) class.
