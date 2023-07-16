<?php

namespace App\Repositories\UsersRefreshToken;

use App\Models\UsersRefreshToken;

interface UsersRefreshTokenRepositoryContract
{
    public function setByUserId(int $userId): UsersRefreshToken;
    public function getToken(string $refreshToken): UsersRefreshToken;
}
