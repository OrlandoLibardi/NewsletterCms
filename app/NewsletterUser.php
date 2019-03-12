<?php

namespace OrlandoLibardi\NewsletterCms\app;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class NewsletterUser extends Model
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'newsletter_id', 'name', 'email', 'status'
    ];

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

    public function getStatusAttribute($value)
    {
        return ($value==1) ? "Confirmado" : "Não Confirmado";
    }

}
