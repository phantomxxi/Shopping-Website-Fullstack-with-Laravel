<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    private $user;
    // dependency model User
    public function __construct(User $user, Role $role)
    {
        $this->user=$user;
        $this->role=$role;
    }

    public function index(){
        $users = $this->user->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create(){
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(Request $request){
        $user = $this->user->create([
           'name' => $request-> name,
           'email' => $request -> email,
           'password' => Hash::make($request->password),
        ]);
        $roleIds = $request -> role_id;
        $user->roles()->attach($roleIds);
        return redirect()->route('users.index');
    }
}
