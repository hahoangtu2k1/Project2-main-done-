<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_code' => "BKC".rand(1000,9999),
            'name_student' =>"Sinh viên ".rand(1,100),
            'gender' => rand(0,1),
            'phone' => $this->faker->phoneNumber(),
            'dob' => $this->faker->date(),
            'address' => $this->faker->streetAddress(),
            'number_payment'=> 0,
            'id_classes' => rand(1,3),
            'id_scholarchip' => rand(1,4),
            'id_tolltype' => rand(1,4)
        ];
    }
}
