<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    public function fingerprints(){
        return $this->hasMany('App\Models\FingerprintMachine','company_id');
    }
}
