<?php

Route::group(['middleware' => ['web']], function() {
    
    Route::post('newsletter-subscribe', 'OrlandoLibardi\NewsletterCms\app\Http\Controllers\NewsletterViewController@store')
    ->name("newsletter-subscribe");    

    Route::get('newsletter-confirmation/', 'OrlandoLibardi\NewsletterCms\app\Http\Controllers\NewsletterViewController@confirm')
    ->name("newsletter-confirm");

    Route::get('newsletter-unsubscribe/{email?}', 'OrlandoLibardi\NewsletterCms\app\Http\Controllers\NewsletterViewController@unsubscribe')
    ->where("email", "([A-Za-z0-9\-\/]+)")
    ->name("newsletter-unsubscribe");
});