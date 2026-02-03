<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

/**
 * Qualified party role code type.
 */
#[SerializedNamespace(NamespaceUri::QDT)]
final readonly class PartyRoleCodeType implements ValueObjectInterface
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
