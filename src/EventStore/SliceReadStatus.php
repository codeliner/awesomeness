<?php

// this file is auto-generated by prolic/fpp
// don't edit this file manually

declare(strict_types=1);

namespace Prooph\EventStore;

abstract class SliceReadStatus
{
    public const OPTIONS = [
        SliceReadStatus\Success::VALUE => SliceReadStatus\Success::class,
        SliceReadStatus\StreamNotFound::VALUE => SliceReadStatus\StreamNotFound::class,
        SliceReadStatus\StreamDeleted::VALUE => SliceReadStatus\StreamDeleted::class,
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
            throw new \LogicException("Invalid SliceReadStatus '$self' given");
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

    public function equals(SliceReadStatus $other): bool
    {
        return get_class($this) === get_class($other);
    }

    abstract public function toString(): string;

    abstract public function __toString(): string;
}