<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(AdminCreateSeeder::class);
        $this->call(MedicineCompanySeeder::class);
        $this->call(MedicineTypeSeeder::class);
        $this->call(MedicineCategorySeeder::class);
        $this->call(MedicineGenericSeeder::class);
        $this->call(MedicineSeeder::class);
    }
}
