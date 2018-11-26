<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','last_name','phone_number', 'email','user_type', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function storeUser($request)
    {
        $user = new self();
        return self::saveUser($request, $user);
    }

    public static function updateUser($request, $id)
    {
        $user = self::find($id);
        return self::saveUser($request, $user);
    }

    public static function saveUser($request, $user)
    {
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        return true;
    }
}
