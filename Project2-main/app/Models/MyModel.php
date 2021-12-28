<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MyModel
{
    use HasFactory;

    //Home
    static function getCountMajor()
    {
        return DB::table('majors')->count();
    }

    static function getCountClass()
    {
        return DB::table('classes')->count();
    }

    static function getCountStudent()
    {
        return DB::table('students')->count();
    }

    //Major
    static function getMoneyMajor()
    {
        return DB::table('totalmoneys')->get();
    }

    static function createMajor($name, $money)
    {
        return DB::table('majors')->insert([
            'id' => NULL,
            'name_major' => $name,
            'id_totalmoney' => $money
        ]);
    }

    static function getAllMajor()
    {
        return DB::table('majors')
            ->join('totalmoneys', 'majors.id_totalmoney', '=', 'totalmoneys.id')
            ->select('majors.id', 'majors.name_major', 'totalmoneys.money')
            ->get();
    }

    static function getIdMajor($id)
    {
        return DB::select("SELECT majors.id, majors.name_major, totalmoneys.id, totalmoneys.money FROM majors INNER JOIN totalmoneys ON majors.id_totalmoney = totalmoneys.id WHERE majors.id = '$id'");
    }

    static function updateMajor($id, $name, $money)
    {
        return DB::update("UPDATE majors SET name_major='$name', id_totalmoney='$money' WHERE id='$id'");
    }

    static function destroyMajor($id)
    {
        return DB::delete("DELETE FROM majors WHERE id='$id'");
    }

    // Class

    static function getNameMajor()
    {
        return DB::table('majors')->get();
    }

    static function getSchoolYear()
    {
        return DB::table('schoolyears')->get();
    }

    static function createClass($name, $major, $schoolyear)
    {
        return DB::table('classes')
            ->insert([
                'id_class' => NULL,
                'name_class' => $name,
                'id_major' => $major,
                'id_schoolyear' => $schoolyear
            ]);
    }

    static function getALLClass()
    {
        return DB::table('classes')
            ->join('majors', 'classes.id_major', '=', 'majors.id')
            ->select('classes.id_class', 'classes.name_class', 'majors.name_major')
            ->get();
    }

    static function getIdClass($id)
    {
        return DB::select("SELECT classes.id_class, classes.name_class, majors.id, majors.name_major FROM classes INNER JOIN majors ON classes.id_major = majors.id WHERE classes.id_class = '$id'");
    }

    static function updateClass($id, $name, $major)
    {
        return DB::update("UPDATE classes SET name_class='$name', id_major = '$major' WHERE id_class='$id'");
    }

    static function destroyClass($id)
    {
        return DB::delete("DELETE FROM classes WHERE id_class='$id'");
    }

    static function detailClass($id)
    {
        return DB::select("SELECT students.id_student, students.student_code, students.name_student, students.gender, students.phone, students.dob, students.address, classes.id_class, classes.name_class FROM students INNER JOIN classes ON students.id_classes = classes.id_class WHERE students.id_classes = $id");
    }
    static function nameClass($id)
    {
        return DB::select("SELECT students.id_student, students.student_code, students.name_student, students.gender, students.phone, students.dob, students.address, classes.id_class, classes.name_class FROM students INNER JOIN classes ON students.id_classes = classes.id_class WHERE students.id_classes = $id");
    }

    //Student
    static function getMoneyClass()
    {
        return DB::table('classes')
            // ->join('classes','students.id_class','=','classes.id_class')
            ->join('majors', 'classes.id_major', '=', 'majors.id')
            ->join('totalmoneys', 'majors.id_totalmoney', '=', 'totalmoneys.id')
            ->select('classes.*', 'majors.*', 'totalmoneys.*')
            ->get();
    }
    static function getScholarchip()
    {
        return DB::table('scholarchips')->get();
    }

    static function getTollType()
    {
        return DB::table('tolltypes')->get();
    }

    static function getAllStudent()
    {
        return DB::table('students')
            ->join('classes', 'students.id_classes', '=', 'classes.id_class')
            ->join('scholarchips', 'students.id_scholarchip', '=', 'scholarchips.id_hb')
            ->get();
    }

    static function createStudent($student_code, $name, $gender, $phone, $dob, $address, $class, $scholarchip, $tolltype)
    {
        return DB::table('students')
            ->insert([
                'id_student' => NULL,
                'student_code' => $student_code,
                'name_student' => $name,
                'gender' => $gender,
                'phone' => $phone,
                'dob' => $dob,
                'address' => $address,
                'number_payment' => 0,
                'id_classes' => $class,
                'id_scholarchip' => $scholarchip,
                'id_tolltype' => $tolltype,
            ]);
    }

    static function getIdStudent($id)
    {
        return DB::select("SELECT students.*, classes.*, scholarchips.*, tolltypes.* FROM students 
        INNER JOIN classes ON students.id_classes = classes.id_class 
        INNER JOIN scholarchips ON students.id_scholarchip = scholarchips.id_hb 
        INNER JOIN tolltypes ON students.id_tolltype = tolltypes.id_type
        WHERE students.id_student = '$id'");
    }

    static function updateStudent($id, $student_code, $name, $class, $gender, $phone, $dob, $address, $scholarchip, $tolltype)
    {
        return DB::update("UPDATE students SET student_code='$student_code', name_student='$name', gender= '$gender', phone='$phone', dob='$dob', address='$address', id_classes='$class', id_scholarchip='$scholarchip', id_tolltype='$tolltype' WHERE id_student='$id'");
    }

    static function destroyStudent($id)
    {
        return DB::delete("DELETE FROM students WHERE id_student ='$id'");
    }

    // Học-phí
    static function getListTuition()
    {
        // return DB::select("SELECT students.id, students.student_code, students.name_student, classes.id_class, classes.name_class, totalmoneys.id, totalmoneys.money FROM students INNER JOIN classes ON students.id_class = classes.id_class INNER JOIN totalmoneys ON students.id_scholarchip = sch ");
        return DB::table('students')
            ->join('classes', 'students.id_classes', '=', 'classes.id_class')
            ->join('schoolyears', 'classes.id_schoolyear', '=', 'schoolyears.id')
            ->join('scholarchips', 'students.id_scholarchip', '=', 'scholarchips.id_hb')
            ->join('tolltypes', 'students.id_tolltype', '=', 'tolltypes.id_type')
            ->join('majors', 'classes.id_major', '=', 'majors.id')
            ->join('totalmoneys', 'majors.id_totalmoney', '=', 'totalmoneys.id')
            ->select('students.*', 'scholarchips.*', 'tolltypes.*', 'classes.*', 'schoolyears.*', 'majors.*', 'totalmoneys.*')
            ->get();
    }

    static function collectTuition($id)
    {
        return DB::select("SELECT students.*,classes.*,schoolyears.*,scholarchips.*,majors.*,totalmoneys.*,tolltypes.* FROM students
        INNER JOIN classes ON students.id_classes = classes.id_class
        INNER JOIN schoolyears ON classes.id_schoolyear = schoolyears.id
        INNER JOIN scholarchips ON students.id_scholarchip  = scholarchips.id_hb
        INNER JOIN tolltypes ON students.id_tolltype = tolltypes.id_type
        INNER JOIN majors ON classes.id_major = majors.id
        INNER JOIN totalmoneys ON majors.id_totalmoney = totalmoneys.id
        WHERE students.id_student = '$id'");
    }

    static function money($id)
    {
        $rs = DB::select("SELECT students.*,classes.*,scholarchips.*,majors.*,totalmoneys.*,tolltypes.* FROM students
        INNER JOIN classes ON students.id_classes = classes.id_class
        INNER JOIN scholarchips ON students.id_scholarchip  = scholarchips.id_hb
        INNER JOIN tolltypes ON students.id_tolltype = tolltypes.id_type
        INNER JOIN majors ON classes.id_major = majors.id
        INNER JOIN totalmoneys ON majors.id_totalmoney = totalmoneys.id
        WHERE students.id_student = '$id'");

        $totalmoney = 0;
        $discount = 0;
        $number_batch = 0;
        foreach ($rs as $item) {
            $discount = $item->discount / 100;
            $number_batch = $item->number_batch;
            $totalmoney = $item->money - $item->money_hb;
        }
        $totalmoneyS = $totalmoney - ($totalmoney * $discount);
        $money = (round($totalmoneyS / 30 * $number_batch, -3));
        return $money;
    }

    static function createInvoice($money, $id_student, $number_batch, $id_admin)
    {
        DB::table('invoices')
            ->insert([
                'id_invoice' => NULL,
                'totalamount' => $money,
                'time' => Carbon::now('Asia/Ho_Chi_Minh'),
                'id_student' => $id_student,
                'id_admin' => $id_admin,
                'batch' => $number_batch
            ]);
        $rs1 = DB::table('students')
            ->join('tolltypes', 'tolltypes.id_type', '=', 'students.id_tolltype')
            ->where('id_student', '=', $id_student)
            ->get();

        $number_payment2 = 0;
        $ordernumber2 = 0;
        foreach ($rs1 as $item) {
            $number_payment2 = $item->number_payment;
            $ordernumber2 = $item->number_batch;
        }
        $updateStud = ['number_payment' => $number_payment2 + $ordernumber2];
        DB::table('students')
            ->where('id_student', '=', $id_student)
            ->update($updateStud);
    }

    static function getListInvoice()
    {
        return DB::table('invoices')
            ->join('students', 'invoices.id_student', '=', 'students.id_student')
            ->join('classes', 'students.id_classes', '=', 'classes.id_class')
            ->join('schoolyears', 'classes.id_schoolyear', '=', 'schoolyears.id')
            ->join('tolltypes', 'invoices.id_tolltype', '=', 'tolltypes.id_type')
            ->select('invoices.*', 'students.*', 'classes.*', 'schoolyears.*', 'tolltypes.*')
            ->get();
    }

    static function getListStatiscal($id)
    {
        return DB::table('students')
            ->join('classes', 'students.id_classes', '=', 'classes.id_class')
            ->join('schoolyears', 'classes.id_schoolyear', '=', 'schoolyears.id')
            ->join('tolltypes', 'students.id_tolltype', '=', 'tolltypes.id_type')
            ->where('students.id_classes','=',$id)
            ->get();
    }

    static function wave()
    {
        return DB::table('schoolyears')->get();
    }

    static function increaseWave($id)
    {
        $wave = DB::table('schoolyears')
            ->where('id', '=', $id)
            ->get();
        $currentbatch = 0;
        foreach ($wave as $item) {
            $currentbatch = $item->currentbatch;
        }
        $updateCurrentBatch = ['currentbatch' => $currentbatch + 1];
        $updateDate = ['date' => Carbon::now('Asia/Ho_Chi_Minh')];
        DB::table('schoolyears')
            ->where('id', '=', $id)
            ->update($updateCurrentBatch, $updateDate);
    }

    static function getIdInvoice($id)
    {
        return DB::table('invoices')
            ->join('students', 'invoices.id_student', '=', 'students.id_student')
            ->join('tolltypes', 'students.id_tolltype', '=', 'tolltypes.id_type')
            ->join('admins', 'invoices.id_admin', '=', 'admins.id')
            ->join('classes', 'students.id_classes', '=', 'classes.id_class')
            ->where('invoices.id_student', '=', $id)
            ->get();
    }

    // Admin
    static function infoAdmin($id)
    {
        return DB::table('admins')->where('id', '=', $id)
            ->get();
    }
    static function listAccount()
    {
        return DB::table('admins')->get();
    }

    static function destroyAcount($id)
    {
        return DB::table('admins')->where('id', '=', $id)->update([
            'is_active' => 0,
        ]);
    }
    static function acceptAccount($id)
    {
        return DB::table('admins')->where('id', '=', $id)->update([
            'is_active' => 1,
        ]);
    }

    static function createStaff($name, $email, $phone, $address)
    {
        return DB::table('admins')->insert([
            'id' => NULL,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'password' => bcrypt('123'),
            'is_active' => 1,
            'level' => 2,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
    }

    static function updateAdmin($id, $name, $email, $phone, $address)
    {
        return DB::update("UPDATE admins SET name='$name', email ='$email', phone = '$phone', address='$address' WHERE id = '$id'");
    }

    static function updatePw($id, $password, $new_password)
    {
        return DB::table('admins')
            ->where('id', '=', $id)
            ->where('password', '=', $password)
            ->update(['password' => bcrypt($new_password)]);
    }

    //Look up
    static function listInvoice($student_code){
        return DB::table('students')
            ->join('classes','students.id_classes','=','classes.id_class')
            ->join('schoolyears','classes.id_schoolyear','=','schoolyears.id')
            ->join('tolltypes','students.id_tolltype','=','tolltypes.id_type')
            ->where('student_code','like',$student_code)
            ->get();
    } 

    static function listInvoiceStudent($id){
        return DB::table('invoices')
            ->join('students', 'invoices.id_student', '=', 'students.id_student')
            ->join('tolltypes', 'students.id_tolltype', '=', 'tolltypes.id_type')
            ->join('admins', 'invoices.id_admin', '=', 'admins.id')
            ->join('classes', 'students.id_classes', '=', 'classes.id_class')
            ->where('invoices.id_student', '=', $id)
            ->get();
    }

    static function moneyStudent($student_code)
    {
        $rs = DB::select("SELECT students.*,classes.*,scholarchips.*,majors.*,totalmoneys.*,tolltypes.* FROM students
        INNER JOIN classes ON students.id_classes = classes.id_class
        INNER JOIN scholarchips ON students.id_scholarchip  = scholarchips.id_hb
        INNER JOIN tolltypes ON students.id_tolltype = tolltypes.id_type
        INNER JOIN majors ON classes.id_major = majors.id
        INNER JOIN totalmoneys ON majors.id_totalmoney = totalmoneys.id
        WHERE students.student_code = '$student_code'");

        $totalmoney = 0;
        $discount = 0;
        $number_batch = 0;
        foreach ($rs as $item) {
            $discount = $item->discount / 100;
            $number_batch = $item->number_batch;
            $totalmoney = $item->money - $item->money_hb;
        }
        $totalmoneyS = $totalmoney - ($totalmoney * $discount);
        $money = (round($totalmoneyS / 30 * $number_batch, -3));
        return $money;
    }
}
