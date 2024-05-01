<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\LivewireServiceProvider;
use App\Models\User;
use App\Models\Post;
use App\Observers\UserObserver;
use App\Observers\PostObserver;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(LivewireServiceProvider::class);
    
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Post::observe(PostObserver::class); //when a post is deleted, the image is also deleted from the storage folder
    
    }

    
}
