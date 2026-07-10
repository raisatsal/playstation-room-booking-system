<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // Hanya Admin dan Operator yang boleh akses panel /admin
        return $this->hasRole(['Admin', 'Operator']);
    }

    // Relasi One to One ke Pelanggan berdasarkan email
    public function pelanggan(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Pelanggan::class, 'email', 'email');
    }
}