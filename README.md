# Cross Domain Acknowledgement and Response (CDAR) - PHP Library

PHP library for the UN/EDIFACT D23B Cross Domain Acknowledgement and Response message.

## Description

This library provides comprehensive PHP models for handling Cross Domain Acknowledgement and Response messages according to the UN/EDIFACT D23B standard (December 2023).

## Compliance

Models are generated from official UN/CEFACT XSD schemas:

- Version: 100.D23B
- Standard: UN/EDIFACT
- Message: Cross Domain Acknowledgement and Response
- Source: https://unece.org/trade/documents/2024/08/standards/cross-domain-acknowledgement-and-response-d23b

## Requirements

- PHP 8.3 or higher

## Usage

```php
// Building CDAR message
$cdar = new \TiimePDP\CrossDomainAcknowledgementAndResponse\CrossDomainAcknowledgementAndResponse(
    // ... initialize with data
);

// Serializing CDAR message to XML
$serializer = new \TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer\Serializer();
$xmlContent = $serializer->serialize($cdar);

echo $xmlContent;
```

## Development

### Code Quality

All code has been validated with:
- PHPStan at maximum level
- PHP-CS-Fixer for code style

### Translation

All comments and documentation are in English for international compatibility.

## License

MIT
