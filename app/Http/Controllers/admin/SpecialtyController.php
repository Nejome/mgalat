<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Specialty;
use App\Department;

class SpecialtyController extends Controller
{

    public function index() {

        $specialties = Specialty::paginate(10);

        $departments = Department::all();

        return view('admin.specialties.index', compact(['specialties', 'departments']));

    }

    public function store(Request $request) {

        $this->validate($request, [
            'title_en' => 'required',
            'title_ar' => 'required',
            'department_id' => 'required',
            'image' => 'required|image',
        ]);

        $image_name = time().'.'.request()->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/specialtiesImages/'), $image_name);

        $specialty = new Specialty();
        $specialty->setTranslations('title', ['ar' => $request->title_ar, 'en' => $request->title_en]);
        $specialty->department_id = $request->department_id;
        $specialty->image = $image_name;
        $specialty->save();

        session()->flash('created', 'تم اضافة التخصص الجديد بنجاح');

        return redirect()->back();

    }

    public function edit(Specialty $specialty) {

        $departments = Department::all();

        return view('admin.specialties.edit', compact(['specialty', 'departments']));

    }

    public function update(Request $request, Specialty $specialty) {

        $this->validate($request, [
            'title_en' => 'required',
            'title_ar' => 'required',
            'department_id' => 'required',
            'image' => 'image',
        ]);

        if(isset($request->image) && $request->image != ''){
            $new_image = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('uploads/specialtiesImages/'), $new_image);
            if($specialty->image){
                if(file_exists(public_path('uploads/specialtiesImages/'.$specialty->image))){
                    unlink(public_path('uploads/specialtiesImages/'.$specialty->image));
                }
            }
            $specialty->image = $new_image;
        }

        $specialty->setTranslations('title', ['ar' => $request->title_ar, 'en' => $request->title_en]);
        $specialty->department_id = $request->department_id;
        $specialty->save();

        session()->flash('updated', 'تم تعديل بيانات التخصص بنجاح');

        return redirect(url('/admin/specialties'));

    }

    public function delete(Specialty $specialty){

        if($specialty->providers->count()) {

            session()->flash('delete_error', 'ينتمي الي هذا التخصص مزودي خدمات لذلك لا يمكنك حذفه');

            return redirect(url('/admin/specialties'));

        }else {

            if(file_exists(public_path('uploads/specialtiesImages/'.$specialty->image))){
                unlink(public_path('uploads/specialtiesImages/'.$specialty->image));
            }

            $specialty->delete();

            session()->flash('deleted', 'تم حذف التخصص بنجاح');

            return redirect(url('/admin/specialties'));

        }

    }

}
