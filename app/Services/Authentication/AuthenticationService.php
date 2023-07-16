<?php

namespace App\Services\Authentication;

use App\Http\Request\Forms\Login\WebLoginRequest;
use App\Repositories\UsersRefreshToken\UsersRefreshTokenRepositoryContract;
use App\Services\Authentication\AuthenticationServiceData;
use Carbon\Carbon;
use Cookie;
use Exception;

class AuthenticationService
{
    public function __construct(private UsersRefreshTokenRepositoryContract $usersRefreshTokenRepository)
    {

    }

    public function authentication(WebLoginRequest $request): AuthenticationServiceData
    {
        $minutes = $request->boolean('remember') ? config('jwt.remember_ttl') : config('jwt.ttl');
        $accessToken = $request->authenticate($minutes);

        $tokenExpireAt = Carbon::now()->addMinutes($minutes);

        $refreshToken = $this->usersRefreshTokenRepository->setByUserId(auth()->user()->id);
        $refreshCookie = Cookie::make(name: 'refreshToken', value: $refreshToken, minutes: config('jwt.refresh_ttl'), path: null, domain: config('session.domain'), secure: true, httpOnly: true, raw: false, sameSite: 'none');
        return new AuthenticationServiceData(
            accessToken: $accessToken,
            refreshToken: $refreshToken->token,
            refreshCookie: $refreshCookie,
            expireAt: $tokenExpireAt
        );
    }

    public function refreshAuthentication(): string
    {
        $refreshToken = Cookie::get('refreshToken');
        if(!$refreshToken) {
            throw new Exception("refreshToken had null");
        }
        $usersRefreshTokenModel = $this->usersRefreshTokenRepository->getToken($refreshToken);

        return auth()->tokenById($usersRefreshTokenModel->user_id);
    }
}
