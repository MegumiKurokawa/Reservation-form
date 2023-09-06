<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function is_favorite($restaurantId)
    {
        return $this->favorites()->where('restaurant_id', $restaurantId)->exists();
    }
    
    public function favorite($restaurantId)
    {
        if ($this->is_favorite($restaurantId)) {

        } else {

            $this->favorites()->attach($restaurantId);
        }
    }

    public function unfavorite($restaurantId)
    {
        if ($this->is_favorite($restaurantId)) {

            $this->favorites()->detach($restaurantId);

        } else {
        }
    }
}
