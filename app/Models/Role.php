<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Define a relationship between User and Role models.
     * Role has many Users.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
