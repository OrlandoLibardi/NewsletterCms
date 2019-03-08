<?php

namespace OrlandoLibardi\NewsletterCms\app\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;



class OlCmsNewsletterviewServiceProvider extends ServiceProvider{
    
    /**
     * Register the service provider.
     */
    public function register()
    {               
        $this->registerOlCmsNewsletterBuilder();
        $this->app->alias('OlCmsNewsletter', OlCmsNewsletterBuilder::class);        
    }

    /**
     * Register the OlCmsNewsletter builder instance.
     */
    protected function registerOlCmsNewsletterBuilder()
    {
        $this->app->singleton('OlCmsNewsletter', function ($app) {
            return new OlCmsNewsletterBuilder();
        });
    }    

    /**
     * Get the services provided by the provider.
     */
    public function provides()
    {
        return ['OlCmsNewsletter', OlCmsNewsletterBuilder::class];
    }
}