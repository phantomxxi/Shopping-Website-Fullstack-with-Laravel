<?php

namespace App\Http\Controllers;

use App\Role;
use App\Traits\DeleteModelTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    private $user;
    use DeleteModelTrait;
    // dependency model User
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $roleIds = $request->role_id;
            $user->roles()->attach($roleIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '---Line:' . $exception->getLine());
        }
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $rolesOfUser = $user->roles;
        return view('admin.user.edit', compact('roles', 'user', 'rolesOfUser'));
    }

    public function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '---Line:' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->user);
    }
}
