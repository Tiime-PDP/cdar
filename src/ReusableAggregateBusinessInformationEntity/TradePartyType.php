<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\PartyRoleCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

/**
 * Trade party.
 */
#[SerializedNamespace(NamespaceUri::RAM)]
final readonly class TradePartyType
{
    /**
     * Party identifiers.
     *
     * @var array<IDType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType>')]
    #[XmlList(entry: 'ID', inline: true, namespace: NamespaceUri::RAM->value)]
    private ?array $ID;

    /**
     * Party global identifiers.
     *
     * @var array<IDType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType>')]
    #[XmlList(entry: 'GlobalID', inline: true, namespace: NamespaceUri::RAM->value)]
    private ?array $globalID;

    /**
     * Party name.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TextType $name;

    /**
     * Party role code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?PartyRoleCodeType $roleCode;

    /**
     * Defined contacts.
     *
     * @var array<TradeContactType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\TradeContactType>')]
    #[XmlList(entry: 'DefinedTradeContact', inline: true, namespace: NamespaceUri::RAM->value)]
    private ?array $definedTradeContact;

    /**
     * Postal address.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TradeAddressType $postalTradeAddress;

    /**
     * URI universal communication.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?UniversalCommunicationType $URIUniversalCommunication;

    /**
     * @param array<IDType>|null           $ID
     * @param array<IDType>|null           $globalID
     * @param array<TradeContactType>|null $definedTradeContact
     */
    public function __construct(
        ?array $ID = null,
        ?array $globalID = null,
        ?TextType $name = null,
        ?PartyRoleCodeType $roleCode = null,
        ?array $definedTradeContact = null,
        ?TradeAddressType $postalTradeAddress = null,
        ?UniversalCommunicationType $URIUniversalCommunication = null,
    ) {
        $this->ID = $ID;
        $this->globalID = $globalID;
        $this->name = $name;
        $this->roleCode = $roleCode;
        $this->definedTradeContact = $definedTradeContact;
        $this->postalTradeAddress = $postalTradeAddress;
        $this->URIUniversalCommunication = $URIUniversalCommunication;
    }

    /**
     * @return array<IDType>|null
     */
    public function getID(): ?array
    {
        return $this->ID;
    }

    /**
     * @return array<IDType>|null
     */
    public function getGlobalID(): ?array
    {
        return $this->globalID;
    }

    public function getName(): ?TextType
    {
        return $this->name;
    }

    public function getRoleCode(): ?PartyRoleCodeType
    {
        return $this->roleCode;
    }

    /**
     * @return array<TradeContactType>|null
     */
    public function getDefinedTradeContact(): ?array
    {
        return $this->definedTradeContact;
    }

    public function getPostalTradeAddress(): ?TradeAddressType
    {
        return $this->postalTradeAddress;
    }

    public function getURIUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->URIUniversalCommunication;
    }
}
