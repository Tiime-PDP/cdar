<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

/**
 * Unqualified amount data type
 */
#[SerializedNamespace(NamespaceUri::UDT)]
final readonly class AmountType implements ValueObjectInterface
{
    /**
     * Amount value
     */
    private string $value;

    /**
     * Currency identifier
     */
    private ?string $currencyID;

    /**
     * Currency code list version identifier
     */
    private ?string $currencyCodeListVersionID;

    public function __construct(
        string $value,
        ?string $currencyID = null,
        ?string $currencyCodeListVersionID = null,
    ) {
        $this->value = $value;
        $this->currencyID = $currencyID;
        $this->currencyCodeListVersionID = $currencyCodeListVersionID;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getCurrencyID(): ?string
    {
        return $this->currencyID;
    }

    public function getCurrencyCodeListVersionID(): ?string
    {
        return $this->currencyCodeListVersionID;
    }
}
