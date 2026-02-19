# SaxonJarSchematronValidator

The `SaxonJarSchematronValidator` is a Schematron validator implementation that uses the Saxon XSLT processor (Java edition) to validate XML documents against Schematron rules compiled as XSLT stylesheets.

## Overview

Schematron is a rule-based validation language for XML documents. Unlike XSD (XML Schema Definition), which validates structure, Schematron validates business rules and constraints using XPath expressions.

In this implementation:
1. Schematron rules are pre-compiled into an XSLT stylesheet
2. Saxon XSLT processor transforms the XML document using the XSLT rules
3. The output is an SVRL (Schematron Validation Report Language) document
4. Failed assertions are extracted and reported as validation errors

## Requirements

### System Requirements

- **Java Runtime Environment (JRE)** 8 or higher
  - The `java` command must be available in your system PATH
  - Check with: `java -version`

- **Saxon-HE JAR file** (Home Edition, version 9.x or higher)
  - Download from: [Saxonica Downloads](https://www.saxonica.com/download/java.xml)

### PHP Requirements

- **PHP 8.3** or higher
- **Required PHP extensions:**
  - `dom` - for parsing SVRL XML output
  - `libxml` - for XML handling

### Composer Dependencies

```bash
composer require symfony/process
```

The `symfony/process` component is used to execute the Java Saxon processor as a subprocess.

## Usage

### Basic Usage

```php
<?php

use TiimePDP\CrossDomainAcknowledgementAndResponse\Schematron\SaxonJarSchematronValidator;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Schematron\ValidationFailedException;

// Create validator instance with path to Saxon JAR
$validator = new SaxonJarSchematronValidator(
    saxonJar: '/usr/local/lib/saxon-he.jar'
);

try {
    // Validate XML file against Schematron XSLT rules
    $validator->validate(
        xmlFilepath: '/path/to/document.xml',
        xsltFilepath: '/path/to/schematron-rules.xsl'
    );
    
    echo "Validation successful!\n";
    
} catch (ValidationFailedException $e) {
    echo "Validation failed: " . $e->getMessage() . "\n";
    
    // Access validation errors
    foreach ($e->errors as $error) {
        echo sprintf(
            "Error [%s]: %s\n  Location: %s\n  Test: %s\n",
            $error->getId(),
            $error->getText(),
            $error->getLocation(),
            $error->getTest()
        );
    }
}
```

