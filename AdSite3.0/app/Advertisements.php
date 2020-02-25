<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisements extends Model
{

        protected $fillable = [
            'title', 'body','valid',
            ];
        public function user()
        {
            return $this->belongsTo('App\User');
        }

        public function items()
        {
           return $this->hasOne('App\Items');
        }
}
