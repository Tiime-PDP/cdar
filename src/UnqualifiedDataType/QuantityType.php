<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Unqualified quantity data type.
 */
final readonly class QuantityType
{
    /**
     * Quantity value.
     */
    #[XmlValue(cdata: false)]
    private string $value;

    /**
     * Unit code.
     */
    #[XmlAttribute]
    private ?string $unitCode;

    /**
     * Unit code list identifier.
     */
    #[XmlAttribute]
    private ?string $unitCodeListID;

    /**
     * Unit code list agency identifier.
     */
    #[XmlAttribute]
    private ?string $unitCodeListAgencyID;

    /**
     * Unit code list agency name.
     */
    #[XmlAttribute]
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
