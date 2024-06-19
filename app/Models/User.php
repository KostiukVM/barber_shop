<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const ROLE_USER = 0;
    public const ROLE_WORKER = 1;
    public const ROLE_MANAGER = 2;
    public const ROLE_ADMIN = 3;

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
    private mixed $role;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function isManager()
    {
        return $this->roles()->where('name', 'manager')->exists();
    }

    public function isAdmin()
    {
        return $this->roles()->where('name', 'admin')->exists();
    }

    public function isBarber()
    {
        return $this->roles()->where('name', 'barber')->exists();
    }
    public function isJuniorBarber()
    {
        return $this->roles()->where('name', 'juniorBarber')->exists();
    }

    public function hasRole($role)
    {
        // Перевірка, чи користувач має задану роль
        return $this->role === $role;
    }

}
