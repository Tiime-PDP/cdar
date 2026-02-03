<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;

/**
 * Unqualified date time data type.
 */
#[SerializedNamespace(NamespaceUri::UDT)]
final readonly class DateTimeType
{
    /**
     * Date time string.
     */
    #[XmlElement(namespace: NamespaceUri::UDT->value)]
    private ?DateTimeStringType $dateTimeString;

    /**
     * Structured date time.
     */
    #[XmlElement(cdata: false, namespace: NamespaceUri::UDT->value)]
    #[Type(name: 'DateTimeImmutable')]
    private ?\DateTimeImmutable $dateTime;

    public function __construct(
        ?DateTimeStringType $dateTimeString = null,
        ?\DateTimeImmutable $dateTime = null,
    ) {
        $this->dateTimeString = $dateTimeString;
        $this->dateTime = $dateTime;
    }

    public function getDateTimeString(): ?DateTimeStringType
    {
        return $this->dateTimeString;
    }

    public function getDateTime(): ?\DateTimeImmutable
    {
        return $this->dateTime;
    }
}
