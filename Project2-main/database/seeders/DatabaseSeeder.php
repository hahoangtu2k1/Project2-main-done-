<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Admin::create(
        //     [
        //         'name' => 'admin',
        //         'email' => 'admin@gmail.com',
        //         'phone' => '0987654321',
        //         'address' => 'Hà Nội',
        //         'password' => 'bkacad'
        //     ]
        // );

            // Admin::create([
            //     'name'=>"Hà Như Quỳnh",
            //     'email'=>'admin@gmail.com',
            //     'phone'=>'0123456789',
            //     'address'=>'Hà Nội',
            //     'password'=>bcrypt('123'),
            //     'level' => 1
            // ]);

            Student::factory(100)->create();

            // Admin::create([
            //     'name'=>"Admin 2",
            //     'email'=>'admin2@gmail.com',
            //     'phone'=>'0987654321',
            //     'address'=>'HN',
            //     'password'=>bcrypt('bkacad')
            // ]);
    }
}
