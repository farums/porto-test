<?php

namespace Ship\Domain\Contract\Aggregate;

use EventSauce\EventSourcing\Snapshotting\AggregateRootWithSnapshotting;

interface AggregateRootInterface extends AggregateRootWithSnapshotting {
}