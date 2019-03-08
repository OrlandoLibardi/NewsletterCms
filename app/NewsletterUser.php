<?php

namespace OrlandoLibardi\NewsletterCms\app;

use Illuminate\Database\Eloquent\Model;

class NewsletterUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'newsletter_id', 'name', 'email', 'status'
    ];

}
