<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\AcknowledgementCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\DocumentCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\StatusCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\CodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\DateTimeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IndicatorType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

/**
 * Acknowledgement document.
 */
#[SerializedNamespace(NamespaceUri::RAM)]
final readonly class AcknowledgementDocumentType
{
    /**
     * Multiple references indicator.
     */
    private ?IndicatorType $multipleReferencesIndicator;

    /**
     * Identifier.
     */
    private ?IDType $ID;

    /**
     * Type code.
     */
    private ?DocumentCodeType $typeCode;

    /**
     * Name.
     */
    private ?TextType $name;

    /**
     * Issue date time.
     */
    private ?DateTimeType $issueDateTime;

    /**
     * Status code.
     */
    private ?StatusCodeType $statusCode;

    /**
     * Acknowledgement status code.
     */
    private ?AcknowledgementCodeType $acknowledgementStatusCode;

    /**
     * Item identification identifier.
     */
    private ?IDType $itemIdentificationID;

    /**
     * Reason information.
     *
     * @var array<TextType>
     */
    private array $reasonInformation;

    /**
     * Channel code.
     */
    private ?CodeType $channelCode;

    /**
     * Process condition code.
     */
    private ?CodeType $processConditionCode;

    /**
     * Process conditions.
     *
     * @var array<TextType>
     */
    private array $processCondition;

    /**
     * Statuses.
     *
     * @var array<TextType>
     */
    private array $status;

    /**
     * Reference documents.
     *
     * @var array<ReferencedDocumentType>
     */
    private array $referenceReferencedDocument;

    /**
     * @param array<TextType>               $reasonInformation
     * @param array<TextType>               $processCondition
     * @param array<TextType>               $status
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
        array $reasonInformation = [],
        ?CodeType $channelCode = null,
        ?CodeType $processConditionCode = null,
        array $processCondition = [],
        array $status = [],
        array $referenceReferencedDocument = [],
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
     * @return array<TextType>
     */
    public function getReasonInformation(): array
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
     * @return array<TextType>
     */
    public function getProcessCondition(): array
    {
        return $this->processCondition;
    }

    /**
     * @return array<TextType>
     */
    public function getStatus(): array
    {
        return $this->status;
    }

    /**
     * @return array<ReferencedDocumentType>
     */
    public function getReferenceReferencedDocument(): array
    {
        return $this->referenceReferencedDocument;
    }
}
