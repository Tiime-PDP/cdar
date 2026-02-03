<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer;

use JMS\Serializer\Naming\CamelCaseNamingStrategy;
use JMS\Serializer\SerializerBuilder;
use TiimePDP\CrossDomainAcknowledgementAndResponse\CrossDomainAcknowledgementAndResponse;

final class JmsSerializer
{
    private \JMS\Serializer\Serializer $serializer;

    public function __construct()
    {
        $namingStrategy = new CustomPropertyNamingStrategy(
            new CamelCaseNamingStrategy(separator: '', lowerCase: false)
        );

        $this->serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy($namingStrategy)
            ->enableEnumSupport()
            ->build();
    }

    public function serialize(CrossDomainAcknowledgementAndResponse $cdar): string
    {
        return $this->serializer->serialize($cdar, 'xml');
    }

    public function deserialize(string $data): CrossDomainAcknowledgementAndResponse
    {
        /** @var CrossDomainAcknowledgementAndResponse $cdar */
        $cdar = $this->serializer->deserialize($data, CrossDomainAcknowledgementAndResponse::class, 'xml');

        return $cdar;
    }
}
