<?php
use App\Models\Permission;


function getPermissions($role_id,$route){
$permission= Permission::where('slug',$route)->with('role_permission',function ($query) use($role_id){
    return $query->where('role_id',$role_id)->first();
})->first();

    if($permission && $permission->role_permission->count()>0)
    {
        return true;
    }
    return false;
}