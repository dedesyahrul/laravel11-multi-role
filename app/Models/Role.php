<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'guard_name', 
        'is_locked'
    ];

    protected $casts = [
        'is_locked' => 'boolean',
    ];

    /**
     * Relasi ke permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions');
    }

    /**
     * Relasi ke users
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
