# Copilot Instructions for CDAR PHP Library

## Project Overview

This is a PHP library for handling UN/EDIFACT D23B Cross Domain Acknowledgement and Response (CDAR) messages. Models are auto-generated from official UN/CEFACT XSD schemas.

## Tech Stack

- **Language**: PHP 8.3+
- **Serialization**: JMS Serializer 3.32+
- **Testing**: PHPUnit 12.5+
- **Static Analysis**: PHPStan 2.1+ (max level)
- **Code Style**: PHP-CS-Fixer 3.93+ with Symfony rules
- **Refactoring**: Rector

## Code Quality Standards

### PHPStan Compliance
- **CRITICAL**: All code MUST maintain 100% PHPStan compliance at maximum level
- Run `vendor/bin/phpstan analyse` or `composer phpstan` before committing
- No PHPStan errors are acceptable

### Code Style
- Follow Symfony coding standards enforced by PHP-CS-Fixer
- Run `vendor/bin/php-cs-fixer fix` or `composer cs-fix` to auto-format code
- Use `composer cs-check` to verify compliance without making changes
- Configuration: `.php-cs-fixer.dist.php` with `@Symfony` rules

### Type Safety
- Use strict types declaration: `declare(strict_types=1);` in all PHP files
- Always use type hints for parameters, return types, and properties
- Prefer specific types over mixed types
- Document complex types with PHPDoc when beneficial

## Namespace and Autoloading

- **Root namespace**: `TiimePDP\CrossDomainAcknowledgementAndResponse`
- Follow PSR-4 autoloading standards
- Source files in `src/` directory
- Test files in `tests/` directory with `Tests` sub-namespace

## Testing

- Write PHPUnit tests for all new functionality
- Run tests with `vendor/bin/phpunit` or `composer test`
- Tests should be in `tests/` directory matching the `src/` structure
- Configuration: `phpunit.xml`

## Development Workflow

### Quality Checks
Run the complete quality check suite:
```bash
composer quality-check
```

This executes:
1. Rector refactoring checks
2. PHP-CS-Fixer style checks
3. PHPStan static analysis
4. PHPUnit tests

### Individual Commands
- **Rector**: `composer rector` or `./tools/bin/rector`
- **CS Fix**: `composer cs-fix`
- **CS Check**: `composer cs-check`
- **PHPStan**: `composer phpstan`
- **Tests**: `composer test`

## License and Contributions

- **License**: GPL-3.0-or-later
- All modifications must be distributed under the same GPL-3.0-or-later license
- Keep all comments and documentation in English
- Ensure clear, descriptive commit messages

## Key Architectural Patterns

- Models represent UN/EDIFACT D23B standard structures
- Use JMS Serializer for XML serialization/deserialization
- Schema validation available via `SchemaValidator`
- Models organized by:
  - `Codelist`: Code list types
  - `Enum`: Enumeration types
  - `QualifiedDataType`: Qualified data types
  - `UnqualifiedDataType`: Unqualified data types
  - `ReusableAggregateBusinessInformationEntity`: Aggregate entities

## Important Conventions

1. **No Breaking Changes**: This is a library - maintain backward compatibility
2. **Standard Compliance**: Follow UN/EDIFACT D23B specifications strictly
3. **Minimal Dependencies**: Only add dependencies if absolutely necessary
4. **Documentation**: Update README.md for user-facing changes
5. **Performance**: Consider performance implications for large XML documents

## Do Not

- Do not lower PHPStan level or ignore PHPStan errors
- Do not deviate from Symfony coding standards
- Do not add code without proper type hints
- Do not commit code that fails quality checks
- Do not modify auto-generated model files without regenerating from XSD
- Do not change the license terms
