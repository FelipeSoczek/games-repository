<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

        'email_verified_at' => 'datetime',

    ];

    public function setPasswordAttribute($password)
    
    {

        $this->attributes['password'] = bcrypt($password);

    }

    public function games()

    {

        return $this->hasMany(Game::class);

    }
    
    public function reviews()

    {

        return $this->hasMany(Review::class);
        
    }

    public static function activeusers()

    {

        return static::selectRaw('users.name, count(*) submitted_games')
            ->join('games', 'games.user_id', '=', 'users.id')
            ->groupBy('users.name')
            ->orderBy('submitted_games', 'DESC')
            ->get();
            
    }

}
