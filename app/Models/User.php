<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Casts\UploadedFile as CastsUploadedFile;
use App\Enums\UserType;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

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
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'avatar'=>CastsUploadedFile::class.':user,avatars',
        'banner'=>CastsUploadedFile::class.':user,banners'
    ];

    public function listings() :HasMany
    {
        return $this->hasMany(Listing::class);
    }
}
