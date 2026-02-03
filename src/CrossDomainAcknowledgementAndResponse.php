<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\XmlNamespace;
use JMS\Serializer\Annotation\XmlRoot;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\AcknowledgementDocumentType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\ExchangedDocumentContextType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\ExchangedDocumentType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;

/**
 * Cross Domain Acknowledgement and Response message
 * UN/EDIFACT D23B standard.
 */
#[SerializedNamespace(NamespaceUri::RSM)]
#[XmlRoot(name: 'CrossDomainAcknowledgementAndResponse', namespace: NamespaceUri::RSM->value, prefix: 'rsm')]
#[XmlNamespace(
    uri: NamespaceUri::RAM->value,
    prefix: 'ram'
)]
#[XmlNamespace(
    uri: NamespaceUri::UDT->value,
    prefix: 'udt'
)]
#[XmlNamespace(
    uri: NamespaceUri::QDT->value,
    prefix: 'qdt'
)]
#[XmlNamespace(
    uri: NamespaceUri::XSI->value,
    prefix: 'xsi'
)]
final readonly class CrossDomainAcknowledgementAndResponse
{
    /**
     * Exchanged document context.
     */
    #[XmlElement(namespace: NamespaceUri::RSM->value)]
    private ?ExchangedDocumentContextType $exchangedDocumentContext;

    /**
     * Exchanged document.
     */
    #[XmlElement(namespace: NamespaceUri::RSM->value)]
    private ExchangedDocumentType $exchangedDocument;

    /**
     * Acknowledgement documents.
     *
     * @var array<AcknowledgementDocumentType>
     */
    #[XmlElement(namespace: NamespaceUri::RSM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\AcknowledgementDocumentType>')]
    #[XmlList(entry: 'AcknowledgementDocument', inline: true, namespace: NamespaceUri::RSM->value)]
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
