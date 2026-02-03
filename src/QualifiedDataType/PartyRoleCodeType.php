<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Qualified party role code type.
 */
final readonly class PartyRoleCodeType
{
    /**
     * Code value.
     */
    #[XmlValue(cdata: false)]
    private string $value;

    /**
     * List agency identifier (fixed to "6" for UNECE).
     */
    #[XmlAttribute]
    private ?string $listAgencyID;

    public function __construct(
        string $value,
        ?string $listAgencyID = null,
    ) {
        $this->value = $value;
        $this->listAgencyID = $listAgencyID;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getListAgencyID(): ?string
    {
        return $this->listAgencyID;
    }
}
