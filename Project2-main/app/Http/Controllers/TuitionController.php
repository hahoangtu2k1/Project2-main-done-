<?php

namespace App\Http\Controllers;

use App\Models\MyModel;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class TuitionController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth.admin');
    }
    
    function getListTuition(){
        $list = MyModel::getListTuition();
        return view('admin.tuition.list',['list'=>$list]);
    }

    function collectTuition($id){
        $rs = MyModel::collectTuition($id)[0];
        $money = MyModel::money($id);
        return view('admin/tuition/collect-tuition',['rs'=>$rs,'money'=>$money]);
    }

    function createInvoice(Request $request){
        $money = $request->input('money');
        $id_student = $request->input('id_student');
        $id_admin = $request->input('id_admin');
        $number_batch = $request->input('number_batch');
        
        $rs = MyModel::createInvoice($money,$id_student,$number_batch,$id_admin);
        Toastr::success('Thành công');
        return redirect('admin/tuition/list');
    }

    function getListStudent(){
        $stud = MyModel::getAllStudent();
        return view('admin/tuition/invoice',['stud'=>$stud]);
    }

    function getListStatistical($id){
        $batch = MyModel::getListStatiscal($id);
        return view('admin/tuition/statistical',['batch'=>$batch]);
    }
    function wave(){
        $wave = MyModel::wave();
        return view('admin/tuition/wave',['wave'=>$wave]);
    }

    function increaseWave(Request $request,$id){
        $increaseWave = MyModel::increaseWave($id);
        Toastr::success('Thành công');
        return redirect()->back();
    }

    function invoiceDetail($id){
        $rs = MyModel::getIdInvoice($id);
        return view('admin/tuition/detail',['rs'=>$rs]);
    }

    function listInvoice($id){
        $invoice = MyModel::getIdInvoice($id);
        return view('admin/tuition/list-invoice',['invoice'=>$invoice]);
    }

    function getClass(){
        $rs = MyModel::getALLClass();
        return view('admin/tuition/list-class',['rs'=>$rs]);
    }
}
