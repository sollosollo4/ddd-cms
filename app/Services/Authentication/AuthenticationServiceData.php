<?php

namespace App\Services\Authentication;

use Spatie\LaravelData\Data;
use Symfony\Component\HttpFoundation\Cookie;

class AuthenticationServiceData extends Data
{
    public function __construct(
        public string $accessToken,
        public string $refreshToken,
        public Cookie $refreshCookie,
        public string $expireAt
    ) {
    }
}
