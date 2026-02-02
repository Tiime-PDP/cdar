<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;

/**
 * Qualified formatted date time type.
 */
#[SerializedNamespace(NamespaceUri::QDT)]
final readonly class FormattedDateTimeType
{
    /**
     * Date time string.
     */
    private DateTimeStringType $dateTimeString;

    public function __construct(
        DateTimeStringType $dateTimeString,
    ) {
        $this->dateTimeString = $dateTimeString;
    }

    public function getDateTimeString(): DateTimeStringType
    {
        return $this->dateTimeString;
    }
}
