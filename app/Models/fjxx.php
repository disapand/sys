<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fjxx extends Model
{
    protected $fillable = [
        'jbxx_id','fjxx','khjl', 'tjr','jbxx_zt','jbxx_yj','jbxxshr','jbxxshsj','zyxx_zt','zyxx_yj','zyxxshr','zyxxshsj','lxrxx_zt','lxrxx_yj','lxrxxshr','lxrxxshsj',
        'qtxx_zt','qtxx_yj','qtxxshr','qtxxshsj', 'fjxx_zt','fjxx_yj','fjxxshr','fjxxshsj',
    ];

    public function jbxx() {
        return $this -> belongsTo('App\Models\jbxx', 'jbxx_id', 'id');
    }
}
