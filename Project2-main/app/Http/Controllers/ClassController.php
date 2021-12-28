<?php

namespace App\Http\Controllers;

use App\Models\MyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;

class ClassController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('auth.admin');
    }

    function getMajorYear(){
        $rs = MyModel::getNameMajor();
        $year = MyModel::getSchoolYear();
        return view('admin.class.create',['rs'=>$rs,'year'=>$year]);
    }

    function createClass(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'major' => 'required',
            'schoolyear' => 'required',
        ],[
            'name.required' => 'Tên lớp không được trống',
            'major.required' => 'Ngành học chưa được chọn',
            'schoolyear.required' => 'Khoá chưa được chọn',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $name = $request->input('name');
        $major = $request->input('major');
        $schoolyear = $request->input('schoolyear');

        $rs = MyModel::createClass($name, $major, $schoolyear);

        Toastr::success('Thành công');

        return redirect('admin/class/list');
    }

    function getAllClass(){
        $classes = MyModel::getALLClass();
        return view('admin/class/list',['classes'=>$classes]);
    }

    function editClass($id){
        $class = MyModel::getIdClass($id)[0];
        $major = MyModel::getNameMajor();
        return view('admin/class/edit',['class'=>$class,'major'=>$major]);
    }

    function updateClass(Request $request, $id){
        $name = $request->input('name');
        $major = $request->input('major');

        $rs = MyModel::updateClass($id,$name,$major);
        // return view('/major/create');

        Toastr::success('Thành công');

        return redirect('admin/class/list');
    }

    function destroyClass($id){
        $rs = MyModel::destroyClass($id);
        Toastr::success('Thành công');
        return redirect('admin/class/list');
    }

    function detailClass($id){
        $detail = MyModel::detailClass($id);
        $name = MyModel::nameClass($id)[0];
        return view('admin/class/detail',['detail'=>$detail,'name'=>$name]);
    }
}
