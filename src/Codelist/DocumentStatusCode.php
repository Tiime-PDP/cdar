<?php

declare(strict_types=1);

namespace TiimePDP\CrossDomainAcknowledgementAndResponse\Codelist;

/**
 * UNECE document status code
 * Version D23A.
 */
enum DocumentStatusCode: string
{
    /** Cancelled */
    case CANCELLED = '1';

    /** Accepted */
    case ACCEPTED = '2';

    /** Conditionally accepted */
    case CONDITIONALLY_ACCEPTED = '3';

    /** Under query */
    case UNDER_QUERY = '4';

    /** Amended */
    case AMENDED = '5';

    /** Rejected */
    case REJECTED = '6';

    /** Not acknowledged */
    case NOT_ACKNOWLEDGED = '7';

    /** Received at destination */
    case RECEIVED_AT_DESTINATION = '8';

    /** Countered */
    case COUNTERED = '9';

    /** Agreed */
    case AGREED = '10';

    /** Authorised */
    case AUTHORISED = '11';

    /** Completed */
    case COMPLETED = '12';

    /** Revoked */
    case REVOKED = '13';

    /** Confirmed */
    case CONFIRMED = '14';

    /** Incorrect */
    case INCORRECT = '15';

    /** Accepted, with amendment in statement */
    case ACCEPTED_WITH_AMENDMENT = '16';

    /** Conditionally accepted, with amendment in statement */
    case CONDITIONALLY_ACCEPTED_WITH_AMENDMENT = '17';

    /** Under query, with amendment in statement */
    case UNDER_QUERY_WITH_AMENDMENT = '18';

    /** Rejected, with amendment in statement */
    case REJECTED_WITH_AMENDMENT = '19';

    /** Partly accepted */
    case PARTLY_ACCEPTED = '20';

    /** Conditionally partly accepted */
    case CONDITIONALLY_PARTLY_ACCEPTED = '21';

    /** Partly accepted, under query */
    case PARTLY_ACCEPTED_UNDER_QUERY = '22';

    /** Partly rejected */
    case PARTLY_REJECTED = '23';

    /** Expired */
    case EXPIRED = '24';

    /** Withdrawn */
    case WITHDRAWN = '25';

    /** Proposed */
    case PROPOSED = '26';

    /** Not acknowledged, incomplete information */
    case NOT_ACKNOWLEDGED_INCOMPLETE = '27';

    /** Settled */
    case SETTLED = '28';

    /** Request for settlement */
    case REQUEST_FOR_SETTLEMENT = '29';

    /** Request for financial information */
    case REQUEST_FOR_FINANCIAL_INFO = '30';

    /** Cleared */
    case CLEARED = '31';

    /** Parked */
    case PARKED = '32';

    /** Additional documents requested */
    case ADDITIONAL_DOCS_REQUESTED = '33';

    /** Accepted, amended */
    case ACCEPTED_AMENDED = '34';

    /** Conditionally accepted, amended */
    case CONDITIONALLY_ACCEPTED_AMENDED = '35';

    /** Under query, amended */
    case UNDER_QUERY_AMENDED = '36';

    /** Rejected, amended */
    case REJECTED_AMENDED = '37';

    /** Partly accepted, amended */
    case PARTLY_ACCEPTED_AMENDED = '38';

    /** Conditionally partly accepted, amended */
    case CONDITIONALLY_PARTLY_ACCEPTED_AMENDED = '39';

    /** Partly accepted, under query, amended */
    case PARTLY_ACCEPTED_UNDER_QUERY_AMENDED = '40';

    /** Partly rejected, amended */
    case PARTLY_REJECTED_AMENDED = '41';

    /** Not acknowledged, incomplete information, amended */
    case NOT_ACKNOWLEDGED_INCOMPLETE_AMENDED = '42';

    /** Passed */
    case PASSED = '43';

    /** Passed, subject to amendment */
    case PASSED_SUBJECT_TO_AMENDMENT = '44';

    /** Not approved */
    case NOT_APPROVED = '45';

    /** Not passed */
    case NOT_PASSED = '46';

    /** Not passed, subject to amendment */
    case NOT_PASSED_SUBJECT_TO_AMENDMENT = '47';

    /** Not acknowledged, missing information */
    case NOT_ACKNOWLEDGED_MISSING_INFO = '48';

    /** Rejected, missing information */
    case REJECTED_MISSING_INFO = '49';

    /** Responded */
    case RESPONDED = '50';

    /** With third party */
    case WITH_THIRD_PARTY = '51';
}
