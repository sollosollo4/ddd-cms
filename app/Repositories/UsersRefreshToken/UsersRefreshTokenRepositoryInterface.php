<?php

namespace App\Repositories\UsersRefreshToken;

use App\Models\UsersRefreshToken;

interface UsersRefreshTokenRepositoryInterface
{
    public function setByUserId(int $userId): UsersRefreshToken;
    public function getToken(string $refreshToken): UsersRefreshToken;
}
