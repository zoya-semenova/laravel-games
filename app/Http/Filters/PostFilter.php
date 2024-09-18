<?php
namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends QueryFilter
{
    /**
     * @param array $genres
     */
    public function genres(array $genres)
    {
        $this->builder->whereHas('genres', function($q) use($genres)
        {
            return $q->whereIn('id', $genres);
        });
    }
}
