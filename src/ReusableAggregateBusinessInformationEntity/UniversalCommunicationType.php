<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;

/**
 * Universal communication.
 */
#[SerializedNamespace(NamespaceUri::RAM)]
final readonly class UniversalCommunicationType
{
    /**
     * Communication URI.
     */
    private ?IDType $URIID;

    /**
     * Complete number.
     */
    private ?\TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType $completeNumber;

    public function __construct(
        ?IDType $URIID = null,
        ?\TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType $completeNumber = null,
    ) {
        $this->URIID = $URIID;
        $this->completeNumber = $completeNumber;
    }

    public function getURIID(): ?IDType
    {
        return $this->URIID;
    }

    public function getCompleteNumber(): ?\TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType
    {
        return $this->completeNumber;
    }
}
