<?php

// this file is auto-generated by prolic/fpp
// don't edit this file manually

declare(strict_types=1);

namespace Prooph\EventStore\Messages;

abstract class VNodeState
{
    public const OPTIONS = [
        VNodeState\Initializing::VALUE => VNodeState\Initializing::class,
        VNodeState\Unknown::VALUE => VNodeState\Unknown::class,
        VNodeState\PreReplica::VALUE => VNodeState\PreReplica::class,
        VNodeState\CatchingUp::VALUE => VNodeState\CatchingUp::class,
        VNodeState\Cloned::VALUE => VNodeState\Cloned::class,
        VNodeState\Slave::VALUE => VNodeState\Slave::class,
        VNodeState\PreMaster::VALUE => VNodeState\PreMaster::class,
        VNodeState\Master::VALUE => VNodeState\Master::class,
        VNodeState\Manager::VALUE => VNodeState\Manager::class,
        VNodeState\ShuttingDown::VALUE => VNodeState\ShuttingDown::class,
        VNodeState\Shutdown::VALUE => VNodeState\Shutdown::class,
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
            throw new \LogicException("Invalid VNodeState '$self' given");
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

    public function equals(VNodeState $other): bool
    {
        return get_class($this) === get_class($other);
    }

    abstract public function toString(): string;

    abstract public function __toString(): string;
}
