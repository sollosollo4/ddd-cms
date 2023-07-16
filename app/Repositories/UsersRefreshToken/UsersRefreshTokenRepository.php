<?php

namespace App\Repositories\UsersRefreshToken;

use App\Models\UsersRefreshToken;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UsersRefreshTokenRepository implements UsersRefreshTokenRepositoryInterface
{
    public function setByUserId(int $userId): UsersRefreshToken
    {
        $refreshToken = Str::random(128);

        $token = UsersRefreshToken::where('user_id', '=', $userId)->firstOrNew();
        $token->fill([
            'user_id' => $userId,
            'token' => $refreshToken,
            'expire_at' => Carbon::now()->addMinutes(config('jwt.refresh_ttl'))
        ]);
        $token->save();

        return $token;
    }

    public function getToken(string $refreshToken): UsersRefreshToken
    {
        $refreshModel = UsersRefreshToken::where('token', '=', $refreshToken)
            ->where('expire_at', '>', Carbon::now()->toDateTimeString())
            ->firstOrFail();
        $refreshModel->expire_at = Carbon::now()->addMinutes(config('jwt.refresh_ttl'));
        $refreshModel->update();
        return $refreshModel;
    }
}
