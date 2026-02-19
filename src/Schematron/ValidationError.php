<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Schematron;

final readonly class ValidationError
{
    private string $test;

    private string $id;

    private string $flag;

    private string $location;

    private ?string $text;

    public function __construct(
        string $test,
        string $id,
        string $flag,
        string $location,
        ?string $text,
    ) {
        $this->test = $test;
        $this->id = $id;
        $this->flag = $flag;
        $this->location = $location;
        $this->text = $text;
    }

    public function getTest(): string
    {
        return $this->test;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFlag(): string
    {
        return $this->flag;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getText(): ?string
    {
        return $this->text;
    }
}
