<?php

declare(strict_types=1);
require 'vendor/autoload.php';

$connection = new \Prooph\EventStoreHttpClient\EventStoreHttpConnection(
    new \Http\Client\Curl\Client(new \Http\Message\MessageFactory\DiactorosMessageFactory()),
    new \Http\Message\MessageFactory\DiactorosMessageFactory(),
    new \Http\Message\UriFactory\DiactorosUriFactory()
);

$task = $connection->createPersistentSubscription(
    'sasastream',
    'test',
    \Prooph\EventStoreClient\PersistentSubscriptionSettings::default(),
    new \Prooph\EventStoreClient\UserCredentials('admin', 'changeit')
);

var_dump($task->result());

$task = $connection->updatePersistentSubscription(
    'sasastream',
    'test',
    new \Prooph\EventStoreClient\PersistentSubscriptionSettings(
        true,
        0,
        false,
        2000,
        500,
        10,
        20,
        1000,
        500,
        0,
        30000,
        10,
        \Prooph\EventStoreClient\NamedConsumerStrategy::roundRobin()
    ),
    new \Prooph\EventStoreClient\UserCredentials('admin', 'changeit')
);

var_dump($task->result());
/*
$task = $connection->deletePersistentSubscription(
    'sasastream',
    'test',
    new \Prooph\EventStore\UserCredentials('admin', 'changeit')
);

var_dump($task->result());
*/
$task = $connection->getInformationForAllSubscriptionsAsync();

var_dump($task->result());

$task = $connection->getInformationForSubscriptionsWithStreamAsync('sasastream');

var_dump($task->result());

$task = $connection->getInformationForSubscriptionAsync('sasastream', 'test');

var_dump($task->result());
