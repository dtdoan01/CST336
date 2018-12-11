<?php

namespace App;

use App\Traits\Searchable;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Game extends Model
{
    use Sluggable, Searchable;

    protected $fillable = [
        'name', 'slug', 'publisher', 'genre_id',
        'score', 'votes', 'price', 'image_url',
        'description'
    ];

    /**
     * Append some "virtual" attributes
     *
     * @var array
     */
    protected $appends = ['rating'];

    /**
     * The columns of the full text index
     */
    protected $searchable = [
        'name',
        'description',
    ];

    //region Relationships

    public function platforms()
    {
        return $this->belongsToMany(Platform::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    //endregion

    //region Virtual Attributes

    public function getRatingAttribute()
    {
        if (! $this->votes || $this->votes < 0)
            return 0;

        // Force rating to 1 to 5, 0 will be reserved for unrated
        return clamp($this->score / $this->votes, 1, 5);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function scopeRecommended(Builder $query)
    {
        return $query->where('score', '>=', 80);
    }

    public static function sorts()
    {
        return collect([
            'relevance' => [
                'display' => 'Relevance',
                'field' => 'relevance_score',
                'direction' => 'desc',
            ],
            'name' => [
                'display' => 'Name',
                'field' => 'name',
                'direction' => 'asc',
            ],
            'lowest' => [
                'display' => 'Price Lowest',
                'field' => 'price',
                'direction' => 'asc',
            ],
            'highest' => [
                'display' => 'Price Highest',
                'field' => 'price',
                'direction' => 'desc',
            ],
            'rating' => [
                'display' => 'Rating',
                'field' => 'score',
                'direction' => 'desc',
            ],
        ]);
    }

    //endregion
}
