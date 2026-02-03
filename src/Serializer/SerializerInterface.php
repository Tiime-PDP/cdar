<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer;

use TiimePDP\CrossDomainAcknowledgementAndResponse\CrossDomainAcknowledgementAndResponse;

interface SerializerInterface
{
    /**
     * @throws SerializationException
     */
    public function serialize(CrossDomainAcknowledgementAndResponse $cdar): string;

    /**
     * @throws SerializationException
     */
    public function deserialize(string $data): CrossDomainAcknowledgementAndResponse;
}
