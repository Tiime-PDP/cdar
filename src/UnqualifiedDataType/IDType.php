<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Unqualified identifier data type.
 */
final readonly class IDType
{
    /**
     * Identifier value.
     */
    #[XmlValue(cdata: false)]
    private string $value;

    /**
     * Scheme identifier.
     */
    #[XmlAttribute]
    private ?string $schemeID;

    /**
     * Scheme name.
     */
    #[XmlAttribute]
    private ?string $schemeName;

    /**
     * Scheme agency identifier.
     */
    #[XmlAttribute]
    private ?string $schemeAgencyID;

    /**
     * Scheme agency name.
     */
    #[XmlAttribute]
    private ?string $schemeAgencyName;

    /**
     * Scheme version identifier.
     */
    #[XmlAttribute]
    private ?string $schemeVersionID;

    /**
     * Scheme data URI.
     */
    #[XmlAttribute]
    private ?string $schemeDataURI;

    /**
     * Scheme URI.
     */
    #[XmlAttribute]
    private ?string $schemeURI;

    public function __construct(
        string $value,
        ?string $schemeID = null,
        ?string $schemeName = null,
        ?string $schemeAgencyID = null,
        ?string $schemeAgencyName = null,
        ?string $schemeVersionID = null,
        ?string $schemeDataURI = null,
        ?string $schemeURI = null,
    ) {
        $this->value = $value;
        $this->schemeID = $schemeID;
        $this->schemeName = $schemeName;
        $this->schemeAgencyID = $schemeAgencyID;
        $this->schemeAgencyName = $schemeAgencyName;
        $this->schemeVersionID = $schemeVersionID;
        $this->schemeDataURI = $schemeDataURI;
        $this->schemeURI = $schemeURI;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getSchemeID(): ?string
    {
        return $this->schemeID ?? null;
    }

    public function getSchemeName(): ?string
    {
        return $this->schemeName ?? null;
    }

    public function getSchemeAgencyID(): ?string
    {
        return $this->schemeAgencyID ?? null;
    }

    public function getSchemeAgencyName(): ?string
    {
        return $this->schemeAgencyName ?? null;
    }

    public function getSchemeVersionID(): ?string
    {
        return $this->schemeVersionID ?? null;
    }

    public function getSchemeDataURI(): ?string
    {
        return $this->schemeDataURI ?? null;
    }

    public function getSchemeURI(): ?string
    {
        return $this->schemeURI ?? null;
    }
}
