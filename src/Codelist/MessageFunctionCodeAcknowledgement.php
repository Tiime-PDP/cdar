<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Codelist;

/**
 * UNECE message function code - Acknowledgement
 * Version D23A.
 */
enum MessageFunctionCodeAcknowledgement: string
{
    /** Replace */
    case REPLACE = '5';

    /** Confirmation */
    case CONFIRMATION = '6';

    /** Duplicate */
    case DUPLICATE = '7';

    /** Original */
    case ORIGINAL = '9';

    /** Copy */
    case COPY = '18';

    /** Accepted without amendment */
    case ACCEPTED_WITHOUT_AMENDMENT = '31';

    /** Conditionally accepted */
    case CONDITIONALLY_ACCEPTED = '35';

    /** Rejected */
    case REJECTED = '43';
}
