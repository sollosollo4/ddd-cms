<?php

namespace App\Providers;

use App\Repositories\Core\Element\ElementRepository;
use App\Repositories\Core\Element\ElementRepositoryContract;
use App\Repositories\Core\ElementType\ElementTypeRepository;
use App\Repositories\Core\ElementType\ElementTypeRepositoryContract;
use App\Repositories\Core\Section\SectionRepository;
use App\Repositories\Core\Section\SectionRepositoryContract;
use App\Repositories\Core\Setting\SettingRepository;
use App\Repositories\Core\Setting\SettingRepositoryContract;
use App\Repositories\UsersRefreshToken\UsersRefreshTokenRepository;
use App\Repositories\UsersRefreshToken\UsersRefreshTokenRepositoryContract;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UsersRefreshTokenRepositoryContract::class, UsersRefreshTokenRepository::class);

        $this->app->bind(ElementRepositoryContract::class, ElementRepository::class);
        $this->app->bind(SectionRepositoryContract::class, SectionRepository::class);
        $this->app->bind(ElementTypeRepositoryContract::class, ElementTypeRepository::class);
        $this->app->bind(SettingRepositoryContract::class, SettingRepository::class);
    }

    public function boot(): void
    {

    }
}
