<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'guard_name', 'permission_group_id'];

    // Relasi ke roles (Many-to-Many)
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions');
    }
}
