<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $casts = [
        'items' => 'array'
    ];

    protected $date = ['date'];

    protected $guarded = []; // Protege todos os campos do modelo, ou seja, não permite atribuição em massa


    public function user() {
        return $this->belongsTo('App\Models\User'); // Está dizendo que este modelo pertence a um usuário
    }
}
