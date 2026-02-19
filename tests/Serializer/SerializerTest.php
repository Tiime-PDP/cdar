<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Tests\Serializer;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Codelist\DocumentNameCode;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Codelist\TimePointFormatCode;
use TiimePDP\CrossDomainAcknowledgementAndResponse\CrossDomainAcknowledgementAndResponse;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\DocumentCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\FormattedDateTimeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\PartyRoleCodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\AcknowledgementDocumentType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\DocumentContextParameterType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\ExchangedDocumentContextType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\ExchangedDocumentType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\ReferencedDocumentType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ReusableAggregateBusinessInformationEntity\TradePartyType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\Serializer;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\CodeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\DateTimeStringType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\DateTimeType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IDType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\IndicatorType;
use TiimePDP\CrossDomainAcknowledgementAndResponse\UnqualifiedDataType\TextType;

#[CoversClass(Serializer::class)]
final class SerializerTest extends TestCase
{
    public function testSerialize(): void
    {
        // Arrange
        $serializer = new Serializer();
        $cdar = $this->buildCdarMessage();

        // Act
        $xml = $serializer->serialize($cdar);

        // Assert
        $this->assertXmlStringEqualsXmlFile(__DIR__.'/../data/expected_serialize.xml', $xml);
    }

    public function testDeserialize(): void
    {
        // Arrange
        $serializer = new Serializer();
        /** @var string $xml */
        $xml = file_get_contents(__DIR__.'/../data/UC1_F202500003_01-CDV-200_Deposee.xml');

        // Act
        $cdar = $serializer->deserialize($xml);

        // Assert
        $exchangedDocumentContext = $cdar->getExchangedDocumentContext();
        $this->assertNotNull($exchangedDocumentContext);
        $this->assertSame('REGULATED', $exchangedDocumentContext->getBusinessProcessSpecifiedDocumentContextParameter()?->getID()->getValue());
        $this->assertSame('urn.cpro.gouv.fr:1p0:CDV:invoice', $exchangedDocumentContext->getGuidelineSpecifiedDocumentContextParameter()->getID()->getValue());

        $this->assertSame('UC1_F202500003_01-CDV-200_Deposee', $cdar->getExchangedDocument()->getName()?->getValue());
        $this->assertCount(2, $cdar->getExchangedDocument()->getRecipientTradeParty());
        $recipientTradeParty1 = $cdar->getExchangedDocument()->getRecipientTradeParty()[0];
        $this->assertNotNull($recipientTradeParty1->getGlobalID());
        $this->assertCount(1, $recipientTradeParty1->getGlobalID());
        $globalId = $recipientTradeParty1->getGlobalID()[0];
        $this->assertSame('100000009', $globalId->getValue());
        $this->assertSame('VENDEUR', $recipientTradeParty1->getName()?->getValue());

        $recipientTradeParty2 = $cdar->getExchangedDocument()->getRecipientTradeParty()[1];
        $this->assertNotNull($recipientTradeParty2->getGlobalID());
        $this->assertCount(1, $recipientTradeParty2->getGlobalID());
        $globalId2 = $recipientTradeParty2->getGlobalID()[0];
        $this->assertSame('9998', $globalId2->getValue());
        $this->assertSame('PPF', $recipientTradeParty2->getName()?->getValue());

        $this->assertCount(1, $cdar->getAcknowledgementDocument());
        $acknowledgementDocument = $cdar->getAcknowledgementDocument()[0];
        $this->assertNotNull($acknowledgementDocument->getReferenceReferencedDocument());
        $this->assertCount(1, $acknowledgementDocument->getReferenceReferencedDocument());
        $referenceReferencedDocument = $acknowledgementDocument->getReferenceReferencedDocument()[0];
        $this->assertSame('F202500003', $referenceReferencedDocument->getIssuerAssignedID()?->getValue());
        $this->assertSame('200', $referenceReferencedDocument->getProcessConditionCode()?->getValue());
        $this->assertNotNull($referenceReferencedDocument->getProcessCondition());
        $this->assertCount(1, $referenceReferencedDocument->getProcessCondition());
        $this->assertSame('Déposée', $referenceReferencedDocument->getProcessCondition()[0]->getValue());
    }

    public function testSchemaIsValid(): void
    {
        // Arrange
        $serializer = new Serializer();
        $cdar = $this->buildCdarMessage();
        $xml = $serializer->serialize($cdar);

        $dom = new \DOMDocument();
        $dom->loadXML($xml);
        libxml_use_internal_errors(true);

        // Act
        $isValid = $dom->schemaValidate(__DIR__.'/../../xsd/uncefact/CrossDomainAcknowledgementAndResponse_100pD23B.xsd');

        // Assert
        $errors = libxml_get_errors();
        libxml_use_internal_errors(false);
        $this->assertTrue($isValid, $this->formatValidationErrors($errors));
    }

    /**
     * Format XSD validation errors for display.
     *
     * @param \LibXMLError[] $errors
     */
    private function formatValidationErrors(array $errors): string
    {
        if (empty($errors)) {
            return '';
        }

        $messages = [];
        foreach ($errors as $error) {
            $messages[] = \sprintf(
                'Line %d, Column %d: %s',
                $error->line,
                $error->column,
                \trim($error->message)
            );
        }

        return "XSD validation errors:\n".\implode("\n", $messages);
    }

    private function buildCdarMessage(): CrossDomainAcknowledgementAndResponse
    {
        // ExchangedDocumentContext
        $businessProcessParam = new DocumentContextParameterType(
            ID: new IDType('REGULATED')
        );

        $guidelineParam = new DocumentContextParameterType(
            ID: new IDType('urn.cpro.gouv.fr:1p0:CDV:invoice')
        );

        $exchangedDocumentContext = new ExchangedDocumentContextType(
            guidelineSpecifiedDocumentContextParameter: $guidelineParam,
            businessProcessSpecifiedDocumentContextParameter: $businessProcessParam
        );

        // Trade parties
        $senderParty = new TradePartyType(
            roleCode: new PartyRoleCodeType('WK')
        );

        $issuerParty = new TradePartyType(
            roleCode: new PartyRoleCodeType('WK')
        );

        $recipient1 = new TradePartyType(
            globalID: [new IDType('100000009', schemeID: '0002')],
            name: new TextType('VENDEUR'),
            roleCode: new PartyRoleCodeType('SE')
        );

        $recipient2 = new TradePartyType(
            globalID: [new IDType('9998', schemeID: '0238')],
            name: new TextType('PPF'),
            roleCode: new PartyRoleCodeType('DFH')
        );

        // ExchangedDocument
        $exchangedDocument = new ExchangedDocumentType(
            recipientTradeParty: [$recipient1, $recipient2],
            name: new TextType('UC1_F202500003_01-CDV-200_Déposée'),
            issueDateTime: new DateTimeType(
                dateTimeString: new DateTimeStringType('20250701151500', '204'),
            ),
            senderTradeParty: $senderParty,
            issuerTradeParty: $issuerParty
        );

        // Referenced document
        $refDocIssuerParty = new TradePartyType(
            globalID: [new IDType('100000009')]
        );

        $referencedDocument = new ReferencedDocumentType(
            issuerAssignedID: new IDType('F202500003'),
            typeCode: new DocumentCodeType(DocumentNameCode::CODE_380->value),
            receiptDateTime: new DateTimeType(
                dateTimeString: new DateTimeStringType('20250701151500', '204'),
            ),
            formattedIssueDateTime: new FormattedDateTimeType(
                dateTimeString: new \TiimePDP\CrossDomainAcknowledgementAndResponse\QualifiedDataType\DateTimeStringType('20250701', format: TimePointFormatCode::CCYYMMDD)
            ),
            processConditionCode: new CodeType('200'),
            processCondition: [new TextType('Déposée')],
            issuerTradeParty: $refDocIssuerParty
        );

        // AcknowledgementDocument
        $acknowledgementDocument = new AcknowledgementDocumentType(
            multipleReferencesIndicator: new IndicatorType(indicator: false),
            typeCode: new DocumentCodeType(DocumentNameCode::CODE_305->value),
            issueDateTime: new DateTimeType(
                dateTimeString: new DateTimeStringType('20250701151500', '204'),
            ),
            referenceReferencedDocument: [$referencedDocument],
        );

        // Complete CDAR message
        return new CrossDomainAcknowledgementAndResponse(
            exchangedDocument: $exchangedDocument,
            acknowledgementDocument: [$acknowledgementDocument],
            exchangedDocumentContext: $exchangedDocumentContext
        );
    }
}
