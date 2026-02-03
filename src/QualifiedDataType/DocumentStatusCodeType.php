<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Qualified document status code type.
 */
final readonly class DocumentStatusCodeType
{
    /**
     * Code value.
     */
    #[XmlValue(cdata: false)]
    private string $value;

    /**
     * List identifier (fixed to "1373").
     */
    #[XmlAttribute]
    private ?string $listID;

    /**
     * List agency identifier (fixed to "6" for UNECE).
     */
    #[XmlAttribute]
    private ?string $listAgencyID;

    /**
     * List version identifier (fixed to "D23A").
     */
    #[XmlAttribute]
    private ?string $listVersionID;

    /**
     * Code name.
     */
    #[XmlAttribute]
    private ?string $name;

    public function __construct(
        string $value,
        ?string $listID = null,
        ?string $listAgencyID = null,
        ?string $listVersionID = null,
        ?string $name = null,
    ) {
        $this->value = $value;
        $this->listID = $listID;
        $this->listAgencyID = $listAgencyID;
        $this->listVersionID = $listVersionID;
        $this->name = $name;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getListID(): ?string
    {
        return $this->listID;
    }

    public function getListAgencyID(): ?string
    {
        return $this->listAgencyID;
    }

    public function getListVersionID(): ?string
    {
        return $this->listVersionID;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}
