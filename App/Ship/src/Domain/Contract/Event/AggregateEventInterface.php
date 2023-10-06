<?php

namespace Ship\Domain\Contract\Event;

use EventSauce\EventSourcing\Serialization\SerializablePayload;

interface AggregateEventInterface extends SerializablePayload {
}