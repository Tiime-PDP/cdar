<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;

/**
 * Document context parameter
 */
#[SerializedNamespace(NamespaceUri::RAM)]
final readonly class DocumentContextParameterType
{
    /**
     * Parameter identifier
     */
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
