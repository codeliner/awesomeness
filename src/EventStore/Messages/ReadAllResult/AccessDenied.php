<?php

// this file is auto-generated by prolic/fpp
// don't edit this file manually

declare(strict_types=1);

namespace Prooph\EventStore\Messages\ReadAllResult;

final class AccessDenied extends \Prooph\EventStore\Messages\ReadAllResult
{
    public const VALUE = 'AccessDenied';

    public function toString(): string
    {
        return self::VALUE;
    }

    public function __toString(): string
    {
        return self::VALUE;
    }
}