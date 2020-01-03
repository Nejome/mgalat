<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Spatie\Permission\Models\Permission;

class UsersControllers extends Controller
{

    public function index() {

        $users = User::where('id', '!=', 1)->get();

        return view('admin.users.index', compact(['users']));

    }

    public function create() {

        $permissions = Permission::all();

        return view('admin.users.create', compact(['permissions']));

    }

    public function store(Request $request) {

        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $permissions = $request['permissions'];

        if (isset($permissions)) {
            foreach ($permissions as $permission) {
                $permission_r = Permission::where('id', '=', $permission)->firstOrFail();
                $user->givePermissionTo($permission_r);
            }
        }

        return redirect(url('admin/users'))
            ->with('added', 'تمت اضافة المدير بنجاح');

    }

    public function edit(User $user) {

        $permissions = Permission::all();

        $user_permissions = $user->permissions;

        return view('admin.users.edit', compact(['user', 'permissions', 'user_permissions']));

    }

    public function update(Request $request, User $user) {

        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'password'=>'confirmed'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if(isset($request->password) && $request->password != ''){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $permissions = $request['permissions'];

        if (isset($permissions)) {
            $user->permissions()->sync($permissions);
        }
        else {
            $user->permissions()->detach();
        }
        return redirect(url('admin/users'))
            ->with('updated', 'تم تعديل بيانات المدير بنجاح');

    }

    public function profile() {

        $user = Auth::user();

        return view('admin.users.profile', compact(['user']));

    }

    public function updateProfile(Request $request) {

        $user = Auth::user();

        $this->validate($request, [
           'name' => 'required',
           'email' => 'required|email|unique:users,email,'.$user->id
        ]);

        if(isset($request->old_password) && $request->old_password != ''){

            $messages = [
                'old_password.required' => 'عفوا قم بإدخال كلمة المرور القديمة',
                'password.required' => 'عفوا قم بإدخال كلمة المرور الجديدة',
                'password.confirmed' => 'كلمة المرور وتأكيد كلمة المرور غير متطابقين',
                'password_confirmation.required' => 'عفوا قم بإدخال تأكيد كلمة المرور'
            ];

            $this->validate($request, [
                'password' => 'required|confirmed',
            ], $messages);

            if(Hash::check($request->old_password, $user->password)){

                $user->password = Hash::make($request->password);

            }else {

                session()->flash('wrong_password', 'عفوا كلمة القديمة التي ادخلتها غير صحيحة');

                return redirect()->back();

            }

        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        session()->flash('updated', 'تم تعديل بياناتك بنجاح');
        return redirect()->back();

    }

    public function delete(User $user) {

        $user->delete();

        return back()->with('deleted', 'تم حذف المدير بنجاح');

    }

}
