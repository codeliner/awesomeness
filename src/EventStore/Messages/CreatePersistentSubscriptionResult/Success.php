<?php

// this file is auto-generated by prolic/fpp
// don't edit this file manually

declare(strict_types=1);

namespace Prooph\EventStore\Messages\CreatePersistentSubscriptionResult;

final class Success extends \Prooph\EventStore\Messages\CreatePersistentSubscriptionResult
{
    public const VALUE = 'Success';

    public function toString(): string
    {
        return self::VALUE;
    }

    public function __toString(): string
    {
        return self::VALUE;
    }
}
