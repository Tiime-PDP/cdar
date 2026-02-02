<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Serializer;

use TiimePDP\CrossDomainAcknowledgementAndResponse\CrossDomainAcknowledgementAndResponse;
use TiimePDP\CrossDomainAcknowledgementAndResponse\Enum\NamespaceUri;
use TiimePDP\CrossDomainAcknowledgementAndResponse\ValueObjectInterface;

/**
 * UN/EDIFACT D23B Serializer to XML.
 */
final class Serializer
{
    private \DOMDocument $doc;

    /**
     * @throws SerializationException
     */
    public function serialize(CrossDomainAcknowledgementAndResponse $cdar, bool $pretty = false): string
    {
        $this->doc = new \DOMDocument('1.0', 'UTF-8');

        if ($pretty) {
            $this->doc->formatOutput = true;
            $this->doc->preserveWhiteSpace = true;
        }

        try {
            $rootElement = $this->serializeObject(
                object: $cdar,
                elementName: 'CrossDomainAcknowledgementAndResponse',
                parentNamespacePrefix: NamespaceUri::RSM->prefix(),
                isRoot: true,
            );
        } catch (\DOMException|\ReflectionException $exception) {
            throw new SerializationException(message: 'Failed to serialize CrossDomainAcknowledgementAndResponse to XML: '.$exception->getMessage(), previous: $exception);
        }

        $this->doc->appendChild($rootElement);

        $xml = $this->doc->saveXML();

        if (false === $xml) {
            throw new SerializationException('Failed to serialize CrossDomainAcknowledgementAndResponse to XML.');
        }

        return $xml;
    }

    /**
     * Serialize an object to a DOMElement with proper UN/EDIFACT structure.
     *
     * @throws \DOMException|\ReflectionException
     */
    private function serializeObject(
        object $object,
        string $elementName,
        string $parentNamespacePrefix,
        bool $isRoot = false,
    ): \DOMElement {
        $element = $this->doc->createElement($parentNamespacePrefix.':'.$elementName);

        $namespaceUri = $this->getNamespaceUriForClass($object);
        $namespacePrefix = $namespaceUri->prefix();

        if ($isRoot) {
            foreach (NamespaceUri::cases() as $namespaceUri) {
                $element->setAttributeNS(
                    namespace: 'http://www.w3.org/2000/xmlns/',
                    qualifiedName: 'xmlns:'.$namespaceUri->prefix(),
                    value: $namespaceUri->value,
                );
            }
        }

        $reflectionClass = new \ReflectionClass($object);
        $properties = $reflectionClass->getProperties(\ReflectionProperty::IS_PRIVATE);

        foreach ($properties as $property) {
            $value = $property->getValue($object);

            if (null === $value) {
                continue;
            }

            $propertyName = $property->getName();
            $elementNameForProperty = $this->elementNameFromProperty($propertyName);

            if (\is_array($value)) {
                foreach ($value as $item) {
                    if (null === $item) {
                        continue;
                    }

                    $childElement = $this->serializeValue(
                        value: $item,
                        elementName: $elementNameForProperty,
                        namespacePrefix: $namespacePrefix,
                    );
                    $element->appendChild($childElement);
                }

                continue;
            }

            $childElement = $this->serializeValue($value, $elementNameForProperty, $namespacePrefix);
            $element->appendChild($childElement);
        }

        return $element;
    }

    /**
     * Convert a property name to an element name by capitalizing the first letter.
     */
    private function elementNameFromProperty(string $propertyName): string
    {
        if ('' === $propertyName) {
            return $propertyName;
        }

        // If the property name is all uppercase, return it as is (e.g., "ID" stays "ID")
        if (\strtoupper($propertyName) === $propertyName) {
            return $propertyName;
        }

        return \ucfirst($propertyName);
    }

    /**
     * Populate a DOMElement with attributes and text content from a ValueObjectInterface.
     */
    private function populateValueObject(\DOMElement $element, ValueObjectInterface $object): void
    {
        $value = $object->getValue();
        $element->appendChild($this->doc->createTextNode($value));

        foreach (\get_class_methods($object) as $method) {
            if (!\str_starts_with($method, 'get') || 'getValue' === $method) {
                continue;
            }

            $attributeValue = $object->{$method}();
            if (null === $attributeValue) {
                continue;
            }

            $attributeName = \lcfirst(\substr($method, 3));
            if ($attributeValue instanceof \BackedEnum) {
                $element->setAttribute($attributeName, (string) $attributeValue->value);

                continue;
            }

            if (false === is_scalar($attributeValue)) {
                throw new \RuntimeException(message: 'Cannot serialize non-scalar attribute value for '.$attributeName);
            }

            $element->setAttribute($attributeName, (string) $attributeValue);
        }
    }

    /**
     * @param object|class-string $object
     *
     * @throws \ReflectionException
     */
    private function getNamespaceUriForClass(object|string $object): NamespaceUri
    {
        $reflection = new \ReflectionClass($object);
        $attributes = $reflection->getAttributes(SerializedNamespace::class);

        if ([] === $attributes) {
            throw new \RuntimeException('Missing SerializedNamespace attribute on '.$reflection->getName());
        }

        /** @var SerializedNamespace $attribute */
        $attribute = $attributes[0]->newInstance();

        return $attribute->namespace;
    }

    /**
     * @throws \DOMException|\ReflectionException
     */
    private function serializeValue(mixed $value, string $elementName, string $namespacePrefix): \DOMElement
    {
        if ($value instanceof ValueObjectInterface) {
            $child = $this->doc->createElement($namespacePrefix.':'.$elementName);
            $this->populateValueObject($child, $value);

            return $child;
        }

        if ($value instanceof \BackedEnum) {
            $child = $this->doc->createElement($namespacePrefix.':'.$elementName);
            $child->appendChild($this->doc->createTextNode((string) $value->value));

            return $child;
        }

        if (\is_object($value)) {
            return $this->serializeObject($value, $elementName, $namespacePrefix);
        }

        $prefixedName = $namespacePrefix.':'.$elementName;
        $element = $this->doc->createElement($prefixedName);

        $textValue = match (true) {
            \is_bool($value) => $value ? 'true' : 'false',
            default => throw new \RuntimeException('Unsupported value type for serialization: '.\gettype($value)),
        };

        $element->appendChild($this->doc->createTextNode($textValue));

        return $element;
    }
}
