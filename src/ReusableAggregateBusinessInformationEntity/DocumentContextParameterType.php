<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use JMS\Serializer\Annotation\XmlElement;
use JMS\Serializer\Annotation\XmlRoot;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;

/**
 * Document context parameter.
 */
#[XmlRoot(namespace: NamespaceUri::RAM->value)]
final readonly class DocumentContextParameterType
{
    /**
     * Parameter identifier.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private IDType $ID;

    public function __construct(
        IDType $ID,
    ) {
        $this->ID = $ID;
    }

    public function getID(): IDType
    {
        return $this->ID;
    }
}
