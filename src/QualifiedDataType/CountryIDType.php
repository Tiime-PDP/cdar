<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Qualified country identifier type (ISO two-letter code).
 */
final readonly class CountryIDType
{
    /**
     * ISO two-letter country code.
     */
    #[XmlValue(cdata: false)]
    private string $value;

    /**
     * Scheme agency identifier (fixed to "5" for ISO).
     */
    #[XmlAttribute]
    private ?string $schemeAgencyID;

    public function __construct(
        string $value,
        ?string $schemeAgencyID = null,
    ) {
        $this->value = $value;
        $this->schemeAgencyID = $schemeAgencyID;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getSchemeAgencyID(): ?string
    {
        return $this->schemeAgencyID;
    }
}
