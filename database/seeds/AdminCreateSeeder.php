<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'role_id' => 1,
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '@dmin',
            'designation' => 'manager',
            'mobile_no' => '01832308565',
            'status' => 'active',
        ]);
    }
}
