<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\DocumentCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\DocumentStatusCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\FormattedDateTimeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\LanguageIDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\ReferenceCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\AmountType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\BinaryObjectType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\CodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\DateTimeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IndicatorType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\NumericType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

/**
 * Document référencé.
 */
final readonly class ReferencedDocumentType
{
    /**
     * Identifiant assigné par l'émetteur.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IDType $issuerAssignedID;

    /**
     * Code de statut.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?DocumentStatusCodeType $statusCode;

    /**
     * Indicateur de copie.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IndicatorType $copyIndicator;

    /**
     * Identifiant de ligne.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IDType $lineID;

    /**
     * Code de type.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?DocumentCodeType $typeCode;

    /**
     * Identifiant global.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IDType $globalID;

    /**
     * Identifiant de révision.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IDType $revisionID;

    /**
     * Nom.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TextType $name;

    /**
     * Date et heure de réception.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?DateTimeType $receiptDateTime;

    /**
     * Objets binaires joints.
     *
     * @var array<BinaryObjectType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\BinaryObjectType>')]
    #[XmlList(entry: 'AttachmentBinaryObject', inline: true, namespace: NamespaceUri::RAM->value)]
    private ?array $attachmentBinaryObject;

    /**
     * Code de type de référence.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?ReferenceCodeType $referenceTypeCode;

    /**
     * Identifiant de langue.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?LanguageIDType $languageID;

    /**
     * Descriptions.
     *
     * @var array<TextType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType>')]
    #[XmlList(entry: 'Description', inline: true, namespace: NamespaceUri::RAM->value)]
    private ?array $description;

    /**
     * Date et heure d'émission formatée.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?FormattedDateTimeType $formattedIssueDateTime;

    /**
     * Montants inclus.
     *
     * @var array<AmountType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\AmountType>')]
    #[XmlList(entry: 'IncludedAmount', inline: true, namespace: NamespaceUri::RAM->value)]
    private ?array $includedAmount;

    /**
     * Identifiant de version.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IDType $versionID;

    /**
     * Nombre total d'émissions.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?NumericType $totalIssueCountNumeric;

    /**
     * Statuts.
     *
     * @var array<TextType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType>')]
    #[XmlList(entry: 'Status', inline: true, namespace: NamespaceUri::RAM->value)]
    private ?array $status;

    /**
     * Code de condition de processus.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?CodeType $processConditionCode;

    /**
     * Conditions de processus.
     *
     * @var array<TextType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType>')]
    #[XmlList(entry: 'ProcessCondition', inline: true, namespace: NamespaceUri::RAM->value)]
    private ?array $processCondition;

    /**
     * Type.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TextType $type;

    /**
     * Partie émettrice.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TradePartyType $issuerTradeParty;

    /**
     * Parties destinataires.
     *
     * @var array<TradePartyType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\TradePartyType>')]
    #[XmlList(entry: 'RecipientTradeParty', inline: true, namespace: NamespaceUri::RAM->value)]
    private ?array $recipientTradeParty;

    /**
     * Partie expéditrice.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TradePartyType $senderTradeParty;

    /**
     * Statuts de document spécifiés.
     *
     * @var array<DocumentStatusType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\DocumentStatusType>')]
    #[XmlList(entry: 'SpecifiedDocumentStatus', inline: true, namespace: NamespaceUri::RAM->value)]
    private ?array $specifiedDocumentStatus;

    /**
     * Période de validité.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?SpecifiedPeriodType $validitySpecifiedPeriod;

    /**
     * @param array<BinaryObjectType>|null   $attachmentBinaryObject
     * @param array<TextType>|null           $description
     * @param array<AmountType>|null         $includedAmount
     * @param array<TextType>|null           $status
     * @param array<TextType>|null           $processCondition
     * @param array<TradePartyType>|null     $recipientTradeParty
     * @param array<DocumentStatusType>|null $specifiedDocumentStatus
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
        ?array $attachmentBinaryObject = null,
        ?ReferenceCodeType $referenceTypeCode = null,
        ?LanguageIDType $languageID = null,
        ?array $description = null,
        ?FormattedDateTimeType $formattedIssueDateTime = null,
        ?array $includedAmount = null,
        ?IDType $versionID = null,
        ?NumericType $totalIssueCountNumeric = null,
        ?array $status = null,
        ?CodeType $processConditionCode = null,
        ?array $processCondition = null,
        ?TextType $type = null,
        ?TradePartyType $issuerTradeParty = null,
        ?array $recipientTradeParty = null,
        ?TradePartyType $senderTradeParty = null,
        ?array $specifiedDocumentStatus = null,
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
        return $this->issuerAssignedID ?? null;
    }

    public function getStatusCode(): ?DocumentStatusCodeType
    {
        return $this->statusCode ?? null;
    }

    public function getCopyIndicator(): ?IndicatorType
    {
        return $this->copyIndicator ?? null;
    }

    public function getLineID(): ?IDType
    {
        return $this->lineID ?? null;
    }

    public function getTypeCode(): ?DocumentCodeType
    {
        return $this->typeCode ?? null;
    }

    public function getGlobalID(): ?IDType
    {
        return $this->globalID ?? null;
    }

    public function getRevisionID(): ?IDType
    {
        return $this->revisionID ?? null;
    }

    public function getName(): ?TextType
    {
        return $this->name ?? null;
    }

    public function getReceiptDateTime(): ?DateTimeType
    {
        return $this->receiptDateTime ?? null;
    }

    /**
     * @return array<BinaryObjectType>|null
     */
    public function getAttachmentBinaryObject(): ?array
    {
        return $this->attachmentBinaryObject ?? null;
    }

    public function getReferenceTypeCode(): ?ReferenceCodeType
    {
        return $this->referenceTypeCode ?? null;
    }

    public function getLanguageID(): ?LanguageIDType
    {
        return $this->languageID ?? null;
    }

    /**
     * @return array<TextType>|null
     */
    public function getDescription(): ?array
    {
        return $this->description ?? null;
    }

    public function getFormattedIssueDateTime(): ?FormattedDateTimeType
    {
        return $this->formattedIssueDateTime ?? null;
    }

    /**
     * @return array<AmountType>|null
     */
    public function getIncludedAmount(): ?array
    {
        return $this->includedAmount ?? null;
    }

    public function getVersionID(): ?IDType
    {
        return $this->versionID ?? null;
    }

    public function getTotalIssueCountNumeric(): ?NumericType
    {
        return $this->totalIssueCountNumeric ?? null;
    }

    /**
     * @return array<TextType>|null
     */
    public function getStatus(): ?array
    {
        return $this->status ?? null;
    }

    public function getProcessConditionCode(): ?CodeType
    {
        return $this->processConditionCode ?? null;
    }

    /**
     * @return array<TextType>|null
     */
    public function getProcessCondition(): ?array
    {
        return $this->processCondition ?? null;
    }

    public function getType(): ?TextType
    {
        return $this->type ?? null;
    }

    public function getIssuerTradeParty(): ?TradePartyType
    {
        return $this->issuerTradeParty ?? null;
    }

    /**
     * @return array<TradePartyType>|null
     */
    public function getRecipientTradeParty(): ?array
    {
        return $this->recipientTradeParty ?? null;
    }

    public function getSenderTradeParty(): ?TradePartyType
    {
        return $this->senderTradeParty ?? null;
    }

    /**
     * @return array<DocumentStatusType>|null
     */
    public function getSpecifiedDocumentStatus(): ?array
    {
        return $this->specifiedDocumentStatus ?? null;
    }

    public function getValiditySpecifiedPeriod(): ?SpecifiedPeriodType
    {
        return $this->validitySpecifiedPeriod ?? null;
    }
}
