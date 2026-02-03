<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use JMS\Serializer\Annotation\XmlElement;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\DocumentStatusCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\CodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\DateTimeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\NumericType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

/**
 * Document status.
 */
final readonly class DocumentStatusType
{
    /**
     * Reference date time.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?DateTimeType $referenceDateTime;

    /**
     * Condition code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?DocumentStatusCodeType $conditionCode;

    /**
     * Reason code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?CodeType $reasonCode;

    /**
     * Reasons.
     *
     * @var array<TextType>
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private array $reason;

    /**
     * Conditions.
     *
     * @var array<TextType>
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private array $condition;

    /**
     * Process condition code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?CodeType $processConditionCode;

    /**
     * Process conditions.
     *
     * @var array<TextType>
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private array $processCondition;

    /**
     * Reason information code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?CodeType $reasonInformationCode;

    /**
     * Reason information.
     *
     * @var array<TextType>
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private array $reasonInformation;

    /**
     * Reason classification code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?CodeType $reasonClassificationCode;

    /**
     * Reason classifications.
     *
     * @var array<TextType>
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private array $reasonClassification;

    /**
     * Requested action code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?CodeType $requestedActionCode;

    /**
     * Requested actions.
     *
     * @var array<TextType>
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private array $requestedAction;

    /**
     * Invalid information.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TextType $invalidInformation;

    /**
     * Valid information.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TextType $validInformation;

    /**
     * Sequence number.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?NumericType $sequenceNumeric;

    /**
     * Included notes.
     *
     * @var array<NoteType>
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private array $includedNote;

    /**
     * Specified document characteristics.
     *
     * @var array<DocumentCharacteristicType>
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private array $specifiedDocumentCharacteristic;

    /**
     * @param array<TextType>                   $reason
     * @param array<TextType>                   $condition
     * @param array<TextType>                   $processCondition
     * @param array<TextType>                   $reasonInformation
     * @param array<TextType>                   $reasonClassification
     * @param array<TextType>                   $requestedAction
     * @param array<NoteType>                   $includedNote
     * @param array<DocumentCharacteristicType> $specifiedDocumentCharacteristic
     */
    public function __construct(
        ?DateTimeType $referenceDateTime = null,
        ?DocumentStatusCodeType $conditionCode = null,
        ?CodeType $reasonCode = null,
        array $reason = [],
        array $condition = [],
        ?CodeType $processConditionCode = null,
        array $processCondition = [],
        ?CodeType $reasonInformationCode = null,
        array $reasonInformation = [],
        ?CodeType $reasonClassificationCode = null,
        array $reasonClassification = [],
        ?CodeType $requestedActionCode = null,
        array $requestedAction = [],
        ?TextType $invalidInformation = null,
        ?TextType $validInformation = null,
        ?NumericType $sequenceNumeric = null,
        array $includedNote = [],
        array $specifiedDocumentCharacteristic = [],
    ) {
        $this->referenceDateTime = $referenceDateTime;
        $this->conditionCode = $conditionCode;
        $this->reasonCode = $reasonCode;
        $this->reason = $reason;
        $this->condition = $condition;
        $this->processConditionCode = $processConditionCode;
        $this->processCondition = $processCondition;
        $this->reasonInformationCode = $reasonInformationCode;
        $this->reasonInformation = $reasonInformation;
        $this->reasonClassificationCode = $reasonClassificationCode;
        $this->reasonClassification = $reasonClassification;
        $this->requestedActionCode = $requestedActionCode;
        $this->requestedAction = $requestedAction;
        $this->invalidInformation = $invalidInformation;
        $this->validInformation = $validInformation;
        $this->sequenceNumeric = $sequenceNumeric;
        $this->includedNote = $includedNote;
        $this->specifiedDocumentCharacteristic = $specifiedDocumentCharacteristic;
    }

    public function getReferenceDateTime(): ?DateTimeType
    {
        return $this->referenceDateTime;
    }

    public function getConditionCode(): ?DocumentStatusCodeType
    {
        return $this->conditionCode;
    }

    public function getReasonCode(): ?CodeType
    {
        return $this->reasonCode;
    }

    /**
     * @return array<TextType>
     */
    public function getReason(): array
    {
        return $this->reason;
    }

    /**
     * @return array<TextType>
     */
    public function getCondition(): array
    {
        return $this->condition;
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

    public function getReasonInformationCode(): ?CodeType
    {
        return $this->reasonInformationCode;
    }

    /**
     * @return array<TextType>
     */
    public function getReasonInformation(): array
    {
        return $this->reasonInformation;
    }

    public function getReasonClassificationCode(): ?CodeType
    {
        return $this->reasonClassificationCode;
    }

    /**
     * @return array<TextType>
     */
    public function getReasonClassification(): array
    {
        return $this->reasonClassification;
    }

    public function getRequestedActionCode(): ?CodeType
    {
        return $this->requestedActionCode;
    }

    /**
     * @return array<TextType>
     */
    public function getRequestedAction(): array
    {
        return $this->requestedAction;
    }

    public function getInvalidInformation(): ?TextType
    {
        return $this->invalidInformation;
    }

    public function getValidInformation(): ?TextType
    {
        return $this->validInformation;
    }

    public function getSequenceNumeric(): ?NumericType
    {
        return $this->sequenceNumeric;
    }

    /**
     * @return array<NoteType>
     */
    public function getIncludedNote(): array
    {
        return $this->includedNote;
    }

    /**
     * @return array<DocumentCharacteristicType>
     */
    public function getSpecifiedDocumentCharacteristic(): array
    {
        return $this->specifiedDocumentCharacteristic;
    }
}
