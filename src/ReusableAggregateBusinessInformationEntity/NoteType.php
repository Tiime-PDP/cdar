<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use JMS\Serializer\Annotation\XmlElement;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\CodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

/**
 * Note.
 */
#[SerializedNamespace(NamespaceUri::RAM)]
final readonly class NoteType
{
    /**
     * Content code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?CodeType $contentCode;

    /**
     * Content text.
     *
     * @var array<TextType>
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private array $content;

    /**
     * Subject code.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?CodeType $subjectCode;

    /**
     * @param array<TextType> $content
     */
    public function __construct(
        ?CodeType $contentCode = null,
        array $content = [],
        ?CodeType $subjectCode = null,
    ) {
        $this->contentCode = $contentCode;
        $this->content = $content;
        $this->subjectCode = $subjectCode;
    }

    public function getContentCode(): ?CodeType
    {
        return $this->contentCode;
    }

    /**
     * @return array<TextType>
     */
    public function getContent(): array
    {
        return $this->content;
    }

    public function getSubjectCode(): ?CodeType
    {
        return $this->subjectCode;
    }
}
