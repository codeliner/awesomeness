<?php

// this file is auto-generated by prolic/fpp
// don't edit this file manually

declare(strict_types=1);

namespace Prooph\EventStore\Messages\ConditionalWriteStatus;

final class StreamDeleted extends \Prooph\EventStore\Messages\ConditionalWriteStatus
{
    public const VALUE = 'StreamDeleted';

    public function toString(): string
    {
        return self::VALUE;
    }

    public function __toString(): string
    {
        return self::VALUE;
    }
}
