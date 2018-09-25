
<?php

require __DIR__ . '/vendor/autoload.php';

use Senthil\DIExample\SubscriberManager;

require __DIR__ . '/config.php';


$subscriberManager = new SubscriberManager($config);
$subscriberManager->notifySubscribers();