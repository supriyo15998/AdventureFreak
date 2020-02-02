<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];

    public function packages() {
    	return $this->belongsToMany('App\Package')->withPivot('quantity');
    }
}
