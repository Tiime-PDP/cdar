<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Unqualified code data type.
 */
final readonly class CodeType
{
    /**
     * Code value.
     */
    #[XmlValue(cdata: false)]
    private string $value;

    /**
     * List identifier.
     */
    #[XmlAttribute]
    private ?string $listID;

    /**
     * List agency identifier.
     */
    #[XmlAttribute]
    private ?string $listAgencyID;

    /**
     * List agency name.
     */
    #[XmlAttribute]
    private ?string $listAgencyName;

    /**
     * List version identifier.
     */
    #[XmlAttribute]
    private ?string $listVersionID;

    /**
     * Code name.
     */
    #[XmlAttribute]
    private ?string $name;

    /**
     * List name.
     */
    #[XmlAttribute]
    private ?string $listName;

    /**
     * Language identifier.
     */
    #[XmlAttribute]
    private ?string $languageID;

    /**
     * List URI.
     */
    #[XmlAttribute]
    private ?string $listURI;

    /**
     * List scheme URI.
     */
    #[XmlAttribute]
    private ?string $listSchemeURI;

    public function __construct(
        string $value,
        ?string $listID = null,
        ?string $listAgencyID = null,
        ?string $listAgencyName = null,
        ?string $listVersionID = null,
        ?string $name = null,
        ?string $listName = null,
        ?string $languageID = null,
        ?string $listURI = null,
        ?string $listSchemeURI = null,
    ) {
        $this->value = $value;
        $this->listID = $listID;
        $this->listAgencyID = $listAgencyID;
        $this->listAgencyName = $listAgencyName;
        $this->listVersionID = $listVersionID;
        $this->name = $name;
        $this->listName = $listName;
        $this->languageID = $languageID;
        $this->listURI = $listURI;
        $this->listSchemeURI = $listSchemeURI;
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

    public function getListAgencyName(): ?string
    {
        return $this->listAgencyName;
    }

    public function getListVersionID(): ?string
    {
        return $this->listVersionID;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getListName(): ?string
    {
        return $this->listName;
    }

    public function getLanguageID(): ?string
    {
        return $this->languageID;
    }

    public function getListURI(): ?string
    {
        return $this->listURI;
    }

    public function getListSchemeURI(): ?string
    {
        return $this->listSchemeURI;
    }
}
