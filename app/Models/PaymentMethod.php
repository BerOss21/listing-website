<?php

namespace App\Models;

use App\Casts\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use HasFactory,Sluggable,SoftDeletes;

    protected $fillable=[
        // 'name',
        // 'slug',
        'description',
        'icon',
        'status',
        'config'
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

    protected $casts = [
        'config' => 'array',
        'icon'=>UploadedFile::class.':admin,'.'sections/payment_methods/icons',
    ];
}
