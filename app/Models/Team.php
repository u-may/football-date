<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['league_id', 'name', 'logo'];

    protected $attributes = [
        'city' => '',
    ];

    public function league()
    {
        return $this->belongsTo(League::class);
    }
}