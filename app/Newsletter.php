<?php

namespace OrlandoLibardi\NewsletterCms\app;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description'
    ];
    /**
    * Relacionamento um para muitos com newsletter_users
    *
    */
    public function registereds(){
        return $this->hasMany('App\NewsletterUser');
    }
    /**
    * Relacionamento um para muitos com newsletter_users e wehere para usuários confirmados
    * @param newsletter_users.status = 1
    */
    public function confirmeds(){
        return $this->hasMany('App\NewsletterUser')->where('newsletter_users.status', 1);
    }


}
