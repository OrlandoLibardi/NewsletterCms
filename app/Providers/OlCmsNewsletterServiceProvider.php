<?php 
namespace OrlandoLibardi\NewsletterCms\app\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

use OrlandoLibardi\NewsletterCms\app\Newsletter;
use OrlandoLibardi\NewsletterCms\app\NewsletterUser;

class OlCmsNewsletterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Rotas para controllador Newsletter
         */
        Route::namespace('OrlandoLibardi\NewsletterCms\app\Http\Controllers')
               ->middleware(['web', 'auth'])
               ->prefix('admin')
               ->group(__DIR__. '/../../routes/web.php');

        /**
         * Rotas publicas 
         */
        $this->loadRoutesFrom(__DIR__. '/../../routes/web-dynamic.php');
        /**
         * Publicar os arquivos 
         */
        $this->publishes( [
            __DIR__.'/../../database/migrations/' => database_path('migrations/'),
            __DIR__.'/../../resources/views/admin/' => resource_path('views/admin/'),
            __DIR__.'/../../resources/views/website/' => resource_path('views/website/'), 
            __DIR__.'/../../resources/views/emails/' => resource_path('views/emails/'), 
            __DIR__.'/../../database/seeds/' => database_path('seeds'),
            __DIR__.'/../../config/newsletter.php' => config_path('newsletter.php'),
        ],'config');
        
        /**
         * Observer Newsletter
         */
        Newsletter::observe(NewsletterObserver::class);
        /**
         * Observer Newsletter User
         */
        NewsletterUser::observe(NewsletterUserObserver::class);
        
    }
}