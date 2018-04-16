<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class zyxx extends Model
{
    protected $fillable = [
        'gzdw', 'dwxz','sshy','rzbm','zw','rzsj','dwdz','dwdh','rzxs', 'zsr'
    ];

    public function jbxx() {
        return $this -> belongsTo('App\Models\jbxx', 'jbxx_id', 'id');
    }

}
