<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Comment;
use App\Observers\CommentObserver;
use Illuminate\Http\Resources\Json\Resource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		\Carbon\Carbon::setLocale('zh');
		Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		Comment::observe(CommentObserver::class);
		
		//去掉返回json格式时data包裹层
        Resource::withoutWrapping();
    }
}