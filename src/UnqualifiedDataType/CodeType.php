<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

/**
 * Unqualified code data type.
 */
#[SerializedNamespace(NamespaceUri::UDT)]
final readonly class CodeType implements ValueObjectInterface
{
    /**
     * Code value.
     */
    private string $value;

    /**
     * List identifier.
     */
    private ?string $listID;

    /**
     * List agency identifier.
     */
    private ?string $listAgencyID;

    /**
     * List agency name.
     */
    private ?string $listAgencyName;

    /**
     * List version identifier.
     */
    private ?string $listVersionID;

    /**
     * Code name.
     */
    private ?string $name;

    /**
     * List name.
     */
    private ?string $listName;

    /**
     * Language identifier.
     */
    private ?string $languageID;

    /**
     * List URI.
     */
    private ?string $listURI;

    /**
     * List scheme URI.
     */
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
