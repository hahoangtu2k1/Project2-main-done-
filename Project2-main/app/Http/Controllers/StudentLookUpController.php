<?php

namespace App\Http\Controllers;

use App\Models\MyModel;
use Illuminate\Http\Request;

class StudentLookUpController extends Controller
{
    function lookup(){
        return view('student/lookup');
    }

    function listInvoice(Request $request){
        $student_code = $request->input('student_code');
        $rs = MyModel::listInvoice($student_code);
        $money = MyModel::moneyStudent($student_code);
        return view('student/info-student',['rs'=>$rs,'money'=>$money]);
    }

    function listInvoiceStudent($id){
        $invoice = MyModel::listInvoiceStudent($id);
        return view('student/list-invoice',['invoice'=>$invoice]);
    }
}
