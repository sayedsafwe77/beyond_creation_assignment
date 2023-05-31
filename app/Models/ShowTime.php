<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Filters\ShowTimeFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ShowTime extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = ['from', 'to'];
    protected $filter = ShowTimeFilter::class;
    protected function text(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => $attributes['from'] . ' - ' . $attributes['to']
        );
    }
}
