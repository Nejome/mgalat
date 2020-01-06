<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Support;

class SupportController extends Controller
{

    public function index() {

        $support = Support::all();

        return view('admin.support.index', compact(['support']));

    }

    public function show(Support $support) {

        return view('admin.support.show', compact(['support']));

    }

    public function delete(Support $support) {

        $support->delete();

        return redirect(url('admin/support'))->with('deleted', 'تم حذف الاستعلام بنجاح');

    }

}
