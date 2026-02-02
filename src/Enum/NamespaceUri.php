<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Enum;

/**
 * Namespace URIs used by the CDAR serializer
 */
enum NamespaceUri: string
{
    case RSM = 'urn:un:unece:uncefact:data:standard:CrossDomainAcknowledgementAndResponse:100';
    case RAM = 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:100';
    case UDT = 'urn:un:unece:uncefact:data:standard:UnqualifiedDataType:100';
    case QDT = 'urn:un:unece:uncefact:data:standard:QualifiedDataType:100';
    case XSI = 'http://www.w3.org/2001/XMLSchema-instance';

    public function prefix(): string
    {
        return match ($this) {
            self::RSM => 'rsm',
            self::RAM => 'ram',
            self::UDT => 'udt',
            self::QDT => 'qdt',
            self::XSI => 'xsi',
        };
    }
}
