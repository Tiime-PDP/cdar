<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

/**
 * Unqualified text data type.
 */
#[SerializedNamespace(NamespaceUri::UDT)]
final readonly class TextType implements ValueObjectInterface
{
    /**
     * Text value.
     */
    #[XmlValue(cdata: false)]
    private string $value;

    /**
     * Language identifier.
     */
    #[XmlAttribute]
    private ?string $languageID;

    /**
     * Language locale identifier.
     */
    #[XmlAttribute]
    private ?string $languageLocaleID;

    public function __construct(
        string $value,
        ?string $languageID = null,
        ?string $languageLocaleID = null,
    ) {
        $this->value = $value;
        $this->languageID = $languageID;
        $this->languageLocaleID = $languageLocaleID;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getLanguageID(): ?string
    {
        return $this->languageID;
    }

    public function getLanguageLocaleID(): ?string
    {
        return $this->languageLocaleID;
    }
}
