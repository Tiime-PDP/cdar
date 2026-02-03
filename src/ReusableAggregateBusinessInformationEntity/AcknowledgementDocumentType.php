<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\AcknowledgementCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\DocumentCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\StatusCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\CodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\DateTimeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IndicatorType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

/**
 * Acknowledgement document.
 */
final readonly class AcknowledgementDocumentType
{
    /**
     * Multiple references indicator.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IndicatorType $multipleReferencesIndicator;

    /**
     * Identifier.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IDType $ID;

    /**
     * Type code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?DocumentCodeType $typeCode;

    /**
     * Name.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TextType $name;

    /**
     * Issue date time.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?DateTimeType $issueDateTime;

    /**
     * Status code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?StatusCodeType $statusCode;

    /**
     * Acknowledgement status code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?AcknowledgementCodeType $acknowledgementStatusCode;

    /**
     * Item identification identifier.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IDType $itemIdentificationID;

    /**
     * Reason information.
     *
     * @var array<TextType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?array $reasonInformation;

    /**
     * Channel code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?CodeType $channelCode;

    /**
     * Process condition code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?CodeType $processConditionCode;

    /**
     * Process conditions.
     *
     * @var array<TextType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?array $processCondition;

    /**
     * Statuses.
     *
     * @var array<TextType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?array $status;

    /**
     * Reference documents.
     *
     * @var array<ReferencedDocumentType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\ReferencedDocumentType>')]
    #[XmlList(entry: 'ReferenceReferencedDocument', inline: true, namespace: NamespaceUri::RAM->value)]
    private ?array $referenceReferencedDocument;

    /**
     * @param array<TextType>|null          $reasonInformation
     * @param array<TextType>|null          $processCondition
     * @param array<TextType>|null          $status
     * @param array<ReferencedDocumentType> $referenceReferencedDocument
     */
    public function __construct(
        ?IndicatorType $multipleReferencesIndicator = null,
        ?IDType $ID = null,
        ?DocumentCodeType $typeCode = null,
        ?TextType $name = null,
        ?DateTimeType $issueDateTime = null,
        ?StatusCodeType $statusCode = null,
        ?AcknowledgementCodeType $acknowledgementStatusCode = null,
        ?IDType $itemIdentificationID = null,
        ?array $reasonInformation = null,
        ?CodeType $channelCode = null,
        ?CodeType $processConditionCode = null,
        ?array $processCondition = null,
        ?array $status = null,
        ?array $referenceReferencedDocument = null,
    ) {
        $this->multipleReferencesIndicator = $multipleReferencesIndicator;
        $this->ID = $ID;
        $this->typeCode = $typeCode;
        $this->name = $name;
        $this->issueDateTime = $issueDateTime;
        $this->statusCode = $statusCode;
        $this->acknowledgementStatusCode = $acknowledgementStatusCode;
        $this->itemIdentificationID = $itemIdentificationID;
        $this->reasonInformation = $reasonInformation;
        $this->channelCode = $channelCode;
        $this->processConditionCode = $processConditionCode;
        $this->processCondition = $processCondition;
        $this->status = $status;
        $this->referenceReferencedDocument = $referenceReferencedDocument;
    }

    public function getMultipleReferencesIndicator(): ?IndicatorType
    {
        return $this->multipleReferencesIndicator;
    }

    public function getID(): ?IDType
    {
        return $this->ID;
    }

    public function getTypeCode(): ?DocumentCodeType
    {
        return $this->typeCode;
    }

    public function getName(): ?TextType
    {
        return $this->name;
    }

    public function getIssueDateTime(): ?DateTimeType
    {
        return $this->issueDateTime;
    }

    public function getStatusCode(): ?StatusCodeType
    {
        return $this->statusCode;
    }

    public function getAcknowledgementStatusCode(): ?AcknowledgementCodeType
    {
        return $this->acknowledgementStatusCode;
    }

    public function getItemIdentificationID(): ?IDType
    {
        return $this->itemIdentificationID;
    }

    /**
     * @return array<TextType>|null
     */
    public function getReasonInformation(): ?array
    {
        return $this->reasonInformation;
    }

    public function getChannelCode(): ?CodeType
    {
        return $this->channelCode;
    }

    public function getProcessConditionCode(): ?CodeType
    {
        return $this->processConditionCode;
    }

    /**
     * @return array<TextType>|null
     */
    public function getProcessCondition(): ?array
    {
        return $this->processCondition;
    }

    /**
     * @return array<TextType>|null
     */
    public function getStatus(): ?array
    {
        return $this->status;
    }

    /**
     * @return array<ReferencedDocumentType>|null
     */
    public function getReferenceReferencedDocument(): ?array
    {
        return $this->referenceReferencedDocument;
    }
}
