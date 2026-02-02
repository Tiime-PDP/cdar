<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer;

use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;

#[\Attribute]
final readonly class SerializedNamespace
{
    public NamespaceUri $namespace;

    public function __construct(NamespaceUri $namespace)
    {
        $this->namespace = $namespace;
    }
}
