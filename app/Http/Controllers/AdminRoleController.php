<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    use DeleteModelTrait;
    private $role;
    private $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        $roles = $this->role->paginate(10);
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissonsParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissonsParent'));
    }

    public function store(Request $request)
    {
        $role = $this->role->create([
           'name' => $request -> name,
           'display_name' => $request -> display_name
        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $permissonsParent = $this->permission->where('parent_id', 0)->get();
        $role = $this->role->find($id);
        $permissionsChecked = $role->permissions;
        return view('admin.role.edit', compact('permissonsParent', 'role', 'permissionsChecked'));
    }

    public function update($id, Request $request)
    {
        $role = $this->role->find($id);
        $role->update([
            'name' => $request -> name,
            'display_name' => $request -> display_name
        ]);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->role);
    }

    public function createPermissions()
    {
        return view('admin.permission.add');
    }
}
