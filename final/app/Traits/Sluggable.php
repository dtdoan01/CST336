<?php

namespace App\Traits;

/** @mixin \Illuminate\Database\Eloquent\Model */
trait Sluggable
{
    public static function bootSluggable()
    {
        static::creating(function($model){
            $model->setSlugAttribute($model->name);
        });
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value);
    }
}
