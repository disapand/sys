<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lxrxx extends Model
{
    protected $fillable = [
        'jbxx_id','lxr', 'gx','lxdh','sfzh','dk'
    ];

    public function jbxx() {
        return $this -> belongsTo('App\Models\jbxx', 'jbxx_id', 'id');
    }
}
