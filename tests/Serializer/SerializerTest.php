<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Tests\Serializer;

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

final class SerializerTest extends TestCase
{
    private Serializer $serializer;

    protected function setUp(): void
    {
        $this->serializer = new Serializer();
    }

    /**
     * Test basic serialization of a simple message.
     */
    public function testSerializeBasicMessage(): void
    {
        $document = new ExchangedDocumentType(
            recipientTradeParty: [],
            ID: new IDType('DOC-001'),
            name: new TextType('Test Document'),
        );

        $cdar = new CrossDomainAcknowledgementAndResponse(
            exchangedDocument: $document,
            acknowledgementDocument: [],
        );

        $xml = $this->serializer->serialize($cdar);

        $this->assertStringContainsString('<?xml version="1.0" encoding="UTF-8"?>', $xml);
        $this->assertStringContainsString('<rsm:CrossDomainAcknowledgementAndResponse', $xml);
        $this->assertStringContainsString('</rsm:CrossDomainAcknowledgementAndResponse>', $xml);
    }

    /**
     * Test serialization includes namespaces.
     */
    public function testSerializeIncludesNamespaces(): void
    {
        $document = new ExchangedDocumentType(
            recipientTradeParty: [],
        );

        $cdar = new CrossDomainAcknowledgementAndResponse(
            exchangedDocument: $document,
            acknowledgementDocument: [],
        );

        $xml = $this->serializer->serialize($cdar);

        $this->assertStringContainsString('xmlns:rsm=', $xml);
        $this->assertStringContainsString('xmlns:ram=', $xml);
        $this->assertStringContainsString('xmlns:udt=', $xml);
        $this->assertStringContainsString('xmlns:qdt=', $xml);
    }

    /**
     * Test serialization with nested objects.
     */
    public function testSerializeNestedObjects(): void
    {
        $sender = new TradePartyType(
            ID: [],
            globalID: [],
            name: new TextType('Sender Company'),
        );

        $recipient = new TradePartyType(
            ID: [],
            globalID: [],
            name: new TextType('Recipient Company'),
        );

        $document = new ExchangedDocumentType(
            recipientTradeParty: [$recipient],
            ID: new IDType('DOC-001'),
            senderTradeParty: $sender,
        );

        $cdar = new CrossDomainAcknowledgementAndResponse(
            exchangedDocument: $document,
            acknowledgementDocument: [],
        );

        $xml = $this->serializer->serialize($cdar);

        $this->assertStringContainsString('<ram:SenderTradeParty>', $xml);
        $this->assertStringContainsString('<ram:RecipientTradeParty>', $xml);
        $this->assertStringContainsString('Sender Company', $xml);
        $this->assertStringContainsString('Recipient Company', $xml);
    }

    /**
     * Test null values are omitted.
     */
    public function testSerializeOmitsNullValues(): void
    {
        $document = new ExchangedDocumentType(
            recipientTradeParty: [],
            ID: new IDType('DOC-001'),
            // name is null
            // senderTradeParty is null
        );

        $cdar = new CrossDomainAcknowledgementAndResponse(
            exchangedDocument: $document,
            acknowledgementDocument: [],
            // exchangedDocumentContext is null
        );

        $xml = $this->serializer->serialize($cdar);

        // Should contain the ID value
        $this->assertStringContainsString('DOC-001', $xml);
        // Should not contain elements for null properties
        $this->assertStringNotContainsString('<rsm:Name', $xml);
        $this->assertStringNotContainsString('<ram:SenderTradeParty', $xml);
        $this->assertStringNotContainsString('<rsm:ExchangedDocumentContext', $xml);
    }

    /**
     * Test XML is well-formed.
     */
    public function testSerializedXmlIsWellFormed(): void
    {
        $document = new ExchangedDocumentType(
            recipientTradeParty: [],
            ID: new IDType('DOC-001'),
            name: new TextType('Test'),
        );

        $cdar = new CrossDomainAcknowledgementAndResponse(
            exchangedDocument: $document,
            acknowledgementDocument: [],
        );

        $xml = $this->serializer->serialize($cdar);

        // Try to load the XML to verify it's well-formed
        $doc = new \DOMDocument();
        $result = @$doc->loadXML($xml);

        $this->assertTrue($result, 'Generated XML is not well-formed');
    }

    /**
     * Test serialization with multiple items in array.
     */
    public function testSerializeArrayOfObjects(): void
    {
        $recipient1 = new TradePartyType(
            ID: [],
            globalID: [],
            name: new TextType('Recipient 1'),
        );

        $recipient2 = new TradePartyType(
            ID: [],
            globalID: [],
            name: new TextType('Recipient 2'),
        );

        $document = new ExchangedDocumentType(
            recipientTradeParty: [$recipient1, $recipient2],
        );

        $cdar = new CrossDomainAcknowledgementAndResponse(
            exchangedDocument: $document,
            acknowledgementDocument: [],
        );

        $xml = $this->serializer->serialize($cdar);

        // Count occurrences of RecipientTradeParty (opening tags only)
        $count = \substr_count($xml, '<ram:RecipientTradeParty');
        $this->assertEquals(2, $count, 'Should have 2 RecipientTradeParty elements');

        // Verify both recipients are present
        $this->assertStringContainsString('Recipient 1', $xml);
        $this->assertStringContainsString('Recipient 2', $xml);
    }

    /**
     * Test complete CDAR message serialization with real data
     * Based on UC1_F202500003_01-CDV-200_Deposee.xml.
     */
    public function testSerializeCompleteRealMessage(): void
    {
        $cdar = $this->buildRealCdarMessage();
        $xml = $this->serializer->serialize($cdar, true);

        // Assert XML well-formed
        $doc = new \DOMDocument();
        $result = $doc->loadXML($xml);
        $this->assertTrue($result, 'Generated XML should be well-formed');

        // Assert basic structure
        $this->assertStringContainsString('<?xml version="1.0" encoding="UTF-8"?>', $xml);
        $this->assertStringContainsString('<rsm:CrossDomainAcknowledgementAndResponse', $xml);
        $this->assertStringContainsString('<rsm:ExchangedDocumentContext', $xml);
        $this->assertStringContainsString('<rsm:ExchangedDocument', $xml);
        $this->assertStringContainsString('<rsm:AcknowledgementDocument', $xml);

        // rsm elements like Name, IssueDateTime, ID
        $this->assertStringContainsString('<ram:Name', $xml);
        $this->assertStringContainsString('<ram:IssueDateTime', $xml);
        $this->assertStringContainsString('<ram:ID', $xml);

        // ram elements under trade parties and referenced document
        $this->assertStringContainsString('<ram:GlobalID', $xml);
        $this->assertStringContainsString('<ram:IssuerAssignedID', $xml);

        // Assert all namespaces present
        $this->assertStringContainsString('xmlns:rsm=', $xml);
        $this->assertStringContainsString('xmlns:ram=', $xml);
        $this->assertStringContainsString('xmlns:udt=', $xml);
        $this->assertStringContainsString('xmlns:qdt=', $xml);

        // Assert key data present
        $this->assertStringContainsString('REGULATED', $xml);
        $this->assertStringContainsString('urn.cpro.gouv.fr:1p0:CDV:invoice', $xml);
        $this->assertStringContainsString('UC1_F202500003_01-CDV-200_Déposée', $xml);
        $this->assertStringContainsString('100000009', $xml);
        $this->assertStringContainsString('VENDEUR', $xml);
        $this->assertStringContainsString('F202500003', $xml);
        $this->assertStringContainsString('Déposée', $xml);
    }

    /**
     * Build a complete CDAR message with real data
     * Based on UC1_F202500003_01-CDV-200_Deposee.xml.
     */
    private function buildRealCdarMessage(): CrossDomainAcknowledgementAndResponse
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
            ID: [],
            globalID: [],
            roleCode: new PartyRoleCodeType('WK')
        );

        $issuerParty = new TradePartyType(
            ID: [],
            globalID: [],
            roleCode: new PartyRoleCodeType('WK')
        );

        $recipient1 = new TradePartyType(
            ID: [],
            globalID: [new IDType('100000009', schemeID: '0002')],
            name: new TextType('VENDEUR'),
            roleCode: new PartyRoleCodeType('SE')
        );

        $recipient2 = new TradePartyType(
            ID: [],
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
            ID: [],
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
