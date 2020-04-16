<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $fillable = ['name', 'size', 'type', 'local_url', 'global_url'];
}
