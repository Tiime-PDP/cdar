<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity;

use JMS\Serializer\Annotation\XmlElement;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\SerializedNamespace;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IndicatorType;

/**
 * Exchanged document context.
 */
#[SerializedNamespace(NamespaceUri::RAM)]
final readonly class ExchangedDocumentContextType
{
    /**
     * Test indicator.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?IndicatorType $testIndicator;

    /**
     * Business process specified document context parameter.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private ?DocumentContextParameterType $businessProcessSpecifiedDocumentContextParameter;

    /**
     * Guideline specified document context parameter.
     */
    #[XmlElement(namespace: NamespaceUri::RAM->value)]
    private DocumentContextParameterType $guidelineSpecifiedDocumentContextParameter;

    public function __construct(
        DocumentContextParameterType $guidelineSpecifiedDocumentContextParameter,
        ?IndicatorType $testIndicator = null,
        ?DocumentContextParameterType $businessProcessSpecifiedDocumentContextParameter = null,
    ) {
        $this->testIndicator = $testIndicator;
        $this->businessProcessSpecifiedDocumentContextParameter = $businessProcessSpecifiedDocumentContextParameter;
        $this->guidelineSpecifiedDocumentContextParameter = $guidelineSpecifiedDocumentContextParameter;
    }

    public function getTestIndicator(): ?IndicatorType
    {
        return $this->testIndicator;
    }

    public function getBusinessProcessSpecifiedDocumentContextParameter(): ?DocumentContextParameterType
    {
        return $this->businessProcessSpecifiedDocumentContextParameter;
    }

    public function getGuidelineSpecifiedDocumentContextParameter(): DocumentContextParameterType
    {
        return $this->guidelineSpecifiedDocumentContextParameter;
    }
}
