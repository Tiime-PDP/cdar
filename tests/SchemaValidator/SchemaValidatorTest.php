<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Tests\SchemaValidator;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use TiimePDP\CrossDomainAcknowledgementAndResponse\SchemaValidator\SchemaValidator;

#[CoversClass(SchemaValidator::class)]
final class SchemaValidatorTest extends TestCase
{
    public function testInvalidXml(): void
    {
        // Arrange
        $validator = new SchemaValidator();
        /** @var string $xml */
        $xml = file_get_contents(__DIR__.'/../data/invalid_cdar.xml');

        // Act
        $result = $validator->validate($xml);

        // Assert
        $this->assertFalse($result->isValid());
        $this->assertNotEmpty($result->getErrors());
        $this->assertCount(3, $result->getErrors());
        $error1 = $result->getErrors()[0];
        $this->assertSame(1871, $error1->getCode());
        $this->assertStringContainsString('This element is not expected. Expected is one of ( {urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEnti', $error1->getMessage());
        $this->assertSame(2, $error1->getLevel());
        $this->assertSame(0, $error1->getColumn());
        $this->assertSame(4, $error1->getLine());

        $error2 = $result->getErrors()[1];
        $this->assertSame(1871, $error2->getCode());
        $this->assertStringContainsString('This element is not expected. Expected is one of ( {urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEnti', $error2->getMessage());
        $this->assertSame(2, $error2->getLevel());
        $this->assertSame(0, $error2->getColumn());
        $this->assertSame(12, $error2->getLine());

        $error3 = $result->getErrors()[2];
        $this->assertSame(1871, $error3->getCode());
        $this->assertStringContainsString('This element is not expected. Expected is one of ( {urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEnti', $error3->getMessage());
        $this->assertSame(2, $error3->getLevel());
        $this->assertSame(0, $error3->getColumn());
        $this->assertSame(37, $error3->getLine());
    }

    public function testValidXml(): void
    {
        // Arrange
        $validator = new SchemaValidator();
        /** @var string $xml */
        $xml = file_get_contents(__DIR__.'/../data/UC1_F202500003_01-CDV-200_Deposee.xml');

        // Act
        $result = $validator->validate($xml);

        // Assert
        $this->assertTrue($result->isValid());
        $this->assertEmpty($result->getErrors());
    }
}
