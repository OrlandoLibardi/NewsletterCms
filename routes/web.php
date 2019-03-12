<?php

/**
 * Newsletter
 */
Route::resource('newsletters', 'NewsletterController');
/**
 * Newsletter User
 */
Route::get('newsletter-user-download/{id}', 'NewsletterUserController@download')->name('newsletter-download');
Route::resource('newsletter-users', 'NewsletterUserController');
