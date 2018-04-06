<?php

declare(strict_types=1);

namespace Prooph\EventStore\Exception;

class AccessDenied extends RuntimeException
{
    public static function toStream(string $stream): AccessDenied
    {
        return new self(sprintf(
            'Access to stream \'%s\' is denied',
            $stream
        ));
    }

    public static function toSubscription(string $stream, string $groupName): AccessDenied
    {
        return new self(sprintf(
            'Access to subscription with stream \'%s\' and group name \'%s\' is denied',
            $stream,
            $groupName
        ));
    }
}