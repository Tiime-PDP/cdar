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

## Contributing

We welcome contributions! Here's how you can help:

1. **Fork** the repository
2. **Create a feature branch** (`git checkout -b feature/your-feature`)
3. **Make your changes** and ensure they pass all quality checks:
   - Run PHPStan: `vendor/bin/phpstan analyse`
   - Run PHP-CS-Fixer: `vendor/bin/php-cs-fixer fix`
   - Run tests: `vendor/bin/phpunit`
4. **Commit** your changes with clear messages
5. **Push** to your branch
6. **Open a Pull Request** with a description of your changes

### Important Notes

- All code contributions must maintain **100% PHPStan compliance** at maximum level
- Follow the existing code style (enforced by PHP-CS-Fixer)
- Keep comments and documentation in English
- Any modifications to this code must be distributed under the **GPL-3.0-or-later license**

## License

GPL-3.0-or-later

This project is licensed under the GNU General Public License v3.0 or later.
Any modifications to this software must be distributed under the same GPL-3.0-or-later license.
