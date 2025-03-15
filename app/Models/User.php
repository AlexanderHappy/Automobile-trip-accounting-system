<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['user_name', 'permissions', 'password'];


    public function getAuthIdentifierName(): string
    {
        return 'user_name';
    }

    public function getAuthIdentifier()
    {
        return $this->attributes['user_name'];
    }

    public function getAuthPasswordName(): string
    {
        return 'password';
    }

    public function getAuthPassword()
    {
        return $this->attributes['password'];
    }

    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}
