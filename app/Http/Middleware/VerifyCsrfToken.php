<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
							'api/customer/login',
							'api/customer/register',
							'api/customer/logout',

							'api/customer/list_summary',
							'api/customer/list_jobs',
							'api/customer/payment_statements',

							'api/customer/profile_view',
							'api/customer/profile_update',

							'api/customer/link_to_app',
							'api/customer/reporting_issue_with_job',
							'api/customer/training_videos',
							'api/customer/how_can_we_help',
							'api/customer/inviting_friends',
						];
}
