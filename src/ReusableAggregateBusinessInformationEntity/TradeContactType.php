<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlList;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\ContactTypeCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

/**
 * Trade contact.
 */
#[SerializedNamespace(NamespaceUri::RAM)]
final readonly class TradeContactType
{
    /**
     * Contact identifier.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IDType $ID;

    /**
     * Person name.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TextType $personName;

    /**
     * Department name.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?TextType $departmentName;

    /**
     * Contact type code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?ContactTypeCodeType $typeCode;

    /**
     * Telephone universal communications.
     *
     * @var array<UniversalCommunicationType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\UniversalCommunicationType>')]
    #[XmlList(entry: 'TelephoneUniversalCommunication', inline: true, namespace: NamespaceUri::RAM->value)]
    private ?array $telephoneUniversalCommunication;

    /**
     * Fax universal communications.
     *
     * @var array<UniversalCommunicationType>|null
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    #[Type(name: 'array<TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\UniversalCommunicationType>')]
    #[XmlList(entry: 'FaxUniversalCommunication', inline: true, namespace: NamespaceUri::RAM->value)]
    private ?array $faxUniversalCommunication;

    /**
     * Email URI universal communication.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?UniversalCommunicationType $emailURIUniversalCommunication;

    /**
     * @param array<UniversalCommunicationType>|null $telephoneUniversalCommunication
     * @param array<UniversalCommunicationType>|null $faxUniversalCommunication
     */
    public function __construct(
        ?IDType $ID = null,
        ?TextType $personName = null,
        ?TextType $departmentName = null,
        ?ContactTypeCodeType $typeCode = null,
        ?array $telephoneUniversalCommunication = null,
        ?array $faxUniversalCommunication = null,
        ?UniversalCommunicationType $emailURIUniversalCommunication = null,
    ) {
        $this->ID = $ID;
        $this->personName = $personName;
        $this->departmentName = $departmentName;
        $this->typeCode = $typeCode;
        $this->telephoneUniversalCommunication = $telephoneUniversalCommunication;
        $this->faxUniversalCommunication = $faxUniversalCommunication;
        $this->emailURIUniversalCommunication = $emailURIUniversalCommunication;
    }

    public function getID(): ?IDType
    {
        return $this->ID;
    }

    public function getPersonName(): ?TextType
    {
        return $this->personName;
    }

    public function getDepartmentName(): ?TextType
    {
        return $this->departmentName;
    }

    public function getTypeCode(): ?ContactTypeCodeType
    {
        return $this->typeCode;
    }

    /**
     * @return array<UniversalCommunicationType>|null
     */
    public function getTelephoneUniversalCommunication(): ?array
    {
        return $this->telephoneUniversalCommunication;
    }

    /**
     * @return array<UniversalCommunicationType>|null
     */
    public function getFaxUniversalCommunication(): ?array
    {
        return $this->faxUniversalCommunication;
    }

    public function getEmailURIUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->emailURIUniversalCommunication;
    }
}
