<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $connection = 'mysqlDemoEmp';
	
    protected $table = 'setting';
}
