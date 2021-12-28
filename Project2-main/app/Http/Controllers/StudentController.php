<?php

namespace App\Http\Controllers;

use App\Models\MyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use App\Imports\ExcelImport;
use App\Exports\ExcelExport;
use Excel;
use App\Models\StudentModel;

class StudentController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth.admin');
    }

    function getMoneyClassScholarchip(){
        $moneyClass = MyModel::getMoneyClass();
        $hb = MyModel::getScholarchip();
        $tolltype = MyModel::getTollType();
        return view('admin.student.create',['moneyClass'=>$moneyClass,'hb'=>$hb,'tolltype' => $tolltype]);
    }
    function createStudent(Request $request){
        $validator = Validator::make($request->all(),[
            'student_code' => 'required|min:7|unique:students',
            'name' =>'required',
            'class' => 'required',
            'gender' => 'required',
            'phone' => 'required|numeric|unique:students',
            'dob' => 'required',
            'address' => 'required',
            'scholarchip' => 'required',
            'tolltype' => 'required',
        ],[
            'student_code.required' => 'Mã sinh viên không được trống',
            'student_code.unique' => 'Mã sinh viên đã tồn tại',
            'student_code.min' => 'Mã sinh viên tối thiểu 7 kí tự',
            'name.required' => 'Tên sinh viên không được trống',
            'class.required' => 'Tên lớp không được trống',
            'gender.required' => 'Giới tính chưa được chọn',
            'phone.required' => 'Số điện thoại không được trống',
            'phone.numeric' => 'Số điện thoại chỉ chứa số',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'address.required' => 'Địa chỉ không được trống',
            'dob.required' => 'Ngày sinh không được trống',
            'scholarchip.required' => 'Học bổng chưa được chọn',
            'tolltype.required' => 'Hình thức thu học phí chưa được chọn',

        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $student_code = $request->input('student_code');
        $name = $request->input('name');
        $class = $request->input('class');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        $dob = $request->input('dob');
        $address = $request->input('address');
        $scholarchip = $request->input('scholarchip');
        $tolltype = $request->input('tolltype');

        $rs = MyModel::createStudent($student_code,$name,$gender,$phone,$dob,$address,$class,$scholarchip,$tolltype);

        Toastr::success('Thành công');
        return redirect('admin/student/list');
    }

    function getAllStudent(){
        $rs = MyModel::getAllStudent();
        return view('admin/student/list', ['rs' => $rs]);
    }

    function editStudent($id){
        $class = MyModel::getMoneyClass();
        $student = MyModel::getIdStudent($id)[0];
        $hb = MyModel::getScholarchip();
        $tolltype = MyModel::getTollType();
        return view('admin/student/edit',['class' => $class,'student'=>$student,'hb'=>$hb,'tolltype'=>$tolltype]);
    }

    function updateStudent(Request $request, $id){
        $student_code = $request->input('student_code');
        $name = $request->input('name');
        $class = $request->input('class');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        $dob = $request->input('dob');
        $address = $request->input('address');
        $scholarchip = $request->input('scholarchip');
        $tolltype = $request->input('tolltype');

        $rs = MyModel::updateStudent($id,$student_code,$name,$class,$gender,$phone,$dob,$address,$scholarchip,$tolltype);
        Toastr::success('Thành công');
        return redirect('admin/student/list');
    }

    function destroyStudent($id){
        $rs = MyModel::destroyStudent($id);
        Toastr::success('Thành công');
        return redirect('admin/student/list');
    }

    function export_excel(){
        return Excel::download(new ExcelExport , 'student.xlsx');
    }

    function import_excel(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImport, $path);
        return back();

    }

    
}
