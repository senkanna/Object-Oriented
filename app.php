
<?php

require __DIR__ . '/vendor/autoload.php';

use Senthil\DIExample\SubscriberManager;

$subscriberManager = new SubscriberManager();
$subscriberManager->notifySubscribers();