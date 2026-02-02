<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Codelist;

/**
 * UNECE time point format code
 * Version D23A
 */
enum TimePointFormatCode: string
{
    /** CCYYMMDD */
    case CCYYMMDD = '102';

    /** CCYYMMDDHHMM */
    case CCYYMMDDHHMM = '203';

    /** CCYYMMDDHHMMZZZ */
    case CCYYMMDDHHMMZZZ = '205';

    /** CCYYMMDDHHMMSS */
    case CCYYMMDDHHMMSS = '209';

    /** CCYYWW */
    case CCYYWW = '502';

    /** CCYYMM */
    case CCYYMM = '602';
}
