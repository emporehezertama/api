<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FingerprintMachine extends Model
{
    protected $table = 'fingerprint_machines';

    public function company(){
        return $this->belongsTo('App\Models\Company','company_id');
    }
}
