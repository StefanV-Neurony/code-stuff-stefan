<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
        public $fillable = [
            'user_id', 'title', 'body', 'valid',
        ];

        protected $with = ['item'];

        public function user()
        {
            return $this->belongsTo('App\User');
        }

        public function item()
        {
            return $this->hasOne('App\Item');
        }

        public function getEditDataAttribute()
        {
            $data = $this->only(['id', 'title', 'body', 'valid', 'user_id']);
            $data['item']=[
                'name' => $this->item->name,
                'price' => $this->item->price,
                'bought_by' => $this->item->bought_by,
            ];
            return $data;
        }
}
