<?php

// this file is auto-generated by prolic/fpp
// don't edit this file manually

declare(strict_types=1);

namespace Prooph\EventStore\SubscriptionDropReason;

final class PersistentSubscriptionDeleted extends \Prooph\EventStore\SubscriptionDropReason
{
    public const VALUE = 'PersistentSubscriptionDeleted';

    public function toString(): string
    {
        return self::VALUE;
    }

    public function __toString(): string
    {
        return self::VALUE;
    }
}
