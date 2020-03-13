<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $fillable = [
        'advertisement_id', 'name', 'details', 'image', 'price', 'bought_by',
    ];

    public function advertisement()
    {
        return $this->belongsTo('App\Advertisement');
    }
}
