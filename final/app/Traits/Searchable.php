<?php

namespace App\Traits;

trait Searchable
{
    /**
     * Scope a query that matches a full text search of term.
     * This version calculates and orders by relevance score.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $term
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $term)
    {
        $columns = array_map(function ($s) {
            return "({$s} LIKE ?)";
        }, $this->searchable);

        $select = '('. implode(' + ', $columns) .') as relevance_score';
        $query->selectRaw('*, '. $select, array_fill(0, count($columns), '%'.$term.'%'));

        foreach ($this->searchable as $i => $column) {
            if ($i === 0) {
                $query->where($column, 'LIKE', '%'.$term.'%');
            } else {
                $query->orWhere($column, 'LIKE', '%'.$term.'%');
            }
        }

        return $query;
    }
}
