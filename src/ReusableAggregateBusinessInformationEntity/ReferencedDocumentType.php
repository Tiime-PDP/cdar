<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\DocumentCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\DocumentStatusCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\FormattedDateTimeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\LanguageIDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\ReferenceCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\AmountType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\BinaryObjectType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\CodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\DateTimeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IndicatorType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\NumericType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

/**
 * Document référencé
 */
#[SerializedNamespace(NamespaceUri::RAM)]
final readonly class ReferencedDocumentType
{
    /**
     * Identifiant assigné par l'émetteur
     */
    private ?IDType $issuerAssignedID;

    /**
     * Code de statut
     */
    private ?DocumentStatusCodeType $statusCode;

    /**
     * Indicateur de copie
     */
    private ?IndicatorType $copyIndicator;

    /**
     * Identifiant de ligne
     */
    private ?IDType $lineID;

    /**
     * Code de type
     */
    private ?DocumentCodeType $typeCode;

    /**
     * Identifiant global
     */
    private ?IDType $globalID;

    /**
     * Identifiant de révision
     */
    private ?IDType $revisionID;

    /**
     * Nom
     */
    private ?TextType $name;

    /**
     * Date et heure de réception
     */
    private ?DateTimeType $receiptDateTime;

    /**
     * Objets binaires joints
     * @var array<BinaryObjectType>
     */
    private array $attachmentBinaryObject;

    /**
     * Code de type de référence
     */
    private ?ReferenceCodeType $referenceTypeCode;

    /**
     * Identifiant de langue
     */
    private ?LanguageIDType $languageID;

    /**
     * Descriptions
     * @var array<TextType>
     */
    private array $description;

    /**
     * Date et heure d'émission formatée
     */
    private ?FormattedDateTimeType $formattedIssueDateTime;

    /**
     * Montants inclus
     * @var array<AmountType>
     */
    private array $includedAmount;

    /**
     * Identifiant de version
     */
    private ?IDType $versionID;

    /**
     * Nombre total d'émissions
     */
    private ?NumericType $totalIssueCountNumeric;

    /**
     * Statuts
     * @var array<TextType>
     */
    private array $status;

    /**
     * Code de condition de processus
     */
    private ?CodeType $processConditionCode;

    /**
     * Conditions de processus
     * @var array<TextType>
     */
    private array $processCondition;

    /**
     * Type
     */
    private ?TextType $type;

    /**
     * Partie émettrice
     */
    private ?TradePartyType $issuerTradeParty;

    /**
     * Parties destinataires
     * @var array<TradePartyType>
     */
    private array $recipientTradeParty;

    /**
     * Partie expéditrice
     */
    private ?TradePartyType $senderTradeParty;

    /**
     * Statuts de document spécifiés
     * @var array<DocumentStatusType>
     */
    private array $specifiedDocumentStatus;

    /**
     * Période de validité
     */
    private ?SpecifiedPeriodType $validitySpecifiedPeriod;

    /**
     * @param array<BinaryObjectType> $attachmentBinaryObject
     * @param array<TextType> $description
     * @param array<AmountType> $includedAmount
     * @param array<TextType> $status
     * @param array<TextType> $processCondition
     * @param array<TradePartyType> $recipientTradeParty
     * @param array<DocumentStatusType> $specifiedDocumentStatus
     */
    public function __construct(
        ?IDType $issuerAssignedID = null,
        ?DocumentStatusCodeType $statusCode = null,
        ?IndicatorType $copyIndicator = null,
        ?IDType $lineID = null,
        ?DocumentCodeType $typeCode = null,
        ?IDType $globalID = null,
        ?IDType $revisionID = null,
        ?TextType $name = null,
        ?DateTimeType $receiptDateTime = null,
        array $attachmentBinaryObject = [],
        ?ReferenceCodeType $referenceTypeCode = null,
        ?LanguageIDType $languageID = null,
        array $description = [],
        ?FormattedDateTimeType $formattedIssueDateTime = null,
        array $includedAmount = [],
        ?IDType $versionID = null,
        ?NumericType $totalIssueCountNumeric = null,
        array $status = [],
        ?CodeType $processConditionCode = null,
        array $processCondition = [],
        ?TextType $type = null,
        ?TradePartyType $issuerTradeParty = null,
        array $recipientTradeParty = [],
        ?TradePartyType $senderTradeParty = null,
        array $specifiedDocumentStatus = [],
        ?SpecifiedPeriodType $validitySpecifiedPeriod = null,
    ) {
        $this->issuerAssignedID = $issuerAssignedID;
        $this->statusCode = $statusCode;
        $this->copyIndicator = $copyIndicator;
        $this->lineID = $lineID;
        $this->typeCode = $typeCode;
        $this->globalID = $globalID;
        $this->revisionID = $revisionID;
        $this->name = $name;
        $this->receiptDateTime = $receiptDateTime;
        $this->attachmentBinaryObject = $attachmentBinaryObject;
        $this->referenceTypeCode = $referenceTypeCode;
        $this->languageID = $languageID;
        $this->description = $description;
        $this->formattedIssueDateTime = $formattedIssueDateTime;
        $this->includedAmount = $includedAmount;
        $this->versionID = $versionID;
        $this->totalIssueCountNumeric = $totalIssueCountNumeric;
        $this->status = $status;
        $this->processConditionCode = $processConditionCode;
        $this->processCondition = $processCondition;
        $this->type = $type;
        $this->issuerTradeParty = $issuerTradeParty;
        $this->recipientTradeParty = $recipientTradeParty;
        $this->senderTradeParty = $senderTradeParty;
        $this->specifiedDocumentStatus = $specifiedDocumentStatus;
        $this->validitySpecifiedPeriod = $validitySpecifiedPeriod;
    }

    public function getIssuerAssignedID(): ?IDType
    {
        return $this->issuerAssignedID;
    }

    public function getStatusCode(): ?DocumentStatusCodeType
    {
        return $this->statusCode;
    }

    public function getCopyIndicator(): ?IndicatorType
    {
        return $this->copyIndicator;
    }

    public function getLineID(): ?IDType
    {
        return $this->lineID;
    }

    public function getTypeCode(): ?DocumentCodeType
    {
        return $this->typeCode;
    }

    public function getGlobalID(): ?IDType
    {
        return $this->globalID;
    }

    public function getRevisionID(): ?IDType
    {
        return $this->revisionID;
    }

    public function getName(): ?TextType
    {
        return $this->name;
    }

    public function getReceiptDateTime(): ?DateTimeType
    {
        return $this->receiptDateTime;
    }

    /**
     * @return array<BinaryObjectType>
     */
    public function getAttachmentBinaryObject(): array
    {
        return $this->attachmentBinaryObject;
    }

    public function getReferenceTypeCode(): ?ReferenceCodeType
    {
        return $this->referenceTypeCode;
    }

    public function getLanguageID(): ?LanguageIDType
    {
        return $this->languageID;
    }

    /**
     * @return array<TextType>
     */
    public function getDescription(): array
    {
        return $this->description;
    }

    public function getFormattedIssueDateTime(): ?FormattedDateTimeType
    {
        return $this->formattedIssueDateTime;
    }

    /**
     * @return array<AmountType>
     */
    public function getIncludedAmount(): array
    {
        return $this->includedAmount;
    }

    public function getVersionID(): ?IDType
    {
        return $this->versionID;
    }

    public function getTotalIssueCountNumeric(): ?NumericType
    {
        return $this->totalIssueCountNumeric;
    }

    /**
     * @return array<TextType>
     */
    public function getStatus(): array
    {
        return $this->status;
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

    public function getType(): ?TextType
    {
        return $this->type;
    }

    public function getIssuerTradeParty(): ?TradePartyType
    {
        return $this->issuerTradeParty;
    }

    /**
     * @return array<TradePartyType>
     */
    public function getRecipientTradeParty(): array
    {
        return $this->recipientTradeParty;
    }

    public function getSenderTradeParty(): ?TradePartyType
    {
        return $this->senderTradeParty;
    }

    /**
     * @return array<DocumentStatusType>
     */
    public function getSpecifiedDocumentStatus(): array
    {
        return $this->specifiedDocumentStatus;
    }

    public function getValiditySpecifiedPeriod(): ?SpecifiedPeriodType
    {
        return $this->validitySpecifiedPeriod;
    }
}
