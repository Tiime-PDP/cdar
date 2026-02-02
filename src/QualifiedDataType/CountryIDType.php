<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

/**
 * Qualified country identifier type (ISO two-letter code)
 */
#[SerializedNamespace(NamespaceUri::QDT)]
final readonly class CountryIDType implements ValueObjectInterface
{
    /**
     * ISO two-letter country code
     */
    private string $value;

    /**
     * Scheme agency identifier (fixed to "5" for ISO)
     */
    private ?string $schemeAgencyID;

    public function __construct(
        string $value,
        ?string $schemeAgencyID = '5',
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
