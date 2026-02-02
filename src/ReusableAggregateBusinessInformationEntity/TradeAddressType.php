<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\CountryIDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\CodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

/**
 * Trade address.
 */
#[SerializedNamespace(NamespaceUri::RAM)]
final readonly class TradeAddressType
{
    /**
     * Postal code.
     */
    private ?CodeType $postcodeCode;

    /**
     * Address line one.
     */
    private ?TextType $lineOne;

    /**
     * Address line two.
     */
    private ?TextType $lineTwo;

    /**
     * Address line three.
     */
    private ?TextType $lineThree;

    /**
     * Address line four.
     */
    private ?TextType $lineFour;

    /**
     * Address line five.
     */
    private ?TextType $lineFive;

    /**
     * Street name.
     */
    private ?TextType $streetName;

    /**
     * City name.
     */
    private ?TextType $cityName;

    /**
     * Country code.
     */
    private ?CountryIDType $countryID;

    /**
     * Country name.
     */
    private ?TextType $countryName;

    /**
     * Country sub-division code.
     */
    private ?IDType $countrySubDivisionID;

    /**
     * Country sub-division name.
     */
    private ?TextType $countrySubDivisionName;

    public function __construct(
        ?CodeType $postcodeCode = null,
        ?TextType $lineOne = null,
        ?TextType $lineTwo = null,
        ?TextType $lineThree = null,
        ?TextType $lineFour = null,
        ?TextType $lineFive = null,
        ?TextType $streetName = null,
        ?TextType $cityName = null,
        ?CountryIDType $countryID = null,
        ?TextType $countryName = null,
        ?IDType $countrySubDivisionID = null,
        ?TextType $countrySubDivisionName = null,
    ) {
        $this->postcodeCode = $postcodeCode;
        $this->lineOne = $lineOne;
        $this->lineTwo = $lineTwo;
        $this->lineThree = $lineThree;
        $this->lineFour = $lineFour;
        $this->lineFive = $lineFive;
        $this->streetName = $streetName;
        $this->cityName = $cityName;
        $this->countryID = $countryID;
        $this->countryName = $countryName;
        $this->countrySubDivisionID = $countrySubDivisionID;
        $this->countrySubDivisionName = $countrySubDivisionName;
    }

    public function getPostcodeCode(): ?CodeType
    {
        return $this->postcodeCode;
    }

    public function getLineOne(): ?TextType
    {
        return $this->lineOne;
    }

    public function getLineTwo(): ?TextType
    {
        return $this->lineTwo;
    }

    public function getLineThree(): ?TextType
    {
        return $this->lineThree;
    }

    public function getLineFour(): ?TextType
    {
        return $this->lineFour;
    }

    public function getLineFive(): ?TextType
    {
        return $this->lineFive;
    }

    public function getStreetName(): ?TextType
    {
        return $this->streetName;
    }

    public function getCityName(): ?TextType
    {
        return $this->cityName;
    }

    public function getCountryID(): ?CountryIDType
    {
        return $this->countryID;
    }

    public function getCountryName(): ?TextType
    {
        return $this->countryName;
    }

    public function getCountrySubDivisionID(): ?IDType
    {
        return $this->countrySubDivisionID;
    }

    public function getCountrySubDivisionName(): ?TextType
    {
        return $this->countrySubDivisionName;
    }
}
