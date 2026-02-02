<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\DocumentStatusCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\CodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\DateTimeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\NumericType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

/**
 * Document status.
 */
#[SerializedNamespace(NamespaceUri::RAM)]
final readonly class DocumentStatusType
{
    /**
     * Reference date time.
     */
    private ?DateTimeType $referenceDateTime;

    /**
     * Condition code.
     */
    private ?DocumentStatusCodeType $conditionCode;

    /**
     * Reason code.
     */
    private ?CodeType $reasonCode;

    /**
     * Reasons.
     *
     * @var array<TextType>
     */
    private array $reason;

    /**
     * Conditions.
     *
     * @var array<TextType>
     */
    private array $condition;

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
     * Reason information code.
     */
    private ?CodeType $reasonInformationCode;

    /**
     * Reason information.
     *
     * @var array<TextType>
     */
    private array $reasonInformation;

    /**
     * Reason classification code.
     */
    private ?CodeType $reasonClassificationCode;

    /**
     * Reason classifications.
     *
     * @var array<TextType>
     */
    private array $reasonClassification;

    /**
     * Requested action code.
     */
    private ?CodeType $requestedActionCode;

    /**
     * Requested actions.
     *
     * @var array<TextType>
     */
    private array $requestedAction;

    /**
     * Invalid information.
     */
    private ?TextType $invalidInformation;

    /**
     * Valid information.
     */
    private ?TextType $validInformation;

    /**
     * Sequence number.
     */
    private ?NumericType $sequenceNumeric;

    /**
     * Included notes.
     *
     * @var array<NoteType>
     */
    private array $includedNote;

    /**
     * Specified document characteristics.
     *
     * @var array<DocumentCharacteristicType>
     */
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
