<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{

    public function index() {

        $departments = Department::paginate(5);

        return view('admin.departments.index', compact(['departments']));

    }

    public function create() {

        return view('admin.departments.create');

    }

    public function store(Request $request) {

        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'image' => 'required|image',
            'icon' => 'required|image|mimes:svg',
            'color' => 'required'
        ]);

        $image_name = time().'.'.request()->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/departmentsImages/'), $image_name);

        $icon = time().'.'.$request->icon->getClientOriginalExtension();
        $request->icon->move(public_path('uploads/svg/'), $icon);

        $department = new Department;
        $department->setTranslations('title', ['ar' => $request->title_ar, 'en' => $request->title_en]);
        $department->image = $image_name;
        $department->icon = $icon;
        $department->color = $request->color;
        $department->save();

        return redirect(url('admin/departments'))->with('added', 'تمت اضافة القسم الجديد بنجاح');

    }

    public function edit(Department $department) {

        return view('admin.departments.edit', compact(['department']));

    }

    public function update(Request $request, Department $department) {

        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'image' => 'image',
            'icon' => 'image|mimes:svg',
        ]);

        if(isset($request->image) && $request->image != ''){
            $new_image = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads/departmentsImages/'), $new_image);
            if(file_exists(public_path('uploads/departmentsImages/'.$department->image))){
                unlink(public_path('uploads/departmentsImages/'.$department->image));
            }
            $department->image = $new_image;
        }

        if(isset($request->icon) && $request->icon != ''){
            $icon = time().'.'.request()->icon->getClientOriginalExtension();
            request()->icon->move(public_path('uploads/svg/'), $icon);
            if(file_exists(public_path('uploads/svg/'.$department->icon))){
                unlink(public_path('uploads/svg/'.$department->icon));
            }
            $department->icon = $icon;
        }

        if(isset($request->color) && $request->color != ''){
            $department->color = $request->color;
        }

        $department->setTranslations('title', ['ar' => $request->title_ar, 'en' => $request->title_en]);
        $department->save();

        return redirect(url('admin/departments'))->with('updated', 'تم تعديل بيانات القسم بنجاح');

    }

    public function delete(Department $department) {

        if($department->specialty->count() != 0) {

            return back()->with('delete_error', 'عفوا يحتوي هذا القسم علي تخصصات تنتمي اليه، لذلك لا يمكنك حذفه');

        }

        if(file_exists(public_path('uploads/departmentsImages/'.$department->image))){
            unlink(public_path('uploads/departmentsImages/'.$department->image));
        }

        if(file_exists(public_path('uploads/svg/'.$department->icon))){
            unlink(public_path('uploads/svg/'.$department->icon));
        }

        $department->delete();

        return back()->with('deleted', 'تم حذف القسم بنجاح');

    }

}
