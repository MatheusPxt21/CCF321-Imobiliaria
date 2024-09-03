<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['nome', 'email', 'senha'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['senha'] = $value;
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }
}
