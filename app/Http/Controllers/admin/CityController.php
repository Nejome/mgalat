<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{

    public function index() {

        $cities = City::paginate(10);

        return view('admin.cities.index', compact(['cities']));

    }

    public function store(Request $request) {

        $this->validate($request, [
            'title_en' => 'required',
            'title_ar' => 'required',
        ]);

        $city = new City();
        $city->setTranslations('title', ['ar' => $request->title_ar, 'en' => $request->title_en]);
        $city->save();

        session()->flash('created', 'تمت اضافة المدينة الجديده بنجاح');

        return redirect()->back();

    }

    public function edit(City $city) {

        return view('admin.cities.edit', compact(['city']));

    }

    public function update(Request $request, City $city) {

        $this->validate($request, [
            'title_en' => 'required',
            'title_ar' => 'required',
        ]);

        $city->setTranslations('title', ['ar' => $request->title_ar, 'en' => $request->title_en]);
        $city->save();

        session()->flash('updated', 'تم تعديل بيانات المدينة بنجاح');

        return redirect(url('/admin/cities'));

    }

    public function delete(City $city){

        $city->delete();

        session()->flash('deleted', 'تم حذف المدينة بنجاح');

        return redirect(url('/admin/cities'));

    }

}
