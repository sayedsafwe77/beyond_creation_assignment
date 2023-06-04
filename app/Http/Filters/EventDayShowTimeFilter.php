<?php

namespace App\Http\Filters;

class EventDayShowTimeFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'movie_id',
        'event_day_id',
        'selected_id'
    ];


    /**
     * Filter the query by a given movie_id.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function eventDayId($value)
    {
        if ($value) {
            return $this->builder->where('event_day_id', $value);
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
            return $this->builder->whereHas('movies', function ($q) use ($value) {
                $q->where('movie_id', $value);
            });
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
