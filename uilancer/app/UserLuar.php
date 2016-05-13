<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLuar extends Model
{
    protected $table='user_luar';
    
    
    public static function insert($name, $asal_instansi,$email,$no_telp,$pekerjaan_id){
        $user = new UserLuar();
        $user->name = $name;
        $user->asal_instansi=$asal_instansi;
        $user->email=$email;
        $user->pekerjaan_id=$pekerjaan_id;
        return $user;
    }
        
    public static function get($name){
        $user = UserLuar::find($name);
        return $user;
    }
}