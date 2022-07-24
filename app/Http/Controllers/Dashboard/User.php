<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;
use App\Http\Requests\Web\Dashboard\User\StoreUserRequest;
use App\Http\Requests\Web\Dashboard\User\UpdateUserRequest;

class User extends Controller
{
    private $userRepoInterface;
    public function __construct(UserRepositoryInterface $userRepoInterface)
    {
        $this->userRepoInterface = $userRepoInterface;        
    }   
    public function index()
    {
        $users = $this->userRepoInterface->all();
        return view('web.pages.users.index',compact('users'));
    }

    public function create()
    {
        return view('web.pages.users.create');
    }
    public function store(StoreUserRequest $request)
    {
        $user = $this->userRepoInterface->create($request->all());
        return redirect(route('users.index'))->with('success', 'User Added Succesfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id , Request $request)
    {
        $user = $this->userRepoInterface->find($id , $request);
        return view('web.pages.users.update',compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->userRepoInterface->update($request->all() , $id , $request);
        return redirect(route('users.index'))->with('success', 'User Updated Succesfully');
    }

    public function destroy($id , Request $request)
    {
        $user = $this->userRepoInterface->destroy($id , $request);
        return redirect(route('users.index'))->with('success','User Deleted Successfully');
    }
}
