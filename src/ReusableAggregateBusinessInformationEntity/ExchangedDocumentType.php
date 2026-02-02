<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\DocumentCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\DocumentStatusCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\DateTimeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IndicatorType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

/**
 * Exchanged document
 */
#[SerializedNamespace(NamespaceUri::RAM)]
final readonly class ExchangedDocumentType
{
    /**
     * Identifier
     */
    private ?IDType $ID;

    /**
     * Name
     */
    private ?TextType $name;

    /**
     * Type code
     */
    private ?DocumentCodeType $typeCode;

    /**
     * Status code
     */
    private ?DocumentStatusCodeType $statusCode;

    /**
     * Issue date time
     */
    private ?DateTimeType $issueDateTime;

    /**
     * Language identifier
     */
    private ?IDType $languageID;

    /**
     * Electronic presentation indicator
     */
    private ?IndicatorType $electronicPresentationIndicator;

    /**
     * Version identifier
     */
    private ?IDType $versionID;

    /**
     * Global identifier
     */
    private ?IDType $globalID;

    /**
     * Included notes
     * @var array<NoteType>
     */
    private array $includedNote;

    /**
     * Effective specified period
     */
    private ?SpecifiedPeriodType $effectiveSpecifiedPeriod;

    /**
     * Sender party
     */
    private ?TradePartyType $senderTradeParty;

    /**
     * Issuer party
     */
    private ?TradePartyType $issuerTradeParty;

    /**
     * Recipient parties
     * @var array<TradePartyType>
     */
    private array $recipientTradeParty;

    /**
     * @param array<NoteType> $includedNote
     * @param array<TradePartyType> $recipientTradeParty
     */
    public function __construct(
        array $recipientTradeParty,
        ?IDType $ID = null,
        ?TextType $name = null,
        ?DocumentCodeType $typeCode = null,
        ?DocumentStatusCodeType $statusCode = null,
        ?DateTimeType $issueDateTime = null,
        ?IDType $languageID = null,
        ?IndicatorType $electronicPresentationIndicator = null,
        ?IDType $versionID = null,
        ?IDType $globalID = null,
        array $includedNote = [],
        ?SpecifiedPeriodType $effectiveSpecifiedPeriod = null,
        ?TradePartyType $senderTradeParty = null,
        ?TradePartyType $issuerTradeParty = null,
    ) {
        $this->ID = $ID;
        $this->name = $name;
        $this->typeCode = $typeCode;
        $this->statusCode = $statusCode;
        $this->issueDateTime = $issueDateTime;
        $this->languageID = $languageID;
        $this->electronicPresentationIndicator = $electronicPresentationIndicator;
        $this->versionID = $versionID;
        $this->globalID = $globalID;
        $this->includedNote = $includedNote;
        $this->effectiveSpecifiedPeriod = $effectiveSpecifiedPeriod;
        $this->senderTradeParty = $senderTradeParty;
        $this->issuerTradeParty = $issuerTradeParty;
        $this->recipientTradeParty = $recipientTradeParty;
    }

    public function getID(): ?IDType
    {
        return $this->ID;
    }

    public function getName(): ?TextType
    {
        return $this->name;
    }

    public function getTypeCode(): ?DocumentCodeType
    {
        return $this->typeCode;
    }

    public function getStatusCode(): ?DocumentStatusCodeType
    {
        return $this->statusCode;
    }

    public function getIssueDateTime(): ?DateTimeType
    {
        return $this->issueDateTime;
    }

    public function getLanguageID(): ?IDType
    {
        return $this->languageID;
    }

    public function getElectronicPresentationIndicator(): ?IndicatorType
    {
        return $this->electronicPresentationIndicator;
    }

    public function getVersionID(): ?IDType
    {
        return $this->versionID;
    }

    public function getGlobalID(): ?IDType
    {
        return $this->globalID;
    }

    /**
     * @return array<NoteType>
     */
    public function getIncludedNote(): array
    {
        return $this->includedNote;
    }

    public function getEffectiveSpecifiedPeriod(): ?SpecifiedPeriodType
    {
        return $this->effectiveSpecifiedPeriod;
    }

    public function getSenderTradeParty(): ?TradePartyType
    {
        return $this->senderTradeParty;
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
}
