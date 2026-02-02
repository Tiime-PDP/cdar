<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

/**
 * Unqualified measure data type.
 */
#[SerializedNamespace(NamespaceUri::UDT)]
final readonly class MeasureType implements ValueObjectInterface
{
    /**
     * Measure value.
     */
    private string $value;

    /**
     * Unit code.
     */
    private ?string $unitCode;

    /**
     * Unit code list version identifier.
     */
    private ?string $unitCodeListVersionID;

    public function __construct(
        string $value,
        ?string $unitCode = null,
        ?string $unitCodeListVersionID = null,
    ) {
        $this->value = $value;
        $this->unitCode = $unitCode;
        $this->unitCodeListVersionID = $unitCodeListVersionID;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getUnitCode(): ?string
    {
        return $this->unitCode;
    }

    public function getUnitCodeListVersionID(): ?string
    {
        return $this->unitCodeListVersionID;
    }
}
