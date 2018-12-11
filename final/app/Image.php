<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = null;

    protected $fillable = ['url'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
