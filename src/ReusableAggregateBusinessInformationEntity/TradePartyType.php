<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

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
     * @var array<IDType>
     */
    private array $ID;

    /**
     * Party global identifiers.
     *
     * @var array<IDType>
     */
    private array $globalID;

    /**
     * Party name.
     */
    private ?TextType $name;

    /**
     * Party role code.
     */
    private ?PartyRoleCodeType $roleCode;

    /**
     * Defined contacts.
     *
     * @var array<TradeContactType>
     */
    private array $definedTradeContact;

    /**
     * Postal address.
     */
    private ?TradeAddressType $postalTradeAddress;

    /**
     * URI universal communication.
     */
    private ?UniversalCommunicationType $URIUniversalCommunication;

    /**
     * @param array<IDType>           $ID
     * @param array<IDType>           $globalID
     * @param array<TradeContactType> $definedTradeContact
     */
    public function __construct(
        array $ID = [],
        array $globalID = [],
        ?TextType $name = null,
        ?PartyRoleCodeType $roleCode = null,
        array $definedTradeContact = [],
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
     * @return array<IDType>
     */
    public function getID(): array
    {
        return $this->ID;
    }

    /**
     * @return array<IDType>
     */
    public function getGlobalID(): array
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
     * @return array<TradeContactType>
     */
    public function getDefinedTradeContact(): array
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
