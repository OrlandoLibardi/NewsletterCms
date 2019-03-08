<?php

namespace OrlandoLibardi\NewsletterCms\app\Providers;

use Illuminate\Support\Facades\Facade;

class OlCmsNewsletter extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'OlCmsNewsletter';
    }
}