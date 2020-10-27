<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class food extends Model
{
    protected $guarded = [];

    public function refrigerator()
    {
        return $this->belongsTo(Refrigerator::class);
    }
}
