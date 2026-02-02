<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\AmountType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\CodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\DateTimeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IndicatorType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\MeasureType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\NumericType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\PercentType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\QuantityType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

/**
 * Document characteristic.
 */
#[SerializedNamespace(NamespaceUri::RAM)]
final readonly class DocumentCharacteristicType
{
    /**
     * Identifier.
     */
    private ?IDType $ID;

    /**
     * Type code.
     */
    private ?CodeType $typeCode;

    /**
     * Value changed indicator.
     */
    private ?IndicatorType $valueChangedIndicator;

    /**
     * Value adjustment direction code.
     */
    private ?CodeType $valueAdjustmentDirectionCode;

    /**
     * Names.
     *
     * @var array<TextType>
     */
    private array $name;

    /**
     * Descriptions.
     *
     * @var array<TextType>
     */
    private array $description;

    /**
     * Location.
     */
    private ?TextType $location;

    /**
     * Values.
     *
     * @var array<TextType>
     */
    private array $value;

    /**
     * Value amount.
     */
    private ?AmountType $valueAmount;

    /**
     * Value measure.
     */
    private ?MeasureType $valueMeasure;

    /**
     * Value date time.
     */
    private ?DateTimeType $valueDateTime;

    /**
     * Value code.
     */
    private ?CodeType $valueCode;

    /**
     * Value quantity.
     */
    private ?QuantityType $valueQuantity;

    /**
     * Value numeric.
     */
    private ?NumericType $valueNumeric;

    /**
     * Value percent.
     */
    private ?PercentType $valuePercent;

    /**
     * @param array<TextType> $name
     * @param array<TextType> $description
     * @param array<TextType> $value
     */
    public function __construct(
        ?IDType $ID = null,
        ?CodeType $typeCode = null,
        ?IndicatorType $valueChangedIndicator = null,
        ?CodeType $valueAdjustmentDirectionCode = null,
        array $name = [],
        array $description = [],
        ?TextType $location = null,
        array $value = [],
        ?AmountType $valueAmount = null,
        ?MeasureType $valueMeasure = null,
        ?DateTimeType $valueDateTime = null,
        ?CodeType $valueCode = null,
        ?QuantityType $valueQuantity = null,
        ?NumericType $valueNumeric = null,
        ?PercentType $valuePercent = null,
    ) {
        $this->ID = $ID;
        $this->typeCode = $typeCode;
        $this->valueChangedIndicator = $valueChangedIndicator;
        $this->valueAdjustmentDirectionCode = $valueAdjustmentDirectionCode;
        $this->name = $name;
        $this->description = $description;
        $this->location = $location;
        $this->value = $value;
        $this->valueAmount = $valueAmount;
        $this->valueMeasure = $valueMeasure;
        $this->valueDateTime = $valueDateTime;
        $this->valueCode = $valueCode;
        $this->valueQuantity = $valueQuantity;
        $this->valueNumeric = $valueNumeric;
        $this->valuePercent = $valuePercent;
    }

    public function getID(): ?IDType
    {
        return $this->ID;
    }

    public function getTypeCode(): ?CodeType
    {
        return $this->typeCode;
    }

    public function getValueChangedIndicator(): ?IndicatorType
    {
        return $this->valueChangedIndicator;
    }

    public function getValueAdjustmentDirectionCode(): ?CodeType
    {
        return $this->valueAdjustmentDirectionCode;
    }

    /**
     * @return array<TextType>
     */
    public function getName(): array
    {
        return $this->name;
    }

    /**
     * @return array<TextType>
     */
    public function getDescription(): array
    {
        return $this->description;
    }

    public function getLocation(): ?TextType
    {
        return $this->location;
    }

    /**
     * @return array<TextType>
     */
    public function getValue(): array
    {
        return $this->value;
    }

    public function getValueAmount(): ?AmountType
    {
        return $this->valueAmount;
    }

    public function getValueMeasure(): ?MeasureType
    {
        return $this->valueMeasure;
    }

    public function getValueDateTime(): ?DateTimeType
    {
        return $this->valueDateTime;
    }

    public function getValueCode(): ?CodeType
    {
        return $this->valueCode;
    }

    public function getValueQuantity(): ?QuantityType
    {
        return $this->valueQuantity;
    }

    public function getValueNumeric(): ?NumericType
    {
        return $this->valueNumeric;
    }

    public function getValuePercent(): ?PercentType
    {
        return $this->valuePercent;
    }
}
