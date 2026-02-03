<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\DateTimeType;

/**
 * Specified period.
 */
final readonly class SpecifiedPeriodType
{
    /**
     * Start date time.
     */
    private ?DateTimeType $startDateTime;

    /**
     * End date time.
     */
    private ?DateTimeType $endDateTime;

    public function __construct(
        ?DateTimeType $startDateTime = null,
        ?DateTimeType $endDateTime = null,
    ) {
        $this->startDateTime = $startDateTime;
        $this->endDateTime = $endDateTime;
    }

    public function getStartDateTime(): ?DateTimeType
    {
        return $this->startDateTime;
    }

    public function getEndDateTime(): ?DateTimeType
    {
        return $this->endDateTime;
    }
}
