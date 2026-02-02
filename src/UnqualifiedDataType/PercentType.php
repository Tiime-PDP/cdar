<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

/**
 * Unqualified percent data type
 */
#[SerializedNamespace(NamespaceUri::UDT)]
final readonly class PercentType implements ValueObjectInterface
{
    /**
     * Percent value
     */
    private string $value;

    /**
     * Percent format
     */
    private ?string $format;

    public function __construct(
        string $value,
        ?string $format = null,
    ) {
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
