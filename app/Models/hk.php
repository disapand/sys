<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hk extends Model
{
    protected $fillable = [
        'jkbh', 'hkje', 'bj', 'lx', 'hksj', 'khjl', 'whje'
    ];

    public function jk() {
        return $this -> belongsTo('App\Models\jk', 'jkbh', 'id');
    }

}
