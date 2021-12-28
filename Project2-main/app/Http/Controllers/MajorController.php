<?php

namespace App\Http\Controllers;

use App\Models\MyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;

class MajorController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth.admin');
    }

    function getMoneyMajor(){
        $rs = MyModel::getMoneyMajor();
        return view('admin.major.create',['rs'=>$rs]);
    }

    function createMajor(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'money' => 'required',
        ],[
            'name.required' => 'Tên ngành học không được trống',
            'money.required' => 'Học phí chưa được chọn',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $name = $request->input('name');
        $money = $request->input('money');

        $rs = MyModel::createMajor($name, $money);
        Toastr::success('Thành công');
        return redirect('admin/major/list');
    }

    function getAllMajor()
    {
        $rs = MyModel::getAllMajor();
        return view('admin/major/list', ['rs' => $rs]);
    }

    function editMajor($id){
        $major = MyModel::getIdMajor($id)[0];
        $money = MyModel::getMoneyMajor();
        return view('admin/major/edit',['major'=>$major,'money'=>$money]);
    }

    function updateMajor(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'money' => 'required',
        ],[
            'name.required' => 'Tên ngành học không được trống',
            'money.required' => 'Học phí chưa được chọn',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $name = $request->input('name');
        $money = $request->input('money');

        $rs = MyModel::updateMajor($id,$name, $money);
        // return view('/major/create');

        Toastr::success('Thành công');

         return redirect('admin/major/list');
    }

    function destroyMajor($id){
        $rs = MyModel::destroyMajor($id);
        Toastr::success('Thành công');
        return redirect('admin/major/list');
    }

}
