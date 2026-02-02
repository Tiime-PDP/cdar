<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

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
    private ?IDType $ID;

    /**
     * Person name.
     */
    private ?TextType $personName;

    /**
     * Department name.
     */
    private ?TextType $departmentName;

    /**
     * Contact type code.
     */
    private ?ContactTypeCodeType $typeCode;

    /**
     * Telephone universal communications.
     *
     * @var array<UniversalCommunicationType>
     */
    private array $telephoneUniversalCommunication;

    /**
     * Fax universal communications.
     *
     * @var array<UniversalCommunicationType>
     */
    private array $faxUniversalCommunication;

    /**
     * Email URI universal communication.
     */
    private ?UniversalCommunicationType $emailURIUniversalCommunication;

    /**
     * @param array<UniversalCommunicationType> $telephoneUniversalCommunication
     * @param array<UniversalCommunicationType> $faxUniversalCommunication
     */
    public function __construct(
        ?IDType $ID = null,
        ?TextType $personName = null,
        ?TextType $departmentName = null,
        ?ContactTypeCodeType $typeCode = null,
        array $telephoneUniversalCommunication = [],
        array $faxUniversalCommunication = [],
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
     * @return array<UniversalCommunicationType>
     */
    public function getTelephoneUniversalCommunication(): array
    {
        return $this->telephoneUniversalCommunication;
    }

    /**
     * @return array<UniversalCommunicationType>
     */
    public function getFaxUniversalCommunication(): array
    {
        return $this->faxUniversalCommunication;
    }

    public function getEmailURIUniversalCommunication(): ?UniversalCommunicationType
    {
        return $this->emailURIUniversalCommunication;
    }
}
