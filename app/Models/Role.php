<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function role_permissions()
    {
        return $this->hasMany (RolePermission::class);   
    }
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class,'role_permissions');

    }

}
