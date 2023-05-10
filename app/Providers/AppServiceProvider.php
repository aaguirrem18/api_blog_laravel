<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\src\Domain\Authors\AuthorInterface;
use App\src\Domain\Posts\PostInterface;
use App\src\Infrastucture\Repositories\PostRepository;
use App\src\Infrastucture\Repositories\AuthorRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostInterface::class, PostRepository::class);
        $this->app->bind(AuthorInterface::class, AuthorRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
