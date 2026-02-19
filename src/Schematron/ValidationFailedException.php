<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Schematron;

final class ValidationFailedException extends \RuntimeException
{
    /**
     * @param ValidationError[] $errors
     */
    public function __construct(
        public readonly array $errors = [],
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }
}
