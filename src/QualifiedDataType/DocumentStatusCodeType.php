<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

/**
 * Qualified document status code type.
 */
#[SerializedNamespace(NamespaceUri::QDT)]
final readonly class DocumentStatusCodeType implements ValueObjectInterface
{
    /**
     * Code value.
     */
    private string $value;

    /**
     * List identifier (fixed to "1373").
     */
    private ?string $listID;

    /**
     * List agency identifier (fixed to "6" for UNECE).
     */
    private ?string $listAgencyID;

    /**
     * List version identifier (fixed to "D23A").
     */
    private ?string $listVersionID;

    /**
     * Code name.
     */
    private ?string $name;

    public function __construct(
        string $value,
        ?string $listID = '1373',
        ?string $listAgencyID = '6',
        ?string $listVersionID = 'D23A',
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
