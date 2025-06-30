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
        return $this->belongsTo('App\Models\User'); // "Pertence a um usuário", ou seja, um evento só pode ter um usuário associado a ele
    }

    public function users() {
        return $this->belongsToMany('App\Models\User'); // "Pertence a muitos usuários", ou seja, um evento pode ter vários usuários associados a ele
    }
}
