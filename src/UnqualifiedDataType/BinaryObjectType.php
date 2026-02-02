<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

/**
 * Unqualified binary object data type.
 */
#[SerializedNamespace(NamespaceUri::UDT)]
final readonly class BinaryObjectType implements ValueObjectInterface
{
    /**
     * Binary object value encoded in base64.
     */
    private string $value;

    /**
     * Object format.
     */
    private ?string $format;

    /**
     * MIME code.
     */
    private ?string $mimeCode;

    /**
     * Encoding code.
     */
    private ?string $encodingCode;

    /**
     * Character set code.
     */
    private ?string $characterSetCode;

    /**
     * Object URI.
     */
    private ?string $uri;

    /**
     * File name.
     */
    private ?string $filename;

    public function __construct(
        string $value,
        ?string $format = null,
        ?string $mimeCode = null,
        ?string $encodingCode = null,
        ?string $characterSetCode = null,
        ?string $uri = null,
        ?string $filename = null,
    ) {
        $this->value = $value;
        $this->format = $format;
        $this->mimeCode = $mimeCode;
        $this->encodingCode = $encodingCode;
        $this->characterSetCode = $characterSetCode;
        $this->uri = $uri;
        $this->filename = $filename;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function getMimeCode(): ?string
    {
        return $this->mimeCode;
    }

    public function getEncodingCode(): ?string
    {
        return $this->encodingCode;
    }

    public function getCharacterSetCode(): ?string
    {
        return $this->characterSetCode;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }
}
