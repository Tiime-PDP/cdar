<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\SchemaValidator;

final readonly class SchemaValidationResult
{
    private bool $isValid;

    /**
     * @var SchemaValidationError[]
     */
    private array $errors;

    /**
     * @param SchemaValidationError[] $errors
     */
    public function __construct(bool $isValid, array $errors = [])
    {
        $this->isValid = $isValid;
        $this->errors = $errors;
    }

    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * @return SchemaValidationError[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
