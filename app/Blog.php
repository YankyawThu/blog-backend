<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function scopeFilter($query, $filter) 
    {
        $filter->apply($query);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
