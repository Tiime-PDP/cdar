<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

/**
 * Unqualified amount data type.
 */
#[SerializedNamespace(NamespaceUri::UDT)]
final readonly class AmountType implements ValueObjectInterface
{
    /**
     * Amount value.
     */
    #[XmlValue(cdata: false)]
    private string $value;

    /**
     * Currency identifier.
     */
    #[XmlAttribute]
    private ?string $currencyID;

    /**
     * Currency code list version identifier.
     */
    #[XmlAttribute]
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
