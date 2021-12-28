<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['id_student','student_code','name_student','gender','phone', 'dob','address','number_payment','id_classes','id_scholarchip','id_tolltype'];
}