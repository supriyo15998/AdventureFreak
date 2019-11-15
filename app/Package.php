<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
	protected $fillable = ['package_name', 'amount-per-head', 'facilities', 'depart_date', 'arrival_date', 'days', 'nights'];
    protected $guarded = [];
}
