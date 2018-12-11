<?php

namespace App;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use Sluggable;

    public $timestamps = null;

    protected $fillable = ['name', 'icon'];

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
