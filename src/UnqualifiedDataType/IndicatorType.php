<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use JMS\Serializer\Annotation\XmlElement;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;

/**
 * Unqualified indicator data type.
 */
#[SerializedNamespace(NamespaceUri::UDT)]
final readonly class IndicatorType
{
    /**
     * Indicator string.
     */
    #[XmlElement(namespace: NamespaceUri::UDT->value)]
    private ?IndicatorStringType $indicatorString;

    /**
     * Boolean indicator value.
     */
    #[XmlElement(namespace: NamespaceUri::UDT->value)]
    private ?bool $indicator;

    public function __construct(
        ?IndicatorStringType $indicatorString = null,
        ?bool $indicator = null,
    ) {
        $this->indicatorString = $indicatorString;
        $this->indicator = $indicator;
    }

    public function getIndicatorString(): ?IndicatorStringType
    {
        return $this->indicatorString;
    }

    public function getIndicator(): ?bool
    {
        return $this->indicator;
    }
}
