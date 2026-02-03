<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

#[SerializedNamespace(NamespaceUri::UDT)]
final class DateTimeStringType implements ValueObjectInterface
{
    /**
     * Date time string value.
     */
    #[XmlValue(cdata: false)]
    private string $value;

    /**
     * Date time format.
     */
    #[XmlAttribute]
    private ?string $format;

    public function __construct(string $value, ?string $format)
    {
        $this->value = $value;
        $this->format = $format;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }
}
