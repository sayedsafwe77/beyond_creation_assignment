<?php

namespace App\Models;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Http\Filters\Filterable;
use App\Http\Filters\MovieFilter;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Movie extends Model implements HasMedia, TranslatableContract
{
    use HasFactory, Filterable, InteractsWithMedia, Translatable, SoftDeletes, HasUploader;
    public $translatedAttributes = ['name', 'description'];
    protected $filter = MovieFilter::class;
    protected $guarded = [];
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('default');
        $this
            ->addMediaCollection('movie_images')
            ->useFallbackUrl('/images/default_movie');
    }
    public function event_days_show_times()
    {
        return $this->belongsToMany(EventDayShowTime::class, 'movie_eventdays', 'movie_id', 'event_day_show_time_id');
    }
    /**
     * The movie main image url.
     *
     * @return bool
     */
    public function getPhoto()
    {
        return $this->getFirstMediaUrl('movie_images');
    }
    /**
     * The movie main image url.
     *
     * @return bool
     */
    public function getPhotos()
    {
        return getAllMediaUrl($this->getMediaResource('movie_images'));
    }
}
