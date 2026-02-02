<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use DateTimeInterface;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;

/**
 * Unqualified date time data type
 */
#[SerializedNamespace(NamespaceUri::UDT)]
final readonly class DateTimeType
{
    /**
     * Date time string
     */
    private ?DateTimeStringType $dateTimeString;

    /**
     * Structured date time
     */
    private ?DateTimeInterface $dateTime;

    public function __construct(
        ?DateTimeStringType $dateTimeString = null,
        ?DateTimeInterface $dateTime = null,
    ) {
        $this->dateTimeString = $dateTimeString;
        $this->dateTime = $dateTime;
    }

    public function getDateTimeString(): ?DateTimeStringType
    {
        return $this->dateTimeString;
    }

    public function getDateTime(): ?DateTimeInterface
    {
        return $this->dateTime;
    }
}
