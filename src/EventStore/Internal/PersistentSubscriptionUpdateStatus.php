<?php

// this file is auto-generated by prolic/fpp
// don't edit this file manually

declare(strict_types=1);

namespace Prooph\EventStore\Internal;

abstract class PersistentSubscriptionUpdateStatus
{
    public const OPTIONS = [
        PersistentSubscriptionUpdateStatus\Success::VALUE => PersistentSubscriptionUpdateStatus\Success::class,
        PersistentSubscriptionUpdateStatus\NotFound::VALUE => PersistentSubscriptionUpdateStatus\NotFound::class,
        PersistentSubscriptionUpdateStatus\Failure::VALUE => PersistentSubscriptionUpdateStatus\Failure::class,
        PersistentSubscriptionUpdateStatus\AccessDenied::VALUE => PersistentSubscriptionUpdateStatus\AccessDenied::class,
    ];

    final public function __construct()
    {
        $valid = false;

        foreach (self::OPTIONS as $value) {
            if ($this instanceof $value) {
                $valid = true;
                break;
            }
        }

        if (! $valid) {
            $self = get_class($this);
            throw new \LogicException("Invalid PersistentSubscriptionUpdateStatus '$self' given");
        }
    }

    public static function fromString(string $value): self
    {
        if (! isset(self::OPTIONS[$value])) {
            throw new \InvalidArgumentException('Unknown enum value given');
        }

        $class = self::OPTIONS[$value];

        return new $class();
    }

    public function equals(PersistentSubscriptionUpdateStatus $other): bool
    {
        return get_class($this) === get_class($other);
    }

    abstract public function toString(): string;

    abstract public function __toString(): string;
}