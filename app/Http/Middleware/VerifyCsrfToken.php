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
						];
}
