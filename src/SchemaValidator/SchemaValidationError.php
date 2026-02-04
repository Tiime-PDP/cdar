<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\SchemaValidator;

final readonly class SchemaValidationError
{
    /**
     * @var int the error's code
     */
    private int $code;

    /**
     * @var string the error message, if any
     */
    private string $message;

    /**
     * @var int the severity of the error
     */
    private int $level;

    /**
     * @var int the column where the error occurred
     */
    private int $column;

    /**
     * @var int the line where the error occurred
     */
    private int $line;

    public function __construct(int $code, string $message, int $level, int $column, int $line)
    {
        $this->code = $code;
        $this->message = $message;
        $this->level = $level;
        $this->column = $column;
        $this->line = $line;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getColumn(): int
    {
        return $this->column;
    }

    public function getLine(): int
    {
        return $this->line;
    }
}
