<?php

namespace App\Providers;

use App\Repositories\UsersRefreshToken\UsersRefreshTokenRepository;
use App\Repositories\UsersRefreshToken\UsersRefreshTokenRepositoryContract;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UsersRefreshTokenRepositoryContract::class, UsersRefreshTokenRepository::class);
    }

    public function boot(): void
    {

    }
}
