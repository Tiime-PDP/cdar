<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

final class IndicatorStringType
{
    #[XmlValue(cdata: false)]
    private string $value;

    /**
     * Indicator format.
     */
    #[XmlAttribute]
    private ?string $format;

    public function __construct(string $value, ?string $format = null)
    {
        $this->value = $value;
        $this->format = $format;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }
}
