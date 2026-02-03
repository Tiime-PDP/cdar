<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use JMS\Serializer\Annotation\XmlElement;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

/**
 * Universal communication.
 */
final readonly class UniversalCommunicationType
{
    /**
     * Communication URI.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IDType $URIID;

    /**
     * Complete number.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TextType $completeNumber;

    public function __construct(
        ?IDType $URIID = null,
        ?TextType $completeNumber = null,
    ) {
        $this->URIID = $URIID;
        $this->completeNumber = $completeNumber;
    }

    public function getURIID(): ?IDType
    {
        return $this->URIID;
    }

    public function getCompleteNumber(): ?TextType
    {
        return $this->completeNumber;
    }
}
