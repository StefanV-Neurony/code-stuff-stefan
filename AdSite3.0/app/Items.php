<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{

    public $fillable = [
        'advertisements_id','name','details','image','price',

        ];

    public function advertisement()

    {
        return $this->belongsTo('App\Advertisements');
    }

}
