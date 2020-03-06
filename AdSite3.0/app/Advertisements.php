<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisements extends Model
{

        public $fillable = [
            'user_id','title','body','valid',
            ];
        public function user()
        {
            return $this->belongsTo('App\User');
        }

        public function items()
        {
            return $this->hasOne('App\Items');
        }
        public function getEditDataAttribute()
        {
            $data = $this->only(['id','title','body','valid','user_id']);
            $data['item']=[
                'name'=>$this->items->name,
                'price'=>$this->items->price,
            ];

            return $data;
        }


}
