<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\AcknowledgementDocumentType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\ExchangedDocumentContextType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\ExchangedDocumentType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;

/**
 * Cross Domain Acknowledgement and Response message
 * UN/EDIFACT D23B standard
 */
#[SerializedNamespace(NamespaceUri::RSM)]
final readonly class CrossDomainAcknowledgementAndResponse
{
    /**
     * Exchanged document context
     */
    private ?ExchangedDocumentContextType $exchangedDocumentContext;

    /**
     * Exchanged document
     */
    private ExchangedDocumentType $exchangedDocument;

    /**
     * Acknowledgement documents
     * @var array<AcknowledgementDocumentType>
     */
    private array $acknowledgementDocument;

    /**
     * @param array<AcknowledgementDocumentType> $acknowledgementDocument
     */
    public function __construct(
        ExchangedDocumentType $exchangedDocument,
        array $acknowledgementDocument,
        ?ExchangedDocumentContextType $exchangedDocumentContext = null,
    ) {
        $this->exchangedDocumentContext = $exchangedDocumentContext;
        $this->exchangedDocument = $exchangedDocument;
        $this->acknowledgementDocument = $acknowledgementDocument;
    }

    public function getExchangedDocumentContext(): ?ExchangedDocumentContextType
    {
        return $this->exchangedDocumentContext;
    }

    public function getExchangedDocument(): ExchangedDocumentType
    {
        return $this->exchangedDocument;
    }

    /**
     * @return array<AcknowledgementDocumentType>
     */
    public function getAcknowledgementDocument(): array
    {
        return $this->acknowledgementDocument;
    }
}
