<?php

namespace App\Providers;

use App\Repositories\UsersRefreshToken\UsersRefreshTokenRepository;
use App\Repositories\UsersRefreshToken\UsersRefreshTokenRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UsersRefreshTokenRepositoryInterface::class, UsersRefreshTokenRepository::class);
    }

    public function boot(): void
    {

    }
}
