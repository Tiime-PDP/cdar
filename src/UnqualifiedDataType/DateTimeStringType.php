<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;


use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

#[SerializedNamespace(NamespaceUri::UDT)]
final class DateTimeStringType implements ValueObjectInterface
{
    /**
     * Date time string value
     */
    private string $value;

    /**
     * Date time format
     */
    private ?string $format;

    /**
     * @param string $value
     * @param string|null $format
     */
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