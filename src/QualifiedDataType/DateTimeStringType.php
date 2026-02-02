<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Codelist\TimePointFormatCode;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

#[SerializedNamespace(NamespaceUri::QDT)]
final class DateTimeStringType implements ValueObjectInterface
{
    /**
     * Date time string value
     */
    private string $value;

    /**
     * Date time format
     */
    private TimePointFormatCode $format;

    public function __construct(string $value, TimePointFormatCode $format)
    {
        $this->value = $value;
        $this->format = $format;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getFormat(): TimePointFormatCode
    {
        return $this->format;
    }
}