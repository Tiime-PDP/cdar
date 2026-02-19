<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Tests\Schematron;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Schematron\SaxonJarSchematronValidator;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Schematron\ValidationFailedException;

#[CoversClass(SaxonJarSchematronValidator::class)]
final class SaxonJarSchematronValidatorTest extends TestCase
{
    public function testValidateWithSuccess(): void
    {
        // Arrange
        $validator = new SaxonJarSchematronValidator(saxonJar: getenv('SAXON_JAR'));

        // Assert
        $this->expectNotToPerformAssertions();

        // Act
        $validator->validate(
            xmlFilepath: __DIR__ . '/../data/UC1_F202500003_01-CDV-200_Deposee.xml',
            xsltFilepath: __DIR__ . '/../../xslt/20260216_BR-FR-CDV-Schematron-CDAR_V1.3.0.xsl',
        );
    }

    public function testValidateWithErrors(): void
    {
        // Arrange
        $validator = new SaxonJarSchematronValidator(saxonJar: getenv('SAXON_JAR'));

        // Act
        try {
            $validator->validate(
                xmlFilepath: __DIR__ . '/../data/invalid_cdar.xml',
                xsltFilepath: __DIR__ . '/../../xslt/20260216_BR-FR-CDV-Schematron-CDAR_V1.3.0.xsl',
            );
        } catch (ValidationFailedException $validationFailedException) {
            $this->assertCount(4, $validationFailedException->errors);
            $error1 = $validationFailedException->errors[0];
            $this->assertStringContainsString('L\'identifiant du document (ram:ID) est obligatoire', $error1->getText());
            $error2 = $validationFailedException->errors[1];
            $this->assertStringContainsString('Lorsque le rôle du destinataire (MDT-59) est différent de "WK" ou "DFH"', $error2->getText());
        }
    }
}