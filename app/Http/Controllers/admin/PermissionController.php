<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index() {

        $permissions = Permission::all();

        $roles = Role::get();

        return view('admin.permissions.index')->with(['permissions' => $permissions, 'roles' => $roles]);

    }


    public function store(Request $request) {

        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) {
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail();

                $permission = Permission::where('name', '=', $name)->first();
                $r->givePermissionTo($permission);
            }
        }

        return redirect(url('admin/dev/permissions'))
            ->with('added',
                'Permission'. $permission->name.' added!');

    }

    public function show($id) {
        return redirect(url('admin/dev/permissions'));
    }

    public function edit($id) {

        $permission = Permission::findOrFail($id);

        return view('admin.permissions.edit', compact('permission'));

    }

    public function update(Request $request, $id) {
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        $input = $request->all();
        $permission->fill($input)->save();

        return redirect(url('admin/dev/permissions'))
            ->with('updated',
                'Permission'. $permission->name.' updated!');

    }

    public function destroy($id) {
        $permission = Permission::findOrFail($id);

        if ($permission->name == "Administer roles & permissions") {
            return redirect(url('admin/dev/permissions'))
                ->with('deleted',
                    'Cannot delete this Permission!');
        }

        $permission->delete();

        return redirect(url('admin/dev/permissions'))
            ->with('flash_message',
                'Permission deleted!');

    }

}
