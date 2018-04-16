<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lxrxx extends Model
{
    protected $fillable = [
        'lxr', 'gx','lxdh','sfzh','dk'
    ];

    public function jbxx() {
        return $this -> belongsTo('App\Models\jbxx', 'jbxx_id', 'id');
    }
}
