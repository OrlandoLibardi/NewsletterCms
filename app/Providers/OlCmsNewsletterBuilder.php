<?php 
namespace OrlandoLibardi\NewsletterCms\app\Providers;

use BadMethodCallException;
use Illuminate\Support\HtmlString;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Collection;

class OlCmsNewsletterBuilder
{
    protected $config;

    public function __construct()
    {
        $this->config = config('newsletter');
    }

    public function show($list=false)
    {
        if(!$list) return false;
        return view($this->config['newsletter_form'], compact('list'));
    }  
    
}