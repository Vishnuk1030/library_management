<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(Authors::class);
    }
}
