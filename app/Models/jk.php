<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jk extends Model
{

    protected $fillable = [
      'jbxx_id', 'jklx', 'hth', 'jkqx', 'jkje', 'll', 'sxf', 'jksj', 'hkfs',  'tjr'
    ];

    public function jbxx() {
        return $this -> belongsTo('App\Models\jbxx', 'jbxx_id', 'id');
    }

    public function user() {
        return $this -> belongsTo('App\Models\User', 'tjr', 'id');
    }

}
