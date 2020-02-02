<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{

    public function index() {

        $countries = Country::paginate(10);

        return view('admin.countries.index', compact(['countries']));

    }

    public function store(Request $request) {

        $this->validate($request, [
            'title_en' => 'required',
            'title_ar' => 'required',
            'code' => 'required|numeric',
            'flag' => 'required|image',
        ]);

        $flag = time().'.'.request()->flag->getClientOriginalExtension();
        $request->flag->move(public_path('uploads/countries/'), $flag);

        $country = new Country();
        $country->setTranslations('title', ['ar' => $request->title_ar, 'en' => $request->title_en]);
        $country->code = $request->code;
        $country->flag = $flag;
        $country->save();

        session()->flash('created', 'تمت اضافة الدولة الجديده بنجاح');

        return redirect()->back();

    }

    public function edit(Country $country) {

        return view('admin.countries.edit', compact(['country']));

    }

    public function update(Request $request, Country $country) {

        $this->validate($request, [
            'title_en' => 'required',
            'title_ar' => 'required',
            'code' => 'required|numeric',
            'flag' => 'image',
        ]);

        if(isset($request->flag) && $request->flag != ''){
            $flag = time().'.'.request()->flag->getClientOriginalExtension();
            request()->flag->move(public_path('uploads/countries/'), $flag);
            if(file_exists(public_path('uploads/countries/'.$country->flag))){
                unlink(public_path('uploads/countries/'.$country->flag));
            }
            $country->flag = $flag;
        }

        $country->setTranslations('title', ['ar' => $request->title_ar, 'en' => $request->title_en]);
        $country->code = $request->code;
        $country->save();

        session()->flash('updated', 'تم تعديل بيانات الدولة بنجاح');

        return redirect(url('/admin/countries'));

    }

    public function delete(Country $country){

        if($country->providers->count()){

            session()->flash('cannotDelete', 'عفوا ينتمي الي هذه الدولة عدد من مزودي الخدمة لذلك لا يمكنك حذفها');

            return redirect(url('/admin/countries'));


        }else {

            if(file_exists(public_path('uploads/countries/'.$country->flag))){
                unlink(public_path('uploads/countries/'.$country->flag));
            }

            $country->delete();

            session()->flash('deleted', 'تم حذف الدولة بنجاح');

            return redirect(url('/admin/countries'));

        }

    }

}
