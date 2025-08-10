<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    protected $guarded = [];

    public function books()
    {
        return $this->hasMany(Books::class);
    }
}
