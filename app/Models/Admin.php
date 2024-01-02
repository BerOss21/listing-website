<?php

namespace App\Models;

use App\Casts\UploadedFile;
use App\Enums\UserType;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'avatar',
        'banner',
        'phone',
        'address',
        'about',
        'website',
        'fb_link',
        'x_link',
        'in_link',
        'wa_link',
        'insta_link'
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'avatar'=>UploadedFile::class.':admin,avatars',
        'banner'=>UploadedFile::class.':admin,banners'
    ];
}
