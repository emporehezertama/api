<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrmModuleAdmin extends Model
{
    //
//    protected $connection = 'mysqlMhr';
    protected $table = 'crm_module_admin';

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
}
