<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Schematron;

interface SchematronValidatorInterface
{
    /**
     * @param string $xmlFilepath  the path to the XML file to validate against the business rules
     * @param string $xsltFilepath the path to the Schematron XSLT file to use for validation
     *
     * @throws ValidationFailedException
     */
    public function validate(string $xmlFilepath, string $xsltFilepath): void;
}
