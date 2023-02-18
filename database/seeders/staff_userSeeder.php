<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class staff_userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        staff_user::create([
            "name" => "Hardik Savani",
            "email" => "admin@gmail.com",
            'mobile' => 7894561235,
            'staff_iamge' => "asdff",
            "password" => bcrypt("123456")
        ]);
    }
}
