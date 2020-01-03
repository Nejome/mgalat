<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index() {

        $roles = Role::all();

        $permissions = Permission::all();

        return view('admin.roles.index')->with(['roles' => $roles, 'permissions' => $permissions]);

    }


    public function store(Request $request) {

        $this->validate($request, [
                'name'=>'required|unique:roles',
                'permissions' =>'required',
            ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;

        $permissions = $request['permissions'];

        $role->save();

        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail();
            $role = Role::where('name', '=', $name)->first();
            $role->givePermissionTo($p);
        }

        return redirect(url('admin/dev/roles'))
            ->with('added',
                'Role'. $role->name.' added!');
    }


    public function show($id) {

        return redirect(url('admin/dev/roles'));

    }

    public function edit($id) {

        $role = Role::findOrFail($id);

        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));

    }

    public function update(Request $request, $id) {

        $role = Role::findOrFail($id);

        $this->validate($request, [
            'name'=>'required|unique:roles,name,'.$id,
            'permissions' =>'required',
        ]);

        $input = $request->except(['permissions']);
        $permissions = $request['permissions'];
        $role->fill($input)->save();

        $p_all = Permission::all();

        foreach ($p_all as $p) {
            $role->revokePermissionTo($p);
        }

        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail();
            $role->givePermissionTo($p);
        }

        return redirect(url('admin/dev/roles'))
            ->with('updated',
                'Role'. $role->name.' updated!');
    }


    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect(url('admin/dev/roles'))
            ->with('deleted',
                'Role deleted!');

    }

}
