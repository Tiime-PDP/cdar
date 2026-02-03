<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

/**
 * Unqualified identifier data type.
 */
#[SerializedNamespace(NamespaceUri::UDT)]
final readonly class IDType implements ValueObjectInterface
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
        return $this->schemeID;
    }

    public function getSchemeName(): ?string
    {
        return $this->schemeName;
    }

    public function getSchemeAgencyID(): ?string
    {
        return $this->schemeAgencyID;
    }

    public function getSchemeAgencyName(): ?string
    {
        return $this->schemeAgencyName;
    }

    public function getSchemeVersionID(): ?string
    {
        return $this->schemeVersionID;
    }

    public function getSchemeDataURI(): ?string
    {
        return $this->schemeDataURI;
    }

    public function getSchemeURI(): ?string
    {
        return $this->schemeURI;
    }
}
