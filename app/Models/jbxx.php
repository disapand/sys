<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jbxx extends Model
{
    protected $fillable = [
        'name','tel','IDCard','sex','jklb','xl','hj','addr'
    ];

    /*
     * 关联职业信息
     * */
    public function zyxx() {
        return $this -> hasOne('App\Models\zyxx', 'jbxx_id', 'id');
    }

    /*
     * 关联联系人信息
     * */
    public function lxrxx() {
        return $this -> hasOne('App\Models\lxrxx', 'jbxx_id', 'id');
    }

    /*
     * 关联其他信息
     * */
    public function qtxx() {
        return $this -> hasOne('App\Models\qtxx', 'jbxx_id', 'id');
    }
    /*
     * 关联其他信息
     * */
    public function fjxx() {
        return $this -> hasOne('App\Models\fjxx', 'jbxx_id', 'id');
    }

    public function jk() {
        return $this -> hasMany('App\Models\jk', 'jbxx_id', 'id');
    }

}
