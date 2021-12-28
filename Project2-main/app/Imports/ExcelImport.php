<?php

namespace App\Imports;

use App\Models\StudentModel;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StudentModel([
            'student_code' => $row[0],
            'name_student' => $row[1],
            'gender' => $row[2],
            'phone' => $row[3], 
            'dob' => $row[4],
            'address' => $row[5],
            'number_payment' => $row[6],
            'id_classes' => $row[7],
            'id_scholarchip' => $row[8],
            'id_tolltype'=> $row[9],
        ]);
    }
}
