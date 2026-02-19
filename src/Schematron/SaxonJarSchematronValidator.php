<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Schematron;

use Symfony\Component\Process\Process;

final readonly class SaxonJarSchematronValidator implements SchematronValidatorInterface
{
    /**
     * @throws \LogicException
     */
    public function __construct(private string $saxonJar)
    {
        if (false === class_exists(Process::class)) {
            throw new \LogicException('Symfony Process component is required to use SaxonJarSchematronValidator. Run "composer require symfony/process"');
        }

        if (false === extension_loaded('dom') || false === extension_loaded('libxml')) {
            throw new \LogicException('DOM and Libxml extensions are required to validate business rules.');
        }
    }

    public function validate(string $xmlFilepath, string $xsltFilepath): void
    {
        $process = new Process([
            'java',
            '-jar',
            $this->saxonJar,
            '-s:'.$xmlFilepath,
            '-xsl:'.$xsltFilepath,
        ]);

        $process->setTimeout(3600);
        $process->run();

        if (false === $process->isSuccessful()) {
            throw new ValidationFailedException(message: $process->getErrorOutput(), code: $process->getExitCode() ?? 1);
        }

        $output = trim($process->getOutput());

        $doc = new \DOMDocument();

        try {
            if (false === $doc->loadXML($output)) {
                throw new ValidationFailedException(message: 'Failed to parse Schematron validation output: invalid XML.');
            }
        } catch (\Throwable $throwable) {
            throw new ValidationFailedException(message: 'Failed to parse Schematron validation output: '.$throwable->getMessage(), previous: $throwable);
        }

        $xpath = new \DOMXPath($doc);
        $xpath->registerNamespace('svrl', 'http://purl.oclc.org/dsdl/svrl');

        $failedAsserts = $xpath->query('//svrl:failed-assert');

        if (false === $failedAsserts) {
            throw new ValidationFailedException(message: 'Failed to parse Schematron validation output');
        }

        $errors = [];

        /** @var \DOMNode $fa */
        foreach ($failedAsserts as $fa) {
            if (!$fa instanceof \DOMElement) {
                continue;
            }

            $location = $fa->getAttribute('location');
            $test = $fa->getAttribute('test');

            $text = null;
            $textElements = $fa->getElementsByTagName('text');
            if (0 !== $textElements->length && $textElements->item(0) instanceof \DOMElement) {
                $text = $textElements->item(0)->nodeValue;
            }

            $errors[] = new ValidationError(
                test: $test,
                id: $fa->getAttribute('id'),
                flag: $fa->getAttribute('flag'),
                location: $location,
                text: $text,
            );
        }

        if ([] === $errors) {
            return;
        }

        throw new ValidationFailedException(errors: $errors, message: 'Schematron validation failed');
    }
}
