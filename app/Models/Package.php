<?php

namespace App\Models;

use App\Enums\PackageType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

    protected $fillable = [
        'type',
        'name',
        'price',
        'number_of_days',
        'number_of_listings',
        'number_of_photos',
        'number_of_videos',
        'number_of_amenities',
        'number_of_featured_listings',
        'show_at_home',
        'status',
    ];

    protected $casts = [
        'type' => PackageType::class,
        'show_at_home'=>'boolean',
        'status'=>'boolean'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeActive(Builder $query)
    {
        $query->whereStatus(1);
    }

    public function scopeShowAtHome(Builder $query)
    {
        $query->whereShowAtHome(1);
    }

    public function getDaysAttribute()
    {
        return $this->number_of_days > 0 ? $this->number_of_days." ".Str::plural('day', $this->number_of_days):'infinite';
    }

    public function getListingsAttribute()
    {
        return $this->number_of_listings > 0 ? $this->number_of_listings." ".Str::plural('listing', $this->number_of_listings):'infinite';
    }

    public function getFeaturedListingsAttribute()
    {
        return $this->number_of_featured_listings > 0 ? $this->number_of_featured_listings." ".Str::plural('featured listing', $this->number_of_featured_listings):'infinite';
    }

    public function getPhotosAttribute()
    {
        return $this->number_of_photos > 0 ? $this->number_of_photos." ".Str::plural('photo', $this->number_of_photos):'infinite';
    }

    public function getVideosAttribute()
    {
        return $this->number_of_videos > 0 ? $this->number_of_videos." ".Str::plural('video', $this->number_of_videos):'infinite';
    }

    public function getAmenitiesAttribute()
    {
        return $this->number_of_amenities > 0 ? $this->number_of_amenities." ".Str::plural('amenity', $this->number_of_amenities):'infinite';
    }
}
