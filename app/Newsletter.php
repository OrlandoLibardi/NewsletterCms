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
        return $this->hasMany('OrlandoLibardi\NewsletterCms\app\NewsletterUser');
    }
    /**
    * Relacionamento um para muitos com newsletter_users e wehere para usuários confirmados
    * @param newsletter_users.status = 1
    */
    public function scopeConfirmeds($q)
    {
        return $q->registereds()
                  ->where('newsletter_users.status', 1);
    }
    /**
     * Date created_at Accessor
     */   
    public function getCreatedAtAttribute($value)
    {
        if($value) return \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s');
    }
    /**
     * Date updated_at Accessor
     */   
    public function getUpdatedAtAttribute($value)
    {
        if($value) return \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s');
    }


}
