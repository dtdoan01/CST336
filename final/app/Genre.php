<?php

namespace App;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use Sluggable;

    public $timestamps = null;

    protected $fillable = ['name'];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
