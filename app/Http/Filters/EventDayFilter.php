<?php

namespace App\Http\Filters;

class EventDayFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'from',
        'to',
        'movie_id',
        'selected_id'
    ];

    /**
     * Filter the query by a given min date.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function from($value)
    {
        if ($value) {
            return $this->builder->where('event_day', '>=', "$value");
        }
        return $this->builder;
    }
    /**
     * Filter the query by a given movie_id.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function movieId($value)
    {
        if ($value) {
            return $this->builder->whereHas('category', function ($q) use ($value) {
                $q->whereTranslationLike('name', "%$value%");
            });
        }
        return $this->builder;
    }
    /**
     * Filter the query by a given max date.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function to($value)
    {
        if ($value) {
            return $this->builder->where('event_day', '<=', "$value");
        }
        return $this->builder;
    }

    /**
     * Sorting results by the given id.
     *
     * @param $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function selectedId($value)
    {
        if ($value) {
            $this->builder->sortingByIds($value);
        }

        return $this->builder;
    }
}
