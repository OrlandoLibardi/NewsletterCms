<?php

/**
 * Newsletter
 */
Route::resource('newsletters', 'Admin\NewsletterController');
/**
 * Newsletter User
 */
Route::resource('newsletter-users', 'NewsletterUserController');
