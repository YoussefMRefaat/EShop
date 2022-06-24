<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The accessors to append to the model's array form.
     *
     * @var string[]
     */
    protected $appends = ['has_password'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'role',
        'is_banned',
        'last_active',
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
        'is_banned' => 'boolean',
        'last_active' => 'datetime',
    ];

    /**
     * Define the relationship between the user and his favourite products
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favourites(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class , 'favourites')
            ->as('favourites');
    }

    /**
     * Define the relationship between the user and his orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Define the relationship between the user and his cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cart(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Cart::class);
    }

    /**
     * Check if the user has a password
     *
     * @return bool
     */
    public function getHasPasswordAttribute(): bool
    {
        return !empty($this->attributes['password']);
    }
}
