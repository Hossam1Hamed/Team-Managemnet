<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;
class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{

    public function __construct(Role $model)
    {
        parent::__construct($model);
    }
    public function findRoleWithPermissions($id){
        $role = Role::where('id',$id)->with('permissions')->get();
        return $role;
    }
}