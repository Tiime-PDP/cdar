<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType;

use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlValue;

/**
 * Unqualified binary object data type.
 */
final readonly class BinaryObjectType
{
    /**
     * Binary object value encoded in base64.
     */
    #[XmlValue(cdata: false)]
    private string $value;

    /**
     * Object format.
     */
    #[XmlAttribute]
    private ?string $format;

    /**
     * MIME code.
     */
    #[XmlAttribute]
    private ?string $mimeCode;

    /**
     * Encoding code.
     */
    #[XmlAttribute]
    private ?string $encodingCode;

    /**
     * Character set code.
     */
    #[XmlAttribute]
    private ?string $characterSetCode;

    /**
     * Object URI.
     */
    #[XmlAttribute]
    private ?string $uri;

    /**
     * File name.
     */
    #[XmlAttribute]
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
