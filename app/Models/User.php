<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserType;
use Laravel\Cashier\Billable;
use Illuminate\Http\UploadedFile;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use App\Casts\UploadedFile as CastsUploadedFile;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

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

    public function orders() :HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function reviews() :HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function claims(): HasMany
    {
        return $this->hasMany(Claim::class);
    }

    public function latestOrder(): HasOne
    {
        return $this->hasOne(Order::class)->latestOfMany();
    }

    public function sent_messages() :HasMany
    {
        return $this->hasMany(Message::class,'sender_id','id');
    }

    public function last_sent_message() :HasOne 
    {
        return $this->hasOne(Message::class,'sender_id','id')->where('receiver_id',auth()->id())->latestOfMany();
    }

    public function received_messages() :HasMany
    {
        return $this->hasMany(Message::class,'receiver_id','id');
    }
}
