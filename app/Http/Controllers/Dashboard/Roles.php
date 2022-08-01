<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Dashboard\role\StoreRoleRequest;
use App\Http\Requests\Web\Dashboard\role\UpdateRoleRequest;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use Illuminate\Http\Request;

class Roles extends Controller
{
    private $roleRepo;
    private $permissionRepo;
    public function __construct(RoleRepositoryInterface $roleRepoInterface,PermissionRepositoryInterface $permissionRepoInterface)
    {
        $this->roleRepo=$roleRepoInterface;
        $this->permissionRepo=$permissionRepoInterface;
    }
    
    public function index()
    {
        $roles = $this->roleRepo->all();
        return view('web.pages.roles.index',compact('roles'));
    }

    public function create()
    {

        $data = [
            'list' => $this->permissionRepo->groupBy('key'),
        ];
        return view('web.pages.roles.create',$data);
    }

    public function store(StoreRoleRequest $request)
    {
        $role = $this->roleRepo->create($request->except(['permissions']));
        $role->syncPermissions($request->permissions);
        
        return redirect(route('roles.index'))->with('success', 'Role Added Succesfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id ,Request $request)
    {
        // $role = $this->roleRepo->find($id , $request);
        $role = $this->roleRepo->findRoleWithPermissions($id);
        // dd($role);
        return view('web.pages.roles.update',compact('role'));
    }

    public function update(UpdateRoleRequest $request , $id)
    {
        $requestWithoutPermissions = $request->except(['permissions']);
        $requestPermissions = $request->permissions;
        $role = $this->roleRepo->find( $id , $request);
        $role->update($requestWithoutPermissions);
        $role->syncPermissions($requestPermissions);
        return redirect(route('roles.index'))->with('success', 'Role Updated Succesfully');
    }

    public function destroy($id , Request $request)
    {
        $role = $this->roleRepo->destroy($id , $request);

        return redirect(route('roles.index'))->with('success', 'Role Deleted Succesfully');        
    }
}
