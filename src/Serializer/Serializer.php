<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer;

use JMS\Serializer\Naming\CamelCaseNamingStrategy;
use JMS\Serializer\SerializerBuilder;
use TiimePDP\CrossDomainAcknowledgementAndResponse\CrossDomainAcknowledgementAndResponse;

final class Serializer implements SerializerInterface
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

    /**
     * @throws SerializationException
     */
    public function serialize(CrossDomainAcknowledgementAndResponse $cdar): string
    {
        try {
            return $this->serializer->serialize($cdar, 'xml');
        } catch (\Throwable $throwable) {
            throw new SerializationException(message: 'An error occurred during serialization. Error: '.$throwable->getMessage(), previous: $throwable);
        }
    }

    /**
     * @throws SerializationException
     */
    public function deserialize(string $data): CrossDomainAcknowledgementAndResponse
    {
        try {
            /** @var CrossDomainAcknowledgementAndResponse $cdar */
            $cdar = $this->serializer->deserialize($data, CrossDomainAcknowledgementAndResponse::class, 'xml');

            return $cdar;
        } catch (\Throwable $throwable) {
            throw new SerializationException(message: 'An error occurred during deserialization. Error: '.$throwable->getMessage(), previous: $throwable);
        }
    }
}
