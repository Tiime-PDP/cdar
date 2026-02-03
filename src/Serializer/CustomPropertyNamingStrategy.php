<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer;

use JMS\Serializer\Metadata\PropertyMetadata;
use JMS\Serializer\Naming\CamelCaseNamingStrategy;
use JMS\Serializer\Naming\PropertyNamingStrategyInterface;

final readonly class CustomPropertyNamingStrategy implements PropertyNamingStrategyInterface
{
    public function __construct(private CamelCaseNamingStrategy $strategy)
    {
    }

    public function translateName(PropertyMetadata $property): string
    {
        if ($property->xmlAttribute) {
            return $property->name;
        }

        return $this->strategy->translateName($property);
    }
}
