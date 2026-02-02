<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

/**
 * Unqualified quantity data type
 */
#[SerializedNamespace(NamespaceUri::UDT)]
final readonly class QuantityType implements ValueObjectInterface
{
    /**
     * Quantity value
     */
    private string $value;

    /**
     * Unit code
     */
    private ?string $unitCode;

    /**
     * Unit code list identifier
     */
    private ?string $unitCodeListID;

    /**
     * Unit code list agency identifier
     */
    private ?string $unitCodeListAgencyID;

    /**
     * Unit code list agency name
     */
    private ?string $unitCodeListAgencyName;

    public function __construct(
        string $value,
        ?string $unitCode = null,
        ?string $unitCodeListID = null,
        ?string $unitCodeListAgencyID = null,
        ?string $unitCodeListAgencyName = null,
    ) {
        $this->value = $value;
        $this->unitCode = $unitCode;
        $this->unitCodeListID = $unitCodeListID;
        $this->unitCodeListAgencyID = $unitCodeListAgencyID;
        $this->unitCodeListAgencyName = $unitCodeListAgencyName;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getUnitCode(): ?string
    {
        return $this->unitCode;
    }

    public function getUnitCodeListID(): ?string
    {
        return $this->unitCodeListID;
    }

    public function getUnitCodeListAgencyID(): ?string
    {
        return $this->unitCodeListAgencyID;
    }

    public function getUnitCodeListAgencyName(): ?string
    {
        return $this->unitCodeListAgencyName;
    }
}
