<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\SchemaValidator;

interface SchemaValidatorInterface
{
    public function validate(string $xml): SchemaValidationResult;
}
