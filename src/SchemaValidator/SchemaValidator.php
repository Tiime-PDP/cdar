<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\SchemaValidator;

final readonly class SchemaValidator implements SchemaValidatorInterface
{
    /**
     * @throws \RuntimeException
     */
    public function validate(string $xml): SchemaValidationResult
    {
        if (false === extension_loaded('dom') || false === extension_loaded('libxml')) {
            throw new \RuntimeException('DOM and Libxml extensions are required to validate XML schema.');
        }

        libxml_use_internal_errors(true);
        libxml_clear_errors();

        $dom = new \DOMDocument();
        if (false === $dom->loadXML($xml)) {
            $libXmlErrors = libxml_get_errors();
            libxml_use_internal_errors(false);
            libxml_clear_errors();

            $errors = $this->mapErrors($libXmlErrors);

            return new SchemaValidationResult(
                isValid: false,
                errors: $errors
            );
        }

        $isValid = $dom->schemaValidate(__DIR__.'/../../xsd/uncefact/CrossDomainAcknowledgementAndResponse_100pD23B.xsd');

        $libXmlErrors = libxml_get_errors();
        libxml_use_internal_errors(false);
        libxml_clear_errors();

        $errors = $this->mapErrors($libXmlErrors);

        return new SchemaValidationResult(
            isValid: $isValid,
            errors: $errors,
        );
    }

    /**
     * @param \LibXMLError[] $libXmlErrors
     *
     * @return SchemaValidationError[]
     */
    private function mapErrors(array $libXmlErrors): array
    {
        $errors = [];

        foreach ($libXmlErrors as $libXmlError) {
            $errors[] = new SchemaValidationError(
                code: $libXmlError->code,
                message: trim($libXmlError->message),
                level: $libXmlError->level,
                column: $libXmlError->column,
                line: $libXmlError->line,
            );
        }

        return $errors;
    }
}
