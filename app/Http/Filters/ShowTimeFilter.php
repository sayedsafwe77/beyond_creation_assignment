<?php

namespace App\Http\Filters;

class ShowTimeFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'from',
        'to',
        'event_id',
        'movie_id',
        'selected_id'
    ];


    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function from($value)
    {
        if ($value) {
            return $this->builder->where('from', '>=', "$value");
        }
        return $this->builder;
    }
    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function to($value)
    {
        if ($value) {
            return $this->builder->where('to', '<=', "$value");
        }
        return $this->builder;
    }
    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function eventId($value)
    {
        // dd($value);
        if ($value) {
            return $this->builder->whereHas('events', function ($q) use ($value) {
                $q->where('event_day_id', $value);
            });
        }
        return $this->builder;
    }
    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function movieId($value)
    {
        // dd($value);
        // if ($value) {
        //     return $this->builder->whereHas('events', function ($q) use ($value) {
        //         $q->from('event_day_show_times')->select('id')->where()
        //     });
        // }
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
