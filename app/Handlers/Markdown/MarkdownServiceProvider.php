<?php namespace CompanyMainPage\Handlesr\Markdown;

use Illuminate\Support\ServiceProvider;
use Event;
use App;

class MarkdownServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton('CompanyMainPage\Handlers\Markdown\Markdown', function ($app) {
            return new \CompanyMainPage\Handlers\Markdown\Markdown;
        });
    }

    public function provides()
    {
        return ['CompanyMainPage\Handlers\Markdown'];
    }
}
