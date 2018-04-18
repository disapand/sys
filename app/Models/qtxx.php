<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class qtxx extends Model
{
    protected $fillable = [
        'jbxx_id','fclb', 'gmsj','gmjg','gmfs','gmdz',
    ];

    public function jbxx() {
        return $this -> belongsTo('App\Models\jbxx', 'jbxx_id', 'id');
    }
}
