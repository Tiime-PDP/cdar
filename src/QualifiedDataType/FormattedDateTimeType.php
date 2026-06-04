<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType;

use JMS\Serializer\Annotation\XmlElement;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;

/**
 * Qualified formatted date time type.
 */
final readonly class FormattedDateTimeType
{
    /**
     * Date time string.
     */
    #[XmlElement(namespace: NamespaceUri::QDT->value)]
    private FormattedDateTimeStringType $dateTimeString;

    public function __construct(
        FormattedDateTimeStringType $dateTimeString,
    ) {
        $this->dateTimeString = $dateTimeString;
    }

    public function getDateTimeString(): FormattedDateTimeStringType
    {
        return $this->dateTimeString;
    }
}
