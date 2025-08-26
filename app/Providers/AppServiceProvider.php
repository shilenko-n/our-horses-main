<?php

namespace App\Providers;

use App\Services\Fakers\ChatMessages;
use App\Services\Fakers\ChatUser;
use App\Services\Fakers\Comment;
use App\Services\Fakers\Horse;
use App\Services\Fakers\Human;
use App\Services\Fakers\Post;
use App\Services\Fakers\SearchResult;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $faker = fake();

        $faker->addProvider(new Horse($faker));
        $faker->addProvider(new Human($faker));
        $faker->addProvider(new Comment($faker));
        $faker->addProvider(new Post($faker));

        $faker->addProvider(new SearchResult($faker));
        $faker->addProvider(new ChatUser($faker));
        $faker->addProvider(new ChatMessages($faker));

        Livewire::component('modal', \App\Livewire\Components\Modal::class);
    }
}
