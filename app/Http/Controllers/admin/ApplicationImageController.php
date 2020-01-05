<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ApplicationImage;
use File;

class ApplicationImageController extends Controller
{

    public function store(Request $request) {

        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'image' => 'required|image',
        ]);

        $image = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('uploads/applicationImages/'), $image);

        $gallery = new ApplicationImage;
        $gallery->setTranslations('title', ['ar' => $request->title_ar, 'en' => $request->title_en]);
        $gallery->image = $image;
        $gallery->save();

        session()->flash('created', 'تمت اضافة الصورة الجديدة بنجاح');
        return redirect(url('admin/settings'));

    }

    public function delete(ApplicationImage $image) {

        if(file_exists(public_path('uploads/applicationImages/'.$image->image))){
            File::delete(public_path('uploads/applicationImages/'.$image->image));
        }

        $image->delete();

        session()->flash('deleted', 'تم حذف الصورة بنجاح');
        return redirect(url('admin/settings'));

    }

}
