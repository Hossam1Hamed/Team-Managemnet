<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use App\Http\Requests\Web\Dashboard\User\StoreUserRequest;
use App\Http\Requests\Web\Dashboard\User\UpdateUserRequest;
use App\Interfaces\RoleRepositoryInterface;

class User extends Controller
{
    private $userRepoInterface;
    private $roleRepo;
    public function __construct(UserRepositoryInterface $userRepoInterface , RoleRepositoryInterface $roleRepoInterface)
    {
        $this->userRepoInterface = $userRepoInterface;        
        $this->roleRepo = $roleRepoInterface;
    }   
    public function index()
    {
        $users = $this->userRepoInterface->all();
        return view('web.pages.users.index',compact('users'));
    }

    public function create()
    {
        $roles = $this->roleRepo->all();
        
        return view('web.pages.users.create',compact('roles'));
    }
    public function store(StoreUserRequest $request)
    {
        $request->password=bcrypt($request->password);
        $user = $this->userRepoInterface->create($request->all());
        $user->roles()->sync($request->role);
        return redirect(route('users.index'))->with('success', 'User Added Succesfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id , Request $request)
    {
        // $user = $this->userRepoInterface->find($id , $request);
        $user = $this->userRepoInterface->getUserWithRoles($id);
        // dd($user);
        $roles = $this->roleRepo->all();
        return view('web.pages.users.update',compact('user','roles'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->userRepoInterface->find($id , $request);
        
        // $user = $this->userRepoInterface->update($request->all() , $id , $request);
        $user->update($request->all());
        $user->roles()->sync($request->role);
        return redirect(route('users.index'))->with('success', 'User Updated Succesfully');
    }

    public function destroy($id , Request $request)
    {
        $user = $this->userRepoInterface->destroy($id , $request);
        return redirect(route('users.index'))->with('success','User Deleted Successfully');
    }
}
