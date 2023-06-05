<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'role_id',
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

    /**
     * Define a relationship between User and Role models.
     * User belongs to Role.
     */
    public function role()
    {
      return $this->belongsTo(Role::class);
    }

    /**
     * Authorize the User based on given roles.
     * Abort with 401 Unauthorized if User does not have any of the specified roles.
     */
    public function authorizeRoles($roles)
    {
      if ($this->hasAnyRole($roles)) {
        return true;
      }
      abort(401, 'This action is unauthorized.');
    }

    /**
     * Check if User has any of the specified roles.
     * Return true if User has any of the roles, otherwise return false.
     */
    public function hasAnyRole($roles)
    {
      if (is_array($roles)) {
        foreach ($roles as $role) {
          if ($this->hasRole($role)) {
            return true;
          }
        }
      } else {
        if ($this->hasRole($roles)) {
          return true;
        }
      }
      return false;
    }

    /**
     * Check if User has the specified role.
     * Return true if User has the role, otherwise return false.
     */
    public function hasRole($role)
    {
      if ($this->role()->where('name', $role)->first()) {
        return true;
      }
      return false;
    }
}
