<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mod extends Model
{
    protected $fillable = [
    "adds_tags",
    "domain",
    "generation_type",
    "generation_weights",
    "grants_buff",
    "grants_effects",
    "group",
    "is_essence_only",
    "name",
    "required_level",
    "spawn_weights",
    "stats",
    "type",

    ];
}
