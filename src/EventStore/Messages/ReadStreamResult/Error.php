<?php

// this file is auto-generated by prolic/fpp
// don't edit this file manually

declare(strict_types=1);

namespace Prooph\EventStore\Messages\ReadStreamResult;

final class Error extends \Prooph\EventStore\Messages\ReadStreamResult
{
    public const VALUE = 'Error';

    public function toString(): string
    {
        return self::VALUE;
    }

    public function __toString(): string
    {
        return self::VALUE;
    }
}
