<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Codelist\TimePointFormatCode;

final class DateTimeStringType
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
