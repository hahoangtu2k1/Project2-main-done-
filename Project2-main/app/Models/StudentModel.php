<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class StudentModel extends Model
{
    protected $fillable = ['student_code','name_student','gender','phone', 'dob','address','number_payment','id_classes','id_scholarchip','id_tolltype'];
    protected $primaryKey = 'id_student';
    protected $table = 'students';
}
