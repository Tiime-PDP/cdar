<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Unqualified measure data type.
 */
final readonly class MeasureType
{
    /**
     * Measure value.
     */
    #[XmlValue(cdata: false)]
    private string $value;

    /**
     * Unit code.
     */
    #[XmlAttribute]
    private ?string $unitCode;

    /**
     * Unit code list version identifier.
     */
    #[XmlAttribute]
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
