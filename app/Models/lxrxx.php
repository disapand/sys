<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lxrxx extends Model
{
    protected $fillable = [
        'jbxx_id','lxr', 'gx','lxdh','sfzh','dk','lxr2', 'gx2','lxdh2','sfzh2','dk2','lxr3', 'gx3','lxdh3','sfzh3','dk3','lxr4', 'gx4','lxdh4','sfzh4','dk4','lxrjzdz', 'lxrgzdw', 'lxrjzdz2', 'lxrgzdw2','lxrjzdz3', 'lxrgzdw3','lxrjzdz4', 'lxrgzdw4'
    ];

    public function jbxx() {
        return $this -> belongsTo('App\Models\jbxx', 'jbxx_id', 'id');
    }
}
