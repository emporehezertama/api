<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseSetting extends Model
{
    protected $table = 'setting';
    protected $attributes = ['key','value','project_id'];
}
