<?php

namespace App\Models;

use App\Casts\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
     use HasFactory, Sluggable, SoftDeletes;

     protected $fillable = [
          'user_id',
          'category_id',
          'location_id',
          'package_id',
          'image',
          'thumbnail_image',
          'title',
          'slug',
          'description',
          'phone',
          'email',
          'address',
          'website',
          'facebook_link',
          'x_link',
          'linkedin_link',
          'whatsapp_link',
          'is_verified',
          'is_featured',
          'views',
          'google_map_embed_code',
          'attachment',
          'expire_date',
          'seo_title',
          'seo_description',
          'status',
          'is_approved',
     ];

     protected $casts = [
          'created_at' => 'datetime:d/m/Y',
          'expire_date' => 'datetime:d/m/Y',
          'is_approved' => 'boolean',
          'status' => 'boolean',
          'is_verified' => 'boolean',
          'is_featured' => 'boolean',
          'image' => UploadedFile::class . ':admin,' . 'sections/listings/images',
          'thumbnail_image' => UploadedFile::class . ':admin,' . 'sections/listings/thumbnail_images',
          'attachment' => UploadedFile::class . ':admin,' . 'sections/listings/attachments'
     ];

     public function sluggable(): array
     {
          return [
               'slug' => [
                    'source' => 'title'
               ]
          ];
     }

     public function getRouteKeyName(): string
     {
          return 'slug';
     }

     public function category(): BelongsTo
     {
          return $this->belongsTo(Category::class)->withDefault();
     }

     public function location(): BelongsTo
     {
          return $this->belongsTo(Location::class)->withDefault();
     }

     public function user(): BelongsTo
     {
          return $this->belongsTo(User::class)->withDefault();
     }

     public function amenities(): BelongsToMany
     {
          return $this->belongsToMany(Amenity::class);
     }

     public function images(): HasMany
     {
          return $this->hasMany(Image::class);
     }

     public function videos(): HasMany
     {
          return $this->hasMany(Video::class);
     }

     public function schedules(): HasMany
     {
          return $this->hasMany(Schedule::class);
     }

     public function active_schedules(): HasMany
     {
          return $this->schedules()->active();
     }

     public function reviews(): HasMany
     {
          return $this->hasMany(Review::class);
     }

     public function active_reviews(): HasMany
     {
          return $this->reviews()->whereApproved(1)->orWhere('user_id', auth()->id());
     }

     public function claims(): HasMany
     {
          return $this->hasMany(Claim::class);
     }

     public function scopeActive(Builder $query)
     {
          $query->whereStatus(1);
     }

     public function scopeApproved(Builder $query)
     {
          $query->whereIsApproved(1);
     }

     public function scopeFeatured(Builder $query)
     {
          $query->approved()->active()->where('is_featured', 1);
     }
}
