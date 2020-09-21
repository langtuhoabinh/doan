<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logging extends Model
{
    protected $table = 'logging';
    public $timestamps = true;
    protected $fillable = [
        'param',
        'method',
        'query',
        'time',
        'updated_at',
        'created_at',
    ];
}
