<?php

// this file is auto-generated by prolic/fpp
// don't edit this file manually

declare(strict_types=1);

namespace Prooph\EventStore;

abstract class SubscriptionDropReason
{
    public const OPTIONS = [
        SubscriptionDropReason\UserInitiated::VALUE => SubscriptionDropReason\UserInitiated::class,
        SubscriptionDropReason\NotAuthenticated::VALUE => SubscriptionDropReason\NotAuthenticated::class,
        SubscriptionDropReason\AccessDenied::VALUE => SubscriptionDropReason\AccessDenied::class,
        SubscriptionDropReason\SubscribingError::VALUE => SubscriptionDropReason\SubscribingError::class,
        SubscriptionDropReason\ServerError::VALUE => SubscriptionDropReason\ServerError::class,
        SubscriptionDropReason\ConnectionClosed::VALUE => SubscriptionDropReason\ConnectionClosed::class,
        SubscriptionDropReason\CatchUpError::VALUE => SubscriptionDropReason\CatchUpError::class,
        SubscriptionDropReason\ProcessingQueueOverflow::VALUE => SubscriptionDropReason\ProcessingQueueOverflow::class,
        SubscriptionDropReason\EventHandlerException::VALUE => SubscriptionDropReason\EventHandlerException::class,
        SubscriptionDropReason\MaxSubscribersReached::VALUE => SubscriptionDropReason\MaxSubscribersReached::class,
        SubscriptionDropReason\PersistentSubscriptionDeleted::VALUE => SubscriptionDropReason\PersistentSubscriptionDeleted::class,
        SubscriptionDropReason\Unknown::VALUE => SubscriptionDropReason\Unknown::class,
        SubscriptionDropReason\NotFound::VALUE => SubscriptionDropReason\NotFound::class,
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
            throw new \LogicException("Invalid SubscriptionDropReason '$self' given");
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

    public function equals(SubscriptionDropReason $other): bool
    {
        return get_class($this) === get_class($other);
    }

    abstract public function toString(): string;

    abstract public function __toString(): string;
}
