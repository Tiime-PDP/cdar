<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\DocumentCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\DocumentStatusCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\DateTimeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IndicatorType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

/**
 * Exchanged document.
 */
final readonly class ExchangedDocumentType
{
    /**
     * Identifier.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IDType $ID;

    /**
     * Name.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TextType $name;

    /**
     * Type code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?DocumentCodeType $typeCode;

    /**
     * Status code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?DocumentStatusCodeType $statusCode;

    /**
     * Issue date time.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?DateTimeType $issueDateTime;

    /**
     * Language identifier.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IDType $languageID;

    /**
     * Electronic presentation indicator.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IndicatorType $electronicPresentationIndicator;

    /**
     * Version identifier.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IDType $versionID;

    /**
     * Global identifier.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IDType $globalID;

    /**
     * Included notes.
     *
     * @var array<NoteType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?array $includedNote;

    /**
     * Effective specified period.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?SpecifiedPeriodType $effectiveSpecifiedPeriod;

    /**
     * Sender party.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TradePartyType $senderTradeParty;

    /**
     * Issuer party.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TradePartyType $issuerTradeParty;

    /**
     * Recipient parties.
     *
     * @var array<TradePartyType>
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\TradePartyType>')]
    #[XmlList(entry: 'RecipientTradeParty', inline: true, namespace: NamespaceUri::RAM->value)]
    private array $recipientTradeParty;

    /**
     * @param array<NoteType>       $includedNote
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
        ?array $includedNote = null,
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
     * @return array<NoteType>|null
     */
    public function getIncludedNote(): ?array
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
